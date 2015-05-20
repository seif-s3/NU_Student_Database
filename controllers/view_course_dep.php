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
                <div class="col-md-6" style="left: 0px; width: 53.5%; top: 25px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><strong><p style='color: CornflowerBlue'><?php 
                                echo "Prerequisites for " . $_POST['CourseID'];
                                ?>
								</p>
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
								$CourseID = $_POST['CourseID'];
								if($CourseID == "")
								{
									header("location: $referred?msg=0");
								}
								
								$sql = "SELECT PrereqID as 'Course ID', CourseName as 'Course Name' 
								FROM enrollements.prerequisites JOIN enrollements.course ON prerequisites.PrereqID = course.CourseID WHERE prerequisites.CourseID = '$CourseID'";
								$query_result = mysql_query($sql);
								if(!$query_result)
								{
									die('QUERY ERROR: <br> ' . mysql_error());
								}
                                 else if(mysql_num_rows($query_result) == 0)
                                {
                                    echo "<p class='bg-info text-center'><br><strong>No Prerequisites</strong><br><br> </p>";
                                }
								else
								{
									echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
									$columns = mysql_num_fields($query_result);
									for($i=0 ; $i<$columns ; $i++)
									{
										echo "<th style='color: CornflowerBlue'><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
									}
									echo "<th style='color: CornflowerBlue'><span class='auto-style3'>Further Prerequisites</span></th></tr>";
									for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
										echo "<tr>";
										for($j=0; $j<mysql_num_fields($query_result) ; $j++){
											print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
										}
										// ADD VIEW ALL QUERY HERE
										$PreqID = mysql_result($query_result,$i,mysql_field_name($query_result, 0));
										echo "<th><form method='post' action='../controllers/view_course_dep.php'>
										<button type='submit' class='btn btn-link' name='CourseID' value='$PreqID'>View Prerequisites</button></form></th>";
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