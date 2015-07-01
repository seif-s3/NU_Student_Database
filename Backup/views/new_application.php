<!--
    ADD HERE CONFRIMATION MESSAGE
    !-->
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
                            <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> 
                            Admin <span class="caret"></span></a>
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
                            <h4><strong><p style='color: CornflowerBlue'>New Applicantion Info
									</p>
                                </strong>
                            </h4>
                        </div>
                        <div class="panel-body">
                            <?php
                                if(isset($_GET['msg']) && $_GET['msg'] == 'military')
                                {
                                	echo "<p class='bg-danger text-center'><br>Error! Males have to select a military status!<br><br> </p>";
                                }
                                else if(isset($_GET['msg']) && $_GET['msg'] == 'contact')
                                {
                                	echo "<p class='bg-danger text-center'><br>Error! Please revise your contact info.<br><br> </p>";
                                }
                                else if(isset($_GET['msg']) && $_GET['msg'] == 'school')
                                {
                                	echo "<p class='bg-danger text-center'><br>Error! Please Select a School<br><br> </p>";
                                }
                                else if(isset($_GET['msg']) && $_GET['msg'] == 'major')
                                {
                                	echo "<p class='bg-danger text-center'><br>Error! Please Select a Major<br><br> </p>";
                                }
                                else if(isset($_GET['msg']) && $_GET['msg'] == 'father')
                                {
                                	echo "<p class='bg-danger text-center'><br>Error! Please Revise Father Info<br><br> </p>";
                                }
                                else if(isset($_GET['msg']) && $_GET['msg'] == 'mother')
                                {
                                	echo "<p class='bg-danger text-center'><br>Error! Please Revise Mother Info<br><br> </p>";
                                }
                                else if(isset($_GET['msg']) && $_GET['msg'] == 'other')
                                {
                                	echo "<p class='bg-danger text-center'><br>Error! Please Specify Your Financial Guardian's info<br><br> </p>";
                                }
                                else if(isset($_GET['msg']) && $_GET['msg'] == 'pw')
                                {
                                    echo "<p class='bg-danger text-center'><br>Error! Passwords don't match<br><br> </p>";
                                }
                                else if (isset($_GET['msg']))
                                {
                                    $id = $_GET['msg'];
                                    echo "<p class='bg-success text-center'><br><strong>Application Submitted Successfully!<br>
                                            Your Application ID is $id<br>
                                            Please store it and your password somewhere safe</strong><br><br></p>";
                                }
                            ?>
                            <form onsubmit = "return validateForm()" class="form form-vertical=" action="../controllers/add_new_applicant.php" method="post" name="NewApplication">
                                <label style="color: CornflowerBlue"> <span class="auto-style3"> BASIC INFO </span> </label>
                                <hr>
                                <div class="control-group">
                                    <label> Application Password *</label>
                                    <div class="controls">
                                        <input type="password" class="form-control" placeholder="Enter Password" maxlength="45" style="width: 50%" required name="Password" id="Password">
                                    </div>
                                    <label> Confirm Password *</label>
                                    <div class="controls">
                                        <input onkeyup="checkPasswords(); return false;"type="password" class="form-control" style="width: 50%" placeholder="Confirm Password" maxlength="45" required name="Password2" id="Password2">
                                    <span id="confirmMessage" class="confirmMessage"></span>
                                    </div>
                                    
                                    <label> First Name *</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter First Name" style="width: 50%" maxlength="45" required name="FirstName">
                                    </div>
                                </div>
                                <label> Middle Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Middle Name" style="width: 50%" maxlength="45" required name="MiddleName">
                                <label> Last Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name" style="width: 50%" maxlength="45" required name="LastName">
                                <label> Date Of Birth *</label>
                                    <input type="date" class="form-control" style="width: 25%" name="DateOfBirth" required>
                                <div class="control-group">
                                    <p></p>
                                    <p>
                                        <label> Gender </label>
                                        <br>
                                        <input type="radio" name="Gender" value="Female" id="genderID" onclick="viewMil(); return false;"> Female<br>
                                        <input type="radio" name="Gender" value="Male" id="genderID" onclick="viewMil(); return false;"> Male<br>
                                    </p>
                                    <p>
                                    <div id="Military" style="visibility: hidden">
                                        <label> Military Status (required for males only)</label>
                                        <select name="MilitaryStatus" class="form-control">
                                            <option value="" disabled selected>-Status-</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Exempted">Exempted</option>
                                            <option value="Postponed">Postponed</option>
                                        </select>
                                    </div>
                                    </p>
                                    <label> Place of Birth *</label>
                                    <input type="text" class="form-control" placeholder="Enter Address" maxlength="45" required name="PlaceOfBirth">
                                    <label> National ID number </label>
                                    <input type="text" class="form-control" placeholder="Enter Number" maxlength="45" name="NationalID">
                                    <label> National ID Expiry Date </label>
                                    <input type="date" class="form-control" style="width: 24%" name="NationalIDExpiry">
                                    <label> Passport ID number </label>  
                                    <input type="text" class="form-control" placeholder="Enter Address" maxlength="45" name="Passport">
                                    <label> Passport ID Expiry Date </label>
                                    <input type="date" class="form-control"  style="width: 24%" name="PassportExpiry">
                                    <hr>
                                    <label style="color: CornflowerBlue"> <span class="auto-style3"> CONTACT INFO </span> </label>
                                    <hr>
                                    <label> Personal Email *</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="HomeEmail">
                                    <label> Home Address *</label>
                                    <input type="text" class="form-control" placeholder="Enter Address" required name="HomeAddress">
                                    <label> Home Number *</label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" required name="HomeTel">
                                    <label> Mobile Number *</label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" required name="HomeMobile">
                                    <label> Home Fax </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="HomeFax">
                                    <label> Mailing Address </label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="MailingAddress">  
                                    <label> Mailing Telephone </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingTel">
                                    <label> Mailing Mobile </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingMobile">
                                    <label> Mailing Fax </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingFax">
                                    <label> Other Email </label>
                                    <input type="email" class="form-control" placeholder="Enter Email" maxlength="45" name="MailingEmail">
                                    <hr>
                                    <label style="color: CornflowerBlue"> <span class="auto-style3">ADMISSIONS INFO</span> </label>
                                    <hr>
                                    <label> Applied  Year *</label>
                                    <select name="Year" class="form-control" required>
                                        <option value="" disabled selected>--Year--</option>
                                        <?php
                                        for($i = date("Y")+1 ; $i>= date("Y")  ; $i--)
                                        {
                                            echo "<option value='$i'>$i</option>"; 
                                        }
                                        ?>
                                    </select>
                                    <label> Applied  Semester *</label>
                                    <select name="SemesterOfApplication" class="form-control" required>
                                        <option value="" disabled selected>--Semester--</option>
                                        <option value="Fall">Fall</option>
                                        <option value="Spring">Spring</option>
                                    </select>
                                    <p>
                                    </p>
                                    <label> School Applied *</label>
                                    <select name="AppliedSchool" class="form-control" required >
                                        <option value="" disabled selected>--School--</option>
                                        <option value="" disabled selected>--Major--</option>
                                        <?php
                                        require_once("./functions.php");
                                        dropdown_all_schools();
                                        ?>
                                    </select>
                                    </p>
                                    <p>
                                        <label> Intended Major *</label>
                                        <select name="IntendedMajor" class="form-control" required >
                                            <option value="" disabled selected>--Major--</option>
                                            <?php
                                            require_once("./functions.php");
                                            dropdown_all_majors();
                                            ?>
                                        </select>
                                    </p>
                                    <label> TOEFL Results </label>
                                    <input type="number" class="form-control" placeholder="Enter Number"  style="width: 24%" min="0" max="9999" name="TOEFLResults">
                                    <label> TOEFL Date </label>
                                    <input type="date" class="form-control" style="width: 24%" name="TOEFLDate">
                                    <hr>
                                    <label style="color: CornflowerBlue"> <span class="auto-style3">HIGH SCHOOL INFO</span> </label>
                                    <hr>
                                    <label> Current(Last) School* </label>
                                    <input type="text" class="form-control" placeholder="Enter School Name" maxlength="45" name="CurrentSchool" required>
                                    <p>
                                    </p>
                                    <p>
                                        <label> Type of School *</label>
                                        <select name="TypeOfSchool" class="form-control" required>
                                            <option value="" disabled selected>-Type-</option>
                                            <option value="Public">Public</option>
                                            <option value="Private">Private</option>
                                        </select>
                                    </p>
                                    <p>
                                        <label> Type of Certificate *</label>
                                        <select name="TypeOfCertificate" class="form-control" required>
                                            <option value="" disabled selected>-Type-</option>
                                            <option value="IGCSE">IGCSE</option>
                                            <option value="Thanaweya Amma">Thanaweya Amma</option>
                                            <option value="French Baccalaureate">French Baccalaureate</option>
                                            <option value="German Abitur">German Abitur</option>
                                            <option value="American Diploma">American Diploma</option>
                                            <option value="Thanaweya Arab">Thanaweya Amma from Arab Countries</option>
                                        </select>
                                    </p>
                                    <p>
                                        <label> School Address </label>
                                        <input type="text" class="form-control" placeholder="Enter Address" name="SchoolAddress">
                                    </p>
                                    <label> Language of Instruction </label>
                                    <select name="LanguageOfInstruction" class="form-control">
                                        <option value="" disabled selected>-Language-</option>
                                        <option value="Arabic">Arabic</option>
                                        <option value="English">English</option>
                                        <option value="French">French</option>
                                        <option value="German">German</option>
                                    </select>
                                    <hr>
                                    <label style="color: CornflowerBlue"> <span class="auto-style3">PARENTS INFO</span> </label>
                                    <hr>
                                    <label text-align: center style="color: Gray"> Father's Info </label>
                                    <hr>
                                    <label> Father's First Name *</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" required name="FatherFirstName">
                                    </div>
                                    <label> Father's Middle Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" required name="FatherMiddleName">
                                    <label> Father's Last Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" required name="FatherLastName">
                                    </p>
                                    <label> Father's Telephone *</label>
                                    <input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" required name="FatherTel">
                                    <label> Father's Mobile *</label>
                                    <input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" required name="FatherMobile">
                                    <label> Father's Email *</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="FatherEmail">
                                    <label> Father's Occupation *</label>
                                    <input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" required name="FatherOccupation">
                                    <label> Father's Address </label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="FatherAddress">
                                    <label> Father's Company </label>
                                    <input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="FatherCompany">
                                    <label> Father's Business Telephone </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="FatherBusinessPhone">
                                    <label> Father's Fax Number </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="FatherFax">
                                    <label> Father's Business Address </label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="FatherBusinessAddress">
                                    <hr>
                                    <label style="color: Gray"> Mother's Info </label>
                                    <hr>
                                    <label> Mother's First Name *</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" required name="MotherFirstName">
                                    </div>
                                    <label> Mother's Middle Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" required name="MotherMiddleName">
                                    <label> Mother's Last Name *</label>
                                    <input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" required name="MotherLastName">
                                    </p>
                                    <label> Mother's Telephone *</label>
                                    <input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" required name="MotherTel">
                                    <label> Mother's Mobile *</label>
                                    <input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" required name="MotherMobile">
                                    <label> Mother's Email *</label>
                                    <input type="email" class="form-control" placeholder="Enter Email" required maxlength="45" name="MotherEmail">
                                    <label> Mother's Occupation *</label>
                                    <input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" required name="MotherOccupation">
                                    <label> Mother's Address </label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="MotherAddress">
                                    <label> Mother's Company </label>
                                    <input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="MotherCompany">
                                    <label> Mother's Business Telephone </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MotherBusinessPhone">
                                    <label> Mother's Fax Number </label>
                                    <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MotherFax">
                                    <label> Mother's Business Address </label>
                                    <input type="text" class="form-control" placeholder="Enter Address" name="MotherBusinessAddress">
                                    <hr>
                                    <label style="color: CornflowerBlue"> <span class="auto-style3">FINANCIAL INFO</span> </label>
                                    <hr>
                                    <p>
                                        <label> Relationship *</label>
                                        <br>
                                        <input type="radio" name="Relationship" value="Father" required> Father<br>
                                        <input type="radio" name="Relationship" value="Mother" required> Mother<br>
                                        <input type="radio" name="Relationship" value="Other" required> Other (Please Specify their info below)<br>
                                    </p>
                                    <p>
                                        <label> Other </label>
                                        <input type="text" class="form-control" placeholder="Enter Relationship" name="Other">
                                    </p>
                                    <label> First Name </label>
                                    <div class="controls">
                                        <input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" name="OtherFirstName">
                                    </div>
                                </div>
                                <label> Middle Name </label>
                                <input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" name="OtherMiddleName">
                                <label> Last Name </label>
                                <input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" name="OtherLastName">
                                <p>
                                </p>
                                <label> Other's Address </label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="OtherAddress">
                                <label> Other's Telephone </label>
                                <input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" name="OtherTel">
                                <label> Other's Mobile </label>
                                <input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" name="OtherMobile">
                                <label> Other's Email </label>
                                <input type="email" class="form-control" placeholder="Enter Email" maxlength="45" name="OtherEmail">
                                <label> Other's Occupation </label>
                                <input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" name="OtherOccupation">
                                <label> Other's Company </label>
                                <input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="OtherCompany">
                                <label> Other's Business Telephone </label>
                                <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="OtherBusinessPhone">
                                <label> Other's Fax Number </label>
                                <input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="OtherFax">
                                <label> Other's Business Address </label>
                                <input type="text" class="form-control" placeholder="Enter Address" name="OtherBusinessAddress">
                                <div class="control-group">
                                    <label></label>
                                    <div class="controls">
                                        <button type="submit" class="btn btn-primary">
                                        Submit
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript">
        function validateForm()
        {
            if(document.forms["NewApplication"]["Password"] != document.forms["NewApplication"]["Password2"])
            {
                alert("Passwords do not match");
                return false;
            }
            if(document.forms["NewApplication"]["HomeEmail"] == "" || document.forms["NewApplication"]["HomeAddress"] == "" 
                || document.forms["NewApplication"]["HomeTel"] == "" || document.forms["NewApplication"]["HomeMobile"] == "")
            {
                alert("Missing Contact info");
                return false;
            }
        }
        </script>
        <script type="text/javascript">
        function checkPasswords()
        {
            var pass1 = document.getElementById('Password');
            var pass2 = document.getElementById('Password2');
            //Store the Confimation Message Object ...
            var message = document.getElementById('confirmMessage');
            //Set the colors we will be using ...
            var goodColor = "#66cc66";
            var badColor = "#ff6666";
            //Compare the values in the password field 
            //and the confirmation field
            if(pass1.value == pass2.value)
            {
                message.style.color = goodColor;
                message.innerHTML = "Passwords Match!";
            }
            else
            {
                message.style.color = badColor;
                message.innerHTML = "Passwords Do Not Match!";
            }
        }
        function viewMil()
        {
            if(document.getElementById("genderID") == 'Male')
            {
                document.getElementById("Military").visibility = 'visible';
            }
            else
            {
                document.getElementById('Military').visibility = 'hidden';
            }
        }
        </script>
    </body>
</html>