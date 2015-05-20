<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Nile University</title>
        <meta name="generator" content="Bluefish 2.2.6" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
		<link href="../views/favicon.ico"  rel="shortcut icon">
    </head>
    <body>
        <div id="top-nav" class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Admin_home.html"><IMG SRC="../views/nulogo.png" style="width:50px;height:28px"> Students Management System</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Admin <span class="caret"></span></a>
                            <ul id="g-account-menu" class="dropdown-menu" role="menu">
                                <li><a href="#">My Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3" style="left: 0px; top: 0px; width: 374px">
                    <hr>
                    <strong><i class="glyphicon glyphicon-search"></i> Search</strong> 
                    <ul class="list-unstyled">
                        <li class="nav-header">
                            <a href="#" data-toggle="collapse" data-target="#userMenu">
                            </a>
                            <ul class="list-unstyled collapse in" id="userMenu">
                                <li class="active"> <a href="../views/search_applications.php"><i class="glyphicon glyphicon-folder-open"></i> 
                                    Applicants </a>
                                </li>
                                <li><a href="../views/search_enrolled_students.php"><i class="glyphicon glyphicon-user"></i> 
                                    Enrolled Students</a>
                                </li>
                                <li><a href="../views/view_course_dependency.php"><i class="glyphicon glyphicon-tags"></i> 
                                    Course Dependencies</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                    <strong><i class="glyphicon glyphicon-pencil"></i> 
                    Requests  </strong>
                    <ul class="list-unstyled">
                        <li class="nav-header">
                            <a href="#" data-toggle="collapse" data-target="#userMenu">
                            </a>
                            <ul class="list-unstyled collapse in" id="userMenu">
                                <li class="active"> <a href="../views/new_application.php"><i class="glyphicon glyphicon-check"></i> 
                                    New Applicant</a>
                                </li>
                                <li><a href="../views/semester_management_home.php"><i class="glyphicon glyphicon-book"></i> 
                                    Semester Management</a>
                                </li>
                                <li class="active"> <a href="../views/update_grades.php"><i class="glyphicon glyphicon-plus"></i> 
                                    Assign Grades </a>
                                </li>
                                <li><a href="../views/advising.php"><i class="glyphicon glyphicon-list-alt"></i> 
                                    Advising</a>
                                </li>
                                <li><a href="../views/issue_transcript.php"><i class="glyphicon glyphicon-file"></i> 
                                    Issue Transcript</a>
                                </li>
                                <li><a href="../views/create_course.php"><i class="glyphicon glyphicon-plus"></i> 
                                    Create New Course</a>
                                </li>
                                <li><a href="../views/edit_courses.php"><i class="glyphicon glyphicon-pencil"></i> 
                                    Edit Course Details</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col-md-3" style="left: 365px; width: 80%; top: -420px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><strong><p style='color: CornflowerBlue'> Student Details
                        </p></strong></h4>
                    </div>
                    <div class="panel-body">
                        <!-- START OF VIEW APPLICATION !-->     
                        <?php
							require_once("../functions.php");
                            require_once("../config/enrollments_config.php");
                            
                            /* Check that request originated from same domain */
                            $domain = $_SERVER['HTTP_HOST'];
                            $request_domain = parse_url($_SERVER['HTTP_REFERER']);
							// Create link to Enrollments Database
							$link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
							$referred = $_SERVER['HTTP_REFERER'];
							$query = parse_url($referred, PHP_URL_QUERY);
							$referred = str_replace(array('?', $query), '', $referred);
							
							// Clear $_POST to prevent against SQL injections
							$_POST = f_clean($_POST);
							
							$StudentID = $_POST['StudentID'];
							
							$details_sql = "SELECT applicants.applicant.FirstName as 'First Name', applicants.applicant.MiddleName as 'Middle Name', applicants.applicant.LastName as 'Last Name', enrollements.student.GPA as 'GPA', enrollements.student.CreditsTaken as 'Credits Taken', enrollements.student.MajorID as 'Major ID' FROM applicants.applicant INNER JOIN enrollements.student ON applicants.applicant.ApplicationID = enrollements.student.StudentID WHERE enrollements.student.StudentID = $StudentID ";
							
							$query_result = mysql_query($details_sql);
							if(!$query_result)
							{
								mysql_close();
								die("QUERY ERROR" . mysql_error());
							}
							else if(mysql_num_rows($query_result) == 0)
							{
								echo "<p class='bg-danger text-center'><br><strong>Student Not Found!</strong><br><br> </p>";
							}
							else
							{
								$Name = mysql_result($query_result, 0, 'First Name') . " " . mysql_result($query_result, 0, 'Middle Name') . " " . mysql_result($query_result, 0, 'Last Name');
								$GPA = mysql_result($query_result, 0, 'GPA');
								$Credits = mysql_result($query_result, 0, 'Credits Taken');
								$MajorId = mysql_result($query_result, 0, 'Major ID');
								echo "<table class ='table-striped' style = 'width: 100%'>
								<tr><td><h4><b>Name</h4></td><td><h4>$Name</h4></td></tr>
								<tr><td><h4><b>GPA</h4></td><td><h4>$GPA</h4></td></tr>
								<tr><td><h4><b>Credits</h4></td><td><h4>$Credits</h4></td></tr>
								<tr><td><h4><b>Major</h4></td><td><h4>$MajorId</h4></td></tr>
								</table>";
							}
							mysql_close();
						?>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="left: 365px; width: 40%; top: -420px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><strong><th style='color: CornflowerBlue'>Offered Courses for
                            <?php
								echo $_POST['Semester'] . " " . $_POST['Year'];
                            ?>
                        </th></strong></h4>
                    </div>
                    <div class="panel-body">
                        <!-- START OF VIEW APPLICATION !-->		
                        <?php
                            require_once("../functions.php");
                            require_once("../config/enrollments_config.php");
                            
                            /* Check that request originated from same domain */
                            $domain = $_SERVER['HTTP_HOST'];
                            $request_domain = parse_url($_SERVER['HTTP_REFERER']);
							// Create link to Applicants Database
							$link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
							$referred = $_SERVER['HTTP_REFERER'];
							$query = parse_url($referred, PHP_URL_QUERY);
							$referred = str_replace(array('?', $query), '', $referred);
							// Clear $_POST to prevent against SQL injections
							$_POST = f_clean($_POST);
							$StudentID = $_POST['StudentID'];
							$Semester = $_POST['Semester'];
							$Year = $_POST['Year'];
							// GET OFFERED COURSES FOR STUDENT
							// could_take_now => courses_left_offered_this_semester
							// seif => could_take_now
							$sql = "SELECT DISTINCT CourseID AS 'Course ID', CourseName AS 'Course Name', CreditHours AS 'Credits', SectionID AS 'Section ID'
									FROM
									(
										SELECT yet_to_take.CourseID, yet_to_take.CourseName, yet_to_take.CreditHours, yet_to_take.MinimumPrereq, yet_to_take.SectionID, yet_to_take.PrereqID
										FROM 
										(
											SELECT required_to_take.CourseID, required_to_take.CourseName, required_to_take.CreditHours, required_to_take.MinimumPrereq, required_to_take.SectionID, required_to_take.PrereqID
											FROM
											(
												SELECT course_major.CourseID, course.CourseName, course.CreditHours, course.MinimumPrereq, A.SectionID, prerequisites.PrereqID
												FROM enrollements.course_major NATURAL JOIN course NATURAL JOIN enrollements.student NATURAL JOIN section AS A LEFT JOIN prerequisites ON A.CourseID = prerequisites.CourseID
												WHERE student.MajorID=course_major.MajorID 
													AND student.StudentID = '$StudentID'
													AND A.YearOfOfferedSection = '$Year'
													AND A.SemesterOfOfferedSection = '$Semester'
											) AS required_to_take
											WHERE (required_to_take.CourseID) NOT IN
																				(
																					SELECT CourseID
																					FROM takes
																					WHERE takes.StudentID = '$StudentID'
																					AND CONCAT(takes.SemesterTaken, takes.YearTaken) != CONCAT('$Semester','$Year')
																				)
											ORDER BY CourseID
										) AS yet_to_take
									    WHERE (yet_to_take.CourseID NOT IN (SELECT CourseID from prerequisites) AND yet_to_take.CourseID NOT IN (SELECT CourseID FROM takes WHERE takes.StudentID = '$StudentID'))
												OR (yet_to_take.MinimumPrereq = 
																			(
																				SELECT COUNT(prerequisites.CourseID)
																				FROM takes JOIN prerequisites ON prerequisites.PrereqID = takes.CourseID
																				WHERE takes.StudentID = '$StudentID' AND prerequisites.CourseID = yet_to_take.CourseID
																				AND CONCAT(takes.SemesterTaken, takes.YearTaken) != CONCAT('$Semester','$Year')
																				GROUP BY prerequisites.CourseID
																			)
													)
									 )  AS FINAL
									 WHERE CourseID NOT IN (SELECT CourseID FROM takes WHERE StudentID='$StudentID' AND SemesterTaken='$Semester' AND YearTaken = '$Year')
									 ORDER BY CourseID, SectionID
									 ";		

							$query_result = mysql_query($sql);
							if(!$query_result)
							{
								mysql_close();
								die('QUERY ERROR: <br> ' . mysql_error());
							}
							else if(mysql_num_rows($query_result) == 0)
							{
								echo "<p class='bg-danger text-center'><br><strong>No courses offered!</strong><br><br> </p>";
							}
							else
							{
								echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
								$columns = mysql_num_fields($query_result);
								for($i=0 ; $i<$columns ; $i++)
								{
									echo "<th style='color: CornflowerBlue'><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
								}
								echo "<th style='color: CornflowerBlue'><span class='auto-style3'>Add Course</span></th></tr>";
								$Major = "";
								for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
									echo "<tr>";
									$CourseID = mysql_result($query_result, $i, 'Course ID');
									$SectionID = mysql_result($query_result, $i, 'Section ID');
									for($j=0; $j<mysql_num_fields($query_result) ; $j++){
										print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
									}
									// ADD VIEW ALL QUERY HERE
									$AppID = mysql_result($query_result,$i,mysql_field_name($query_result, 0));
									echo "<th><form  method='post' action='../controllers/advising_add_course.php'>
									<input type='hidden' name='StudentID' value='$StudentID'>
									<input type='hidden' name='Semester' value='$Semester'>
									<input type='hidden' name='Year' value='$Year'>
									<input type='hidden' name='CourseID' value='$CourseID'>
									<input type='hidden' name='SectionID' value='$SectionID'>
									<button type='submit' class='btn btn-success' name = 'ID'>Add</button></form></th>";
									echo "</tr>";
								}
								echo "</table>";
							}
							mysql_close();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="left: 365px; width: 40%; top: -420px">
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        <h4> <strong><th style='color: CornflowerBlue'>Courses Registered in
                            <?php
                            echo $_POST['Semester'] . " " . $_POST['Year'];
                            ?>
                        </th></strong></h4>
                    </div>
                    <div class="panel-body">
                        <!-- START OF VIEW APPLICATION !-->     
                        <?php
                            require_once("../functions.php");
                            require_once("../config/enrollments_config.php");
                            
                            /* Check that request originated from same domain */
                            $domain = $_SERVER['HTTP_HOST'];
                            $request_domain = parse_url($_SERVER['HTTP_REFERER']);
							// Create link to Applicants Database
							$link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
							$referred = $_SERVER['HTTP_REFERER'];
							$query = parse_url($referred, PHP_URL_QUERY);
							$referred = str_replace(array('?', $query), '', $referred);
							// Clear $_POST to prevent against SQL injections
							$_POST = f_clean($_POST);
							
							$StudentID = $_POST['StudentID'];
							$Semester = $_POST['Semester'];
							$Year = $_POST['Year'];
							
							
							$sql = "SELECT CourseID as 'Course ID', course.CourseName as 'Course Name', SectionID as 'Section ID', takes.Grade as 'Grade'
									FROM takes NATURAL JOIN course
									WHERE takes.studentID='$StudentID' AND takes.YearTaken='$Year' AND takes.SemesterTaken='$Semester'
									ORDER BY CourseID, SectionID";
							
							
							$query_result = mysql_query($sql);
							if(!$query_result)
							{
								mysql_close();
								die('QUERY ERROR: <br> ' . mysql_error());
							}
							else if(mysql_num_rows($query_result) == 0)
							{
								echo "<p class='bg-danger text-center'><br><strong>No courses registered!</strong><br><br> </p>";
							}
							else
							{
								echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
								$columns = mysql_num_fields($query_result);
								for($i=0 ; $i<$columns ; $i++)
								{
									echo "<th style='color: CornflowerBlue'><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
								}
								echo "<th style='color: CornflowerBlue'><span class='auto-style3'>Drop Course</span></th></tr>";
								for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
									echo "<tr>";
									$CourseID = mysql_result($query_result, $i, 'Course ID');
									$SectionID = mysql_result($query_result, $i, 'Section ID');
									for($j=0; $j<mysql_num_fields($query_result) ; $j++){
										print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
									}
									// ADD VIEW ALL QUERY HERE
									$AppID = mysql_result($query_result,$i,mysql_field_name($query_result, 0));
									echo "<th><form  method='post' action='../controllers/advising_drop_course.php'>
									<input type='hidden' name='StudentID' value='$StudentID'>
									<input type='hidden' name='Semester' value='$Semester'>
									<input type='hidden' name='Year' value='$Year'>
									<input type='hidden' name='CourseID' value='$CourseID'>
									<input type='hidden' name='SectionID' value='$SectionID'>
									<button type='submit' class='btn btn-danger' name = 'ID' value = '$AppID'>Drop Course</button></form></th>";
									echo "</tr>";
								}
								echo "</table>";
							}
							mysql_close();
						?>
                    </div>
                </div>
            </div>
        </div>
        </div>      
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>