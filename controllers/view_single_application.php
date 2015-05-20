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
                                <li class="active"> <a href="../views/new_application.php"><i class="glyphicon glyphicon-plus"></i> 
                                    New Applicant</a>
                                </li>
                                <li><a href="../views/semester_management_home.php"><i class="glyphicon glyphicon-book"></i> 
                                    Semester Management</a>
                                </li>
                                <li class="active"> <a href="../views/update_grades.php"><i class="glyphicon glyphicon-check"></i> 
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
                            <h4><strong><p style='color: CornflowerBlue'>Search Results
									</p>
								</strong>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <!-- START OF VIEW APPLICATION !-->	
                            <?php
                                require_once("../functions.php");
                                require_once("../config/applicants_config.php");
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
								
								$ApplicationID = $_POST['ID'];
								
								$sql = "SELECT applicant.ApplicationID as 'Application ID', applicant.FirstName as'First Name', applicant.MiddleName as 'Middle Name', applicant.LastName as 'Last Name', applicant.DateOfBirth as 'Date Of Birth', applicant.IsMale as 'Gender', applicant.MilitaryStatus as 'Military Status (for Males only)', applicant.PlaceOfBirth as 'Place Of Birth', applicant.NationalID as 'National ID number', applicant.NationalIDExpiry as 'National ID Expiry Date', applicant.Passport as 'Passport Number', applicant.PassportExpiry as 'Passport Expiry Date', admission_info.SemesterOfApplication as 'Semester for Applying', admission_info.Year as 'Year for Applying', admission_info.AppliedSchool as 'Intended School', admission_info.IntendedMajor as 'Intended Major', admission_info.TOEFLResults as 'Results for the TOEFL Exam', admission_info.TOEFLDate as 'Date for the TOEFL Exam', contact_info.HomeAddress as 'Home Address', contact_info.HomeTel as 'Landline Number', contact_info.HomeMobile as 'Personal Mobile number', contact_info.HomeFax as 'Home Fax Number', contact_info.HomeEmail as 'Personal E-mail', contact_info.MailingAddress as 'Work/University Address', contact_info.MailingTel as 'Work/University Landline Number',contact_info.MailingMobile as 'Work/University Mobile Number',contact_info.MailingFax as 'Work/University Fax Number', contact_info.MailingEmail as 'Work/Univesity E-mail', father_info.FatherFirstName as 'Father\'s First Name', father_info.FatherMiddleName as 'Father\'s Middle Name', father_info.FatherLastName as 'Father\'s Last Name',
								father_info.FatherAddress as 'Father\'s Address', father_info.FatherTel as 'Father\'s Landline Number', father_info.FatherMobile as 'Father\'s Mobile Nummber', father_info.FatherOccupation as 'Father\'s Occupation', father_info.FatherCompany as 'Father\'s Company name', father_info.FatherBusinessPhone as 'Father\'s Business Phone Number', father_info.FatherEmail as 'Father\'s Personal/Work E-mail', father_info.FatherFax as 'Father\'s Fax Number', father_info.FatherBusinessAddress as 'Father\'s Business Address', mother_info.MotherFirstName as 'Mother\'s First Name', mother_info.MotherMiddleName as 'Mother\'s Middle Name', mother_info.MotherLastName as 'Mother\'s Last Name', mother_info.MotherAddress as 'Mother\'s Address', mother_info.MotherTel as 'Mother\'s Landline Number', mother_info.MotherMobile as 'Mother\'s Mobile Number', mother_info.MotherOccupation as 'Mother\'s Occupation', mother_info.MotherCompany as 'Mother\'s Comapny Name', mother_info.MotherBusinessPhone as 'Mother\'s Business Phone Number', mother_info.MotherEmail as 'Mother\'s E-mail',	mother_info.MotherFax as 'Mother\'s Fax Number', mother_info.MotherBusinessAddress as 'Mother\'s Business Address', financial_info.Relationship as 'Financial Guardian Relationship', financial_info.Other as 'Other\'s Type of Relationship', financial_info.OtherFirstName as 'Other\'s First Name', financial_info.OtherMiddleName as 'Other\'s Middle Name', financial_info.OtherLastName as 'Other\'s Last Name',
								financial_info.OtherAddress as 'Other\'s Address',	financial_info.OtherTel as 'Other\'s Landline Number', financial_info.OtherMobile as 'Other\'s Mobile Number', financial_info.OtherOccupation as 'Other\'s Occupation', financial_info.OtherCompany as 'Other\'s Company Name', financial_info.OtherBusinessPhone as 'Other\'s Business Phone Number', financial_info.OtherEmail as 'Other\'s E-mail', financial_info.OtherFax as 'Other\'s Fax Number', financial_info.OtherBusinessAddress as 'Other\'s Business Address'
								FROM applicant NATURAL JOIN admission_info 
								NATURAL JOIN contact_info 
								NATURAL JOIN father_info 
								NATURAL JOIN mother_info 
								NATURAL JOIN financial_info
								WHERE applicant.ApplicationID = '$ApplicationID'";
								
								$query_result = mysql_query($sql);
								if(!$query_result)
								{
									die('QUERY ERROR: <br> ' . mysql_error());
								}
								else
								{
									echo "<table class = 'table table-hover' style = left: 400px; width: 35%><tr>";
									
									for($i =0 ; $i<mysql_num_fields($query_result) ; $i++){
										echo "<tr>";
										echo "<th style='color: SteelBlue'><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
										if (mysql_field_name($query_result, $i) == 'Gender')
										{
											if(mysql_result($query_result,0,mysql_field_name($query_result, $i)) == 1)
											{
												print "<td>Male</td>";
											}
											else
												print "<td>Female</td>";
										}
										else
											print "<td>".mysql_result($query_result,0,mysql_field_name($query_result, $i)) ."</td>";
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
