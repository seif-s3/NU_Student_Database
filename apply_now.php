<html>
<head>
	<title>Nile University Application</title>
	<link href="./bootstrap.css" rel="stylesheet">
	<link href="./images/NU.ico"  rel="shortcut icon">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
	<script lang="text/javascript" src="./formToWizard.js"></script>
	<script type="text/javascript">
		function viewMil()
		{
			$("#MilitaryDiv").show();
		}
		function hideMil()
		{
			$("#MilitaryDiv").hide();
		}
		function showOtherFinancial()
		{
			$("#otherFinancial").show();
		}
		function hideOtherFinancial()
		{
			$("#otherFinancial").hide();
		}
		function showAllSteps()
		{
			$("#step0").show();
			$("#step1").show();
			$("#step2").show();
			$("#step3").show();
			$("#step4").show();
			$("#step5").show();
			$("#step6").show();
		}
		function hideAllSteps()
		{
			$("#step0").hide();
			$("#step1").hide();
			$("#step2").hide();
			$("#step3").hide();
			$("#step4").hide();
			$("#step5").hide();
			$("#step6").hide();
		}
		function checkPasswords()
        {
            var pass1 = document.getElementById('Password');
            var pass2 = document.getElementById('Password2');
            //Store the Confirmation Message Object ...
            var message = document.getElementById('confirmMessage');
            //Set the colours we will be using ...
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
		function validateForm()
		{
			var errors = "";
			var pass1=document.getElementById("Password");
			var pass2=document.getElementById("Password2");
			
			
			if(pass1 != pass2)
				errors.concat("- Passwords Do no match.\n");
			if(document.getElementById("NationalID") == "" && document.getElementById("Passport") == "" )
				errors.concat("- Must provide either National ID or Passport Number.\n");
			if(document.getElementById("Gender") == "Male" && document.getElementById("MilitaryStatus") == "")
				errors.concat("- Males must provide a military status.\n");
			
			if(errors.length > 0)
			{
				$("#error_panel").show();
				return false;
			}
		}
	</script>
</head>
<body>
<nav class="navbar navbar-default">
<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
      </button>
      <a class="navbar-brand" href="#"><IMG SRC="./images/NU LOGO.png" style="width:50px;height:25px"></a>
 </div>
<div class="container-fluid">
<a class="navbar-brand" href="Admin_home.html"> Undergraduate Application Form </a>
</div> <!-- end navbar container -->
</nav>
<div class="container">
<div class="bs-docs-section">
<?php
if (isset($_GET['msg']))
{
	$id = $_GET['msg'];
	echo "<p class='bg-success text-center'><br><strong>Application Submitted Successfully!<br>
			Your Application ID is $id<br>
			Please store it and your password somewhere safe</strong><br><br></p>";
}
?>
</div>

<div id="error_panel" class="panel panel-danger">
  <div class="panel-heading">
    <h3 class="panel-title">The following errors were found, please correct them and resubmit.</h3>
  </div>

  <div id="error_panel_content" class="panel-body">
  </div>
</div>

<form id="NewApplication" class="form-vertical" action="./controllers/add_new_applicant.php" method="post">
<fieldset>
	<legend style="color: CornflowerBlue"> <span class="auto-style3"> BASIC INFO </span> </legend>
		<label><b> Application Password *</b></label>
		<div class="controls">
			<input data-container="body" data-toggle="popover" data-placement="left" data-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-original-title="" title="" type="password" onkeyup="checkPasswords(); return false;" class="form-control" placeholder="Enter Password" maxlength="45" style="width: 50%" required name="Password" id="Password">
		</div>
		<label><b> Confirm Password *</b></label>
		<div class="controls">
			<input onkeyup="checkPasswords(); return false;" type="password" class="form-control" style="width: 50%" placeholder="Confirm Password" maxlength="45" required name="Password2" id="Password2">
		<span id="confirmMessage" class="confirmMessage"></span>
		</div>
		
		<label><b> First Name *</b></label>
		<div class="controls">
			<input type="text" class="form-control" placeholder="Enter First Name" style="width: 50%" maxlength="45" required name="FirstName">
		</div>
		<label><b> Middle Name *</b></label>
		<div class="controls">	
			<input type="text" class="form-control" placeholder="Enter Middle Name" style="width: 50%" maxlength="45" required name="MiddleName">
		</div>
		<label><b> Last Name *</b></label>
		<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Last Name" style="width: 50%" maxlength="45" required name="LastName">
		</div>
		<label><b> Date Of Birth *</b></label>
		<div class="controls">
			<input type="date" class="form-control" style="width: 25%" name="DateOfBirth" required>
		</div>
		<label><b> Gender </b></label>
		<div class="controls">
		<input type="radio" name="Gender" value="Female" id="genderID" onclick="hideMil()"> Female<br>
		<input type="radio" name="Gender" value="Male" id="genderID" onclick="viewMil()"> Male<br>
		</div>
		<div id="MilitaryDiv">
			<label><b> Military Status </b></label>
			<div class="controls">
			<select name="MilitaryStatus" class="form-control">
				<option value="" disabled selected>-Status-</option>
				<option value="Completed">Completed</option>
				<option value="Exempted">Exempted</option>
				<option value="Postponed">Postponed</option>
			</select>
			</div>
		</div>
			<label><b> Place of Birth *</b></label>
			<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Address" maxlength="45" required name="PlaceOfBirth">
			</div>
			<label><b> National ID number </b></label>
			<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Number" maxlength="45" name="NationalID">
			</div>
			<label><b> National ID Expiry Date </b></label>
			<div class="controls">
			<input type="date" class="form-control" style="width: 24%" name="NationalIDExpiry">
			</div>
			<label><b> Passport ID number </b></label>  
			<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Address" maxlength="45" name="Passport">
			</div>
			<label><b> Passport ID Expiry Date </b></label>
			<div class="controls">
			<input type="date" class="form-control"  style="width: 24%" name="PassportExpiry">
			</div>
<p></p>
</fieldset>

<fieldset>
	<legend style="color: CornflowerBlue"> <span class="auto-style3"> CONTACT INFO </span> </legend>
	<label><b> Personal Email *</b></label>
	<div class="controls">
	<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="HomeEmail">
	</div>
	<label><b> Home Address *</b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" required name="HomeAddress">
	</div>
	<label><b> Home Number *</b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" required name="HomeTel">
	</div>
	<label><b> Mobile Number *</b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" required name="HomeMobile">
	</div>
	<label><b> Home Fax </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="HomeFax">
	</div>
	<label><b> Mailing Address </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" name="MailingAddress">  
	</div>
	<label><b> Mailing Telephone </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingTel">
	</div>
	<label><b> Mailing Mobile </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingMobile">
	</div>
	<label><b> Mailing Fax </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingFax">
	</div>
	<label><b> Other Email </b></label>
	<div class="controls">
	<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" name="MailingEmail">
	</div>
<p></p>
</fieldset>

<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">ADMISSIONS INFO</span> </legend>
<label><b> Applied  Year *</b></label>
<div class="controls">
<select name="Year" class="form-control" required>
	<option value="" disabled selected>--Year--</option>
	<?php
	for($i = date("Y")+1 ; $i>= date("Y")  ; $i--)
	{
		echo "<option value='$i'>$i</option>"; 
	}
	?>
</select>
</div>
<label><b> Applied  Semester *</b></label>
<div class="controls">
<select name="SemesterOfApplication" class="form-control" required>
	<option value="" disabled selected>--Semester--</option>
	<option value="Fall">Fall</option>
	<option value="Spring">Spring</option>
</select>
</div>
<label><b> School Applied *</b></label>
<div class="controls">
<select name="AppliedSchool" class="form-control" required >
	<option value="" disabled selected>--School--</option>
	<?php
	require_once("./functions.php");
	dropdown_all_schools();
	?>
</select>
</div>
<label><b> Intended Major *</b></label>
<div class="controls">
<select name="IntendedMajor" class="form-control" required >
	<option value="" disabled selected>--Major--</option>
	<?php
	require_once("./functions.php");
	dropdown_all_majors();
	?>
</select>
</div>
<label><b> TOEFL Results </b></label>
<div class="controls">
<input type="number" class="form-control" placeholder="Enter Number"  style="width: 24%" min="0" max="9999" name="TOEFLResults">
</div>
<label><b> TOEFL Date </b></label>
<div class="controls">
<input type="date" class="form-control" style="width: 24%" name="TOEFLDate">
</div>
<p></p>
</fieldset>

<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">HIGH SCHOOL INFO</span> </legend>
<label><b> Current(Last) School* </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter School Name" maxlength="45" name="CurrentSchool" required>
</div>
<label><b> Type of School *</b></label>
<div class="controls">
<select name="TypeOfSchool" class="form-control" required>
	<option value="" disabled selected>-Type-</option>
	<option value="Public">Public</option>
	<option value="Private">Private</option>
</select>
</div>
<label><b> Type of Certificate *</b></label>
<div class="controls">
<select name="TypeOfCertificate" class="form-control" required>
	<option value="" disabled selected>-Type-</option>
	<option value="IGCSE">IGCSE</option>
	<option value="Thanaweya Amma">Thanaweya Amma</option>
	<option value="French Baccalaureate">French Baccalaureate</option>
	<option value="German Abitur">German Abitur</option>
	<option value="American Diploma">American Diploma</option>
	<option value="Thanaweya Arab">Thanaweya Amma from Arab Countries</option>
</select>
</div>
<label><b> School Address </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="SchoolAddress">
</div>
<label><b> Language of Instruction </b></label>
<div class="controls">
<select name="LanguageOfInstruction" class="form-control">
	<option value="" disabled selected>-Language-</option>
	<option value="Arabic">Arabic</option>
	<option value="English">English</option>
	<option value="French">French</option>
	<option value="German">German</option>
</select>
</div>
<p></p>
</fieldset>
<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">FATHER INFO</span> </legend>

<label><b> Father's First Name *</b></label>
<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" required name="FatherFirstName">
</div>
<label><b> Father's Middle Name *</b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" required name="FatherMiddleName">
</div>
<label><b> Father's Last Name *</b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" required name="FatherLastName">
</div>
<label><b> Father's Telephone *</b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" required name="FatherTel">
</div>
<label><b> Father's Mobile *</b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" required name="FatherMobile">
</div>
<label><b> Father's Email *</b></label>
<div class="controls">
<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="FatherEmail">
</div>
<label><b> Father's Occupation *</b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" required name="FatherOccupation">
</div>
<label><b> Father's Address </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="FatherAddress">
</div>
<label><b> Father's Company </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="FatherCompany">
</div>
<label><b> Father's Business Telephone </b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="FatherBusinessPhone">
</div>
<label><b> Father's Fax Number </b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="FatherFax">
</div>
<label><b> Father's Business Address </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="FatherBusinessAddress">
</div>
<p></p>
</fieldset>

<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">MOTHER INFO</span> </legend>

<label><b> Mother's First Name *</b></label>
<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" required name="MotherFirstName">
</div>
<label><b> Mother's Middle Name *</b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" required name="MotherMiddleName">
</div>
<label><b> Mother's Last Name *</b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" required name="MotherLastName">
</div>
<label><b> Mother's Telephone *</b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" required name="MotherTel">
</div>
<label><b> Mother's Mobile *</b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" required name="MotherMobile">
</div>
<label><b> Mother's Email *</b></label>
<div class="controls">
<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="MotherEmail">
</div>
<label><b> Mother's Occupation *</b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" required name="MotherOccupation">
</div>
<label><b> Mother's Address </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="MotherAddress">
</div>
<label><b> Mother's Company </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="MotherCompany">
</div>
<label><b> Mother's Business Telephone </b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MotherBusinessPhone">
</div>
<label><b> Mother's Fax Number </b></label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MotherFax">
</div>
<label><b> Mother's Business Address </b></label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="MotherBusinessAddress">
</div>
<p></p>
</fieldset>


<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">FINANCIAL INFO</span> </legend>
<label><b> Relationship *</b></label>
<div class="controls">
	<input type="radio" name="Relationship" value="Father" required onclick="hideOtherFinancial()"> Father<br>
	<input type="radio" name="Relationship" value="Mother" required onclick="hideOtherFinancial()"> Mother<br>
	<input type="radio" name="Relationship" value="Other" required onclick="showOtherFinancial()"> Other (Please Specify their info below)<br>
</div>
<div id="otherFinancial" visibility="hidden">
	<label><b> Other </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Relationship" name="Other">
	</div>
	<label><b> First Name </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" name="OtherFirstName">
	</div>
	<label><b> Middle Name </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" name="OtherMiddleName">
	</div>
	<label><b> Last Name </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" name="OtherLastName">
	</div>
	<label><b> Other's Address </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" name="OtherAddress">
	</div>
	<label><b> Other's Telephone </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" name="OtherTel">
	</div>
	<label><b> Other's Mobile </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" name="OtherMobile">
	</div>
	<label><b> Other's Email </b></label>
	<div class="controls">
	<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" name="OtherEmail">
	</div>
	<label><b> Other's Occupation </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" name="OtherOccupation">
	</div>
	<label><b> Other's Company </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="OtherCompany">
	</div>
	<label><b> Other's Business Telephone </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="OtherBusinessPhone">
	</div>
	<label><b> Other's Fax Number </b></label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="OtherFax">
	</div>
	<label><b> Other's Business Address </b></label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" name="OtherBusinessAddress">
	</div>
	<p></p>
</div>

<label></label>
<div class="controls">
	<button type="submit" class="btn btn-primary">
		Submit
	</button>
	<br><br>
</div>
</div>
</fieldset>
</form>

<script type="text/javascript">	
	$("#NewApplication").formToWizard();
	hideOtherFinancial();
	hideMil();
	$("#error_panel").hide();
</script>

</body>

</div> <!-- Container End !-->

</html>