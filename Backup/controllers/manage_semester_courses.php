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
            <div class="col-md-3" style="left: 365px; width: 40%; top: -420px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><strong><p style='color: CornflowerBlue'>Courses Not Offered in
                            <?php
								echo $_POST['Semester'] . " " . $_POST['Year'];
                            ?>
                        </p></strong></h4>
                    </div>
                    <div class="panel-body">
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
						// Get applicant table attributes from form
						$Year = $_POST["Year"]; 
						$Semester = $_POST["Semester"];

						$add_year_sql = "INSERT INTO enrollements.possible_years (`Year`) VALUES ($Year)";
						$result = mysql_query($add_year_sql);

						$sql = "SELECT  course.CourseID as 'Course ID', 
										course.CourseName as 'Course Name',
								        course.CreditHours as 'Credit Hours'
								FROM  course
								WHERE (course.CourseID) NOT IN 
												(
													SELECT CourseID as 'Course ID'
													FROM section NATURAL JOIN course
													WHERE  section.SemesterOfOfferedSection='$Semester' AND section.YearOfOfferedSection='$Year'
													GROUP BY CourseID
												)
								GROUP BY CourseID ORDER BY CourseID;";
						$query_result = mysql_query($sql);
						if(!$query_result)
						{
							die("QUERY ERROR" . mysql_error());
						}
						else if(mysql_num_rows($query_result) == 0)
						{
							echo "<p class='bg-danger text-center'><br>No Courses!<br><br> </p>";
						}
						else
						{
							echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
							$columns = mysql_num_fields($query_result);
							for($i=0 ; $i<$columns ; $i++)
							{
								echo "<th style=''><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
							}
							echo "<th style=''><span class='auto-style3'>Expected Enrollment</span></th>";
							echo "<th style=''><span class='auto-style3'>Sections</span></th>";
							echo "<th style=''><span class='auto-style3'>Offer Course</span></th></tr>";
							$CourseID = mysql_result($query_result, 0, 'Course ID');
							for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
								echo "<tr>";
								$CourseID = mysql_result($query_result, $i, 'Course ID');
								for($j=0; $j<mysql_num_fields($query_result) ; $j++){
									print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
								}
								// ADD VIEW ALL QUERY HERE
								$get_expected_enrollment = "SELECT Count(studentID) AS 'ExpectedCount'
															FROM prerequisites RIGHT OUTER JOIN (
																	SELECT students_still_have_to_take.CourseID,StudentID
																	FROM 
																		(SELECT CourseID,StudentID
																		FROM (SELECT student.StudentID ,course_major.CourseID
																			  FROM enrollements.course_major, enrollements.student
																			  WHERE student.MajorID=course_major.MajorID AND course_major.CourseID='$CourseID') AS students_should_take
																		WHERE (studentID,CourseID) NOT IN ( SELECT studentID,CourseID FROM enrollements.takes WHERE takes.Grade!='F')) AS students_still_have_to_take
																	) AS students_should_take_now ON prerequisites.CourseID = students_should_take_now.CourseID
															WHERE students_should_take_now.CourseID = '$CourseID'
															GROUP BY students_should_take_now.CourseID";

								$enrollment_count_result = mysql_query($get_expected_enrollment);
								if(!$enrollment_count_result)
								{
									die("QUERY ERROR" . mysql_error());
								}
								else if(mysql_num_rows($enrollment_count_result) == 0)
								{
									echo "<th class='text-center'><strong>0</strong></th>";
								}
								else
								{
									$exp_enr = mysql_result($enrollment_count_result, 0);
									echo "<th class='text-center'>$exp_enr</th>";
								}
								echo "<form  method='post' action='../controllers/semester_offer_course.php'>
								<th class='text-center'>
								<input type='hidden' name='Semester' value='$Semester'>
								<input type='hidden' name='Year' value='$Year'>
								<input type='hidden' name='CourseID' value='$CourseID'>
								<input type='number' name='Sections' min = '1' value='1' required class='form-control' style='width: 50%''>
								</th>
								<th>
								<button type='submit' class='btn btn-success' name = 'offer_course_btn'>Offer</button></form></th>";
								echo "</tr>";
							}
							echo "</table>";
						}
						
					?>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="left: 365px; width: 40%; top: -420px">
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        <h4> <strong><p style='color: CornflowerBlue'>Courses Offered in
                            <?php
                            echo $_POST['Semester'] . " " . $_POST['Year'];
                            ?>
                        </o></strong></h4>
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
							
							$Semester = $_POST['Semester'];
							$Year = $_POST['Year'];
							
							
							$sql = "SELECT CourseID as 'Course ID', CourseName AS 'Course Name', Count(SectionID) AS 'Sections'
									FROM section NATURAL JOIN course
									WHERE  section.SemesterOfOfferedSection='$Semester' AND section.YearOfOfferedSection='$Year'
									GROUP BY CourseID
									ORDER BY CourseID;";
							
							
							$query_result = mysql_query($sql);
							if(!$query_result)
							{
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
									echo "<th style=''><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
								}
								echo "<th style=''><span class='auto-style3'>Expected Enrollment</span></th>";
								echo "<th style=''><span class='auto-style3'>Actual Enrollment</span></th>";
								echo "<th style=''><span class='auto-style3'></span></th></tr>";
								for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
									echo "<tr>";
									$CourseID = mysql_result($query_result, $i, 'Course ID');
									for($j=0; $j<mysql_num_fields($query_result) ; $j++){
										print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
									}
									/// EXPECTED ENROLLMENT
									$get_expected_enrollment = "SELECT Count(studentID) AS 'ExpectedCount'
																FROM prerequisites RIGHT OUTER JOIN (
																		SELECT students_still_have_to_take.CourseID,StudentID
																		FROM 
																			(SELECT CourseID,StudentID
																			FROM (SELECT student.StudentID ,course_major.CourseID
																				  FROM enrollements.course_major, enrollements.student
																				  WHERE student.MajorID=course_major.MajorID AND course_major.CourseID='$CourseID') AS students_should_take
																			WHERE (studentID,CourseID) NOT IN ( SELECT studentID,CourseID FROM enrollements.takes WHERE takes.Grade!='F')) AS students_still_have_to_take
																		) AS students_should_take_now ON prerequisites.CourseID = students_should_take_now.CourseID
																WHERE students_should_take_now.CourseID = '$CourseID'
																GROUP BY students_should_take_now.CourseID";

									$enrollment_count_result = mysql_query($get_expected_enrollment);
									if(!$enrollment_count_result)
									{
										die("QUERY ERROR" . mysql_error());
									}
									else if(mysql_num_rows($enrollment_count_result) == 0)
									{
										echo "<th class='text-center'><strong>0</strong></th>";
									}
									else
									{
										$exp_enr = mysql_result($enrollment_count_result, 0);
										echo "<th class='text-center'>$exp_enr</th>";
									}
									//// EXPECTED ENROLLMENT END

									$actual_enrollment_sql = "SELECT COUNT(takes.studentID) as 'Count' 
															FROM takes
															WHERE CourseID='$CourseID' AND SemesterTaken='$Semester' AND YearTaken='$Year'
															GROUP BY CourseID;" ;

									$actual_enrollment_result = mysql_query($actual_enrollment_sql);

									if(!$actual_enrollment_result)
									{
										die("QUERY ERROR" . mysql_error());
									}
									else if(mysql_num_rows($actual_enrollment_result) == 0)
									{
										echo "<th class='text-center'><strong>0</strong></th>";
									}
									else
									{
										$actual_enr = mysql_result($actual_enrollment_result, 0);
										echo "<th class='text-center'>$actual_enr</th>";
									}
									// ADD VIEW ALL QUERY HERE
									echo "<th><form  method='post' action='../controllers/semester_remove_course.php'>
									<input type='hidden' name='Semester' value='$Semester'>
									<input type='hidden' name='Year' value='$Year'>
									<input type='hidden' name='CourseID' value='$CourseID'>
									<button type='submit' class='btn btn-danger' name = 'remove_course_btn'>Remove</button></form></th>";
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

