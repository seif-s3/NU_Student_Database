<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Nile University</title>
        <meta name="generator" content="Bluefish 2.2.6" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="../views/css/bootstrap.min.css" rel="stylesheet">
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
            <!-- /container -->
        </div>
        <!-- /Header -->
        <!-- Main -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3" style="left: 0px; top: 0px; width: 374px">
                    <!-- Left column -->
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
                <!--/col-->
                <div class="col-md-6" style="left: 0px; width: 53.5%; top: 25px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><strong><p style='color: CornflowerBlue'>Grades Results for
                                <?php
                                    require_once("../functions.php");
                                    require_once("../config/enrollments_config.php");
                                    
                                    /* Check that request originated from same domain */
                                    $domain = $_SERVER['HTTP_HOST'];
                                    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
                                    //if($domain == $request_domain)
                                    //{
                                    // Create link to Applicants Database
                                    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
                                    $referred = $_SERVER['HTTP_REFERER'];
                                    $query = parse_url($referred, PHP_URL_QUERY);
                                    $referred = str_replace(array('?', $query), '', $referred);
                                    
                                    // Clear $_POST to prevent against SQL injections
                                    $_POST = f_clean($_POST);
                                    $AppID = $_POST['StudentID'];
                                    $sql = "SELECT FirstName, MiddleName, LastName FROM Applicants.applicant WHERE ApplicationID = $AppID";
                                    $result = mysql_query($sql);
                                    if(!$result)
                                    {
                                        die('SQL ERROR!' . mysql_error());
                                    }
                                    else if(mysql_num_rows($result) == 0)
                                    {
                                        echo "Not Found";
                                    }
                                    else
                                    {
                                    	$Name = mysql_result($result,0,'FirstName') . ' ' . mysql_result($result,0,'MiddleName') . ' ' . mysql_result($result,0,'LastName');
                                        echo $AppID . ": " . $Name;
                                    }
                                    mysql_close();
                                ?>
                                </p>
								</strong>
                            </h4>
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
								if($StudentID == "" || $Semester == "" || $Year == "")
								{
									header("location: $referred?msg=0");
								}
								$sql = "SELECT CourseID as 'Course ID', CourseName as 'Course Name', CreditHours as 'Credit Hours', SectionID as 'Section ID', SemesterTaken as 'Semester', YearTaken as 'Year', Grade as 'Current Grade'
										FROM takes NATURAL JOIN course WHERE StudentID = '$StudentID' AND SemesterTaken = '$Semester' AND YearTaken = '$Year' ORDER BY Year, SemesterTaken";
								
								$query_result = mysql_query($sql);
								if(!$query_result)
								{
									header("location: $referred?msg=-1");
								}
                                else if(mysql_num_rows($query_result) == 0)
                                {
                                    echo "<p class='bg-danger text-center'><br><strong>No Results!</strong><br><br> </p>";
                                }
								else
								{
									echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
									$columns = mysql_num_fields($query_result);
									for($i=0 ; $i<$columns ; $i++)
									{
										echo "<th style='color: CornflowerBlue'><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
									}
									echo "<th style='color: CornflowerBlue'><span class='auto-style3'>New Grade</span></th>";
									echo "<th style='color: CornflowerBlue'><span class='auto-style3'>Update</span></th>";
									echo "</tr>";
									for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
										echo "<tr>";
										for($j=0; $j<mysql_num_fields($query_result) ; $j++){
											if(mysql_result($query_result,$i,'Current Grade') == 'A' || mysql_result($query_result,$i,'Current Grade') == 'A+')
											{
												print "<td class='success'>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
											}
											else if(mysql_result($query_result,$i,'Current Grade')=='F')
											{
												print "<td class='danger'>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
											}
                                            else if(mysql_result($query_result,$i,'Current Grade')=='I')
                                            {
                                                print "<td class='warning'>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
                                            }
											else
											{
												print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
											}
										}
										// ADD VIEW ALL QUERY HERE
										$CourseID = mysql_result($query_result,$i,'Course ID');
										echo "<th><form method='post' action='../controllers/update_student_course_grade.php'>
										<input type='hidden' name='CourseID' value='$CourseID'>
										<input type='hidden' name='Semester' value='$Semester'>
										<input type='hidden' name='Year' value='$Year')>
										<input type='hidden' name='StudentID' value='$StudentID'>
										<select name='Grade' style='width: 100%'>
														<optgroup label='--Grade--'></optgroup>";
                                                        dropdown_all_grades();
                                        echo "
										</select>
										</th>
										<th>
										<button type='submit' class='btn btn-link'>Update Grade</button>
										</form>";
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