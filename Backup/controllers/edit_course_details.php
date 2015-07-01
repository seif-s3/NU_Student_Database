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
                        <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
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
                            <h4><strong><p style='color: CornflowerBlue'>Create New Course 
                                    </p>
                                </strong>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form class="form form-vertical=" method = "POST" action = '../controllers/update_course_details.php'>
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
                                $CourseID = $_POST["CourseID"]; 
                                
                                $sql = "SELECT CourseID AS 'Course ID', CourseName AS 'Course Name', CreditHours AS 'Credits', MinimumPrereq as 'Prerequisites Count'
                                        FROM course where CourseID = '$CourseID'";
                                $preq_sql = "SELECT PrereqID AS 'Prerequisite ID' FROM prerequisites WHERE CourseID = '$CourseID'";

                                $preq_result = mysql_query($preq_sql);
                                $query_result = mysql_query($sql);
                                
                                if(!$query_result)
                                {
                                    die("QUERY ERROR" . mysql_error());
                                }
                                else if(mysql_num_rows($query_result) == 0)
                                {
                                    echo "<p class='bg-danger text-center'><br>No Courses Found!<br><br> </p>";
                                }
                                else
                                {
                                    $OldID = mysql_result($query_result, 0, 'Course ID');
                                    $OldName = mysql_result($query_result, 0, 'Course Name');
                                    $OldCredits = mysql_result($query_result, 0, 'Credits');
                                    $OldMinPreq = mysql_result($query_result, 0, 'Prerequisites Count');
                                    
                                    if(mysql_num_rows($preq_result)==1)
                                    {
                                        $OldPreq1 = mysql_result($preq_result, 0, 'Prerequisite ID');
                                    }
                                    else if(mysql_num_rows($preq_result)==2)
                                    {
                                        $OldPreq1 = mysql_result($preq_result, 0, 'Prerequisite ID');
                                        $OldPreq2 = mysql_result($preq_result, 1, 'Prerequisite ID');
                                    }
                                    else
                                    {
                                        $OldPreq1 = "";
                                        $OldPreq2 = "";
                                    }
                                    echo "
                                    <input type='hidden' name='CourseKey' value='$CourseID'/>
                                    <label>Course ID</label>
                                    <div class='controls'>
                                        <input type='text' class='form-control' value='$OldID' style='width: 24%'' name='CourseID' required>
                                    </div>
                                    <label> Course Name </label>
                                    <div class='controls'>
                                        <input value = '$OldName' name='CourseName' class='form-control' style = 'width: 25%' required>
                                    </div>
                                    <label> Credit Hours </label>
                                    <div class='contorls'>
                                        <input value = '$OldCredits' name='Credits' class='form-control' type='Number' min ='1' required   style = 'width: 25%'>
                                    </div>
                                    <label> Number of Prerequisites </label>
                                    <div class='contorls'>
                                        <input value = '$OldMinPreq' name='MinPreq' class='form-control' type='Number' min ='0' required   style = 'width: 25%'>
                                    </div>
                                    <label> Prerequisite #1</label>
                                    <div class='contorls'>
                                        <select name='Preq1' class='form-control' style = 'width: 50%'>
                                            <option value='' disabled selected> -- Select Course -- </option>
                                            ";
                                            require_once('../functions.php');
                                            dropdown_all_courses_select_id($OldPreq1);
                                    echo "
                                        </select>
                                    </div>
                                    <label> Prerequisite #2</label>
                                    <div class='contorls'>
                                        <select name='Preq2' class='form-control'  style = 'width: 50%'>
                                            <option value='' disabled selected> -- Select Course -- </option>
                                            ";
                                            require_once("../functions.php");
                                            dropdown_all_courses_select_id($OldPreq2);
                                    echo "
                                        </select>
                                    </div>
                                    
                                    <div class='control-group'>
                                        <label></label>
                                        <div class='controls'>
                                            <button type='submit' class='btn btn-primary'>
                                            Edit Course
                                            </button>
                                        </div>
                                    </div>
                                    ";
                                }
                                ?>
                            </form> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>