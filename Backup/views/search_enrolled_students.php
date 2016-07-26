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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">

		<script type="text/javascript">
			$(document).ready(function(){
				$('#SchoolID').change(function(){
					var SchoolID = $("#SchoolID").val();
					var dataString = "SchoolID="+SchoolID
					$.ajax({
						type: "POST",
						url: "Trial.php",
						data: dataString,
						cache: false;
						success: function(data){
							$("#MajorID").html(data);
						}
					});
				});

			});
					
					//$('#MajorID').load("Trial.php?="+$("#SchoolID").val());
					//var selected=$(this).val();
					//$.get('Trial.php'{'option':selected.val()},function(data) )
					//$('select[name="MajorID"]').html(data);
				

		</script>

		
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
                            </ul>
                        </li>
                    </ul>
                    <hr>
                </div>
                <div class="col-md-6" style="left: 0px; width: 53.5%; top: 25px">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4><strong><p style='color: CornflowerBlue'>Search Enrolled Students
                                </p>
								</strong>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form class="form form-vertical=" method = "post" action = "../views/view_enrolled_students.php">
                                <?php
                                    if(isset($_GET['msg']) && $_GET['msg'] == '0')
                                    {
                                    	echo "<p class='bg-danger text-center'><br>You have to Select at least one attribute to search for!<br><br> </p>";
                                    }
                                    else if(isset($_GET['msg']) && $_GET['msg'] == '-1')
                                    {
                                    	echo "<p class='bg-danger text-center'><br>Database Error, Please contact admin!<br><br> </p>";
                                    }
                                    
                                ?>
                                <label>Student ID</label>
                                <div class="controls">
                                    <input type="number" class="form-control" placeholder="Enter ID" style="width: 24%" name="StudentID" >
                                </div>
                                <label>Name </label>
                                <div class="controls">
                                    <input type="text" class="form-control" placeholder="Enter First Name" name="Name">
                                </div>
                                <label> School </label>
                                <select name="SchoolID1" class="form-control" style = "width: 25%">
                                    <option value="" selected>--School--</option>
                                    <?php
                                    require_once("../functions.php");
                                    dropdown_all_schools();
                                    ?>
                                </select>
                                <label> Major </label>
                                <select name="MajorID1" class="form-control" style = "width: 25%">
                                    <option value="" selected>--Major--</option>
                                    <?php
                                    require_once("../functions.php");
                                    dropdown_all_majors();
                                    ?>
                                </select>
								<label> School Trial </label>
                                <select name="SchoolID" class="form-control" style = "width: 25%">
                                    <option value="" selected>Please Select</option>
                                    <?php
                                    require_once("../functions.php");
                                    dropdown_all_schools();
                                    ?>
                                </select>
								<label> Major Trial </label>
                                <select name="MajorID" class="form-control" style = "width: 25%">
                                    <option value="" selected>Please choose from above</option>
                                </select>
                                <div class="control-group">
                                    <label></label>
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">
                                        Search
                                        </button>
                                    </div>
                                </div>
                            </form>
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
