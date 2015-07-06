<html>
<head>
	<title>Nile University Application</title>
	<link href="./bootstrap.css" rel="stylesheet">
	<link href="./favicon.ico"  rel="shortcut icon">
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
	</script>
</head>
<body>
<nav class="navbar navbar-default">
<div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><IMG SRC="./NU LOGO.png" style="width:50px;height:30px"></a>
 </div>
<div class="container-fluid">
<a class="navbar-brand" href="Admin_home.html"> NU Undergrad Application Form </a>
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
<form id="NewApplication" onsubmit = "return validateForm()" class="form-vertical" action="./controllers/add_new_applicant.php" method="post">
<fieldset>
	<legend style="color: CornflowerBlue"> <span class="auto-style3"> BASIC INFO </span> </legend>
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
		<label> Middle Name *</label>
		<div class="controls">	
			<input type="text" class="form-control" placeholder="Enter Middle Name" style="width: 50%" maxlength="45" required name="MiddleName">
		</div>
		<label> Last Name *</label>
		<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Last Name" style="width: 50%" maxlength="45" required name="LastName">
		</div>
		<label> Date Of Birth *</label>
		<div class="controls">
			<input type="date" class="form-control" style="width: 25%" name="DateOfBirth" required>
		</div>
		<label> Gender </label>
		<div class="controls">
		<input type="radio" name="Gender" value="Female" id="genderID" onclick="hideMil()"> Female<br>
		<input type="radio" name="Gender" value="Male" id="genderID" onclick="viewMil()"> Male<br>
		</div>
		<div id="MilitaryDiv">
			<label> Military Status </label>
			<div class="controls">
			<select name="MilitaryStatus" class="form-control">
				<option value="" disabled selected>-Status-</option>
				<option value="Completed">Completed</option>
				<option value="Exempted">Exempted</option>
				<option value="Postponed">Postponed</option>
			</select>
			</div>
		</div>
			<label> Place of Birth *</label>
			<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Address" maxlength="45" required name="PlaceOfBirth">
			</div>
			<label> National ID number </label>
			<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Number" maxlength="45" name="NationalID">
			</div>
			<label> National ID Expiry Date </label>
			<div class="controls">
			<input type="date" class="form-control" style="width: 24%" name="NationalIDExpiry">
			</div>
			<label> Passport ID number </label>  
			<div class="controls">
			<input type="text" class="form-control" placeholder="Enter Address" maxlength="45" name="Passport">
			</div>
			<label> Passport ID Expiry Date </label>
			<div class="controls">
			<input type="date" class="form-control"  style="width: 24%" name="PassportExpiry">
			</div>
<p></p>
</fieldset>

<fieldset>
	<legend style="color: CornflowerBlue"> <span class="auto-style3"> CONTACT INFO </span> </legend>
	<label> Personal Email *</label>
	<div class="controls">
	<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="HomeEmail">
	</div>
	<label> Home Address *</label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" required name="HomeAddress">
	</div>
	<label> Home Number *</label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" required name="HomeTel">
	</div>
	<label> Mobile Number *</label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" required name="HomeMobile">
	</div>
	<label> Home Fax </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="HomeFax">
	</div>
	<label> Mailing Address </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" name="MailingAddress">  
	</div>
	<label> Mailing Telephone </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingTel">
	</div>
	<label> Mailing Mobile </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingMobile">
	</div>
	<label> Mailing Fax </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MailingFax">
	</div>
	<label> Other Email </label>
	<div class="controls">
	<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" name="MailingEmail">
	</div>
<p></p>
</fieldset>

<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">ADMISSIONS INFO</span> </legend>
<label> Applied  Year *</label>
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
<label> Applied  Semester *</label>
<div class="controls">
<select name="SemesterOfApplication" class="form-control" required>
	<option value="" disabled selected>--Semester--</option>
	<option value="Fall">Fall</option>
	<option value="Spring">Spring</option>
</select>
</div>
<label> School Applied *</label>
<div class="controls">
<select name="AppliedSchool" class="form-control" required >
	<option value="" disabled selected>--School--</option>
	<option value="" disabled selected>--Major--</option>
	<?php
	require_once("./functions.php");
	dropdown_all_schools();
	?>
</select>
</div>
<label> Intended Major *</label>
<div class="controls">
<select name="IntendedMajor" class="form-control" required >
	<option value="" disabled selected>--Major--</option>
	<?php
	require_once("./functions.php");
	dropdown_all_majors();
	?>
</select>
</div>
<label> TOEFL Results </label>
<div class="controls">
<input type="number" class="form-control" placeholder="Enter Number"  style="width: 24%" min="0" max="9999" name="TOEFLResults">
</div>
<label> TOEFL Date </label>
<div class="controls">
<input type="date" class="form-control" style="width: 24%" name="TOEFLDate">
</div>
<p></p>
</fieldset>

<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">HIGH SCHOOL INFO</span> </legend>
<label> Current(Last) School* </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter School Name" maxlength="45" name="CurrentSchool" required>
</div>
<label> Type of School *</label>
<div class="controls">
<select name="TypeOfSchool" class="form-control" required>
	<option value="" disabled selected>-Type-</option>
	<option value="Public">Public</option>
	<option value="Private">Private</option>
</select>
</div>
<label> Type of Certificate *</label>
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
<label> School Address </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="SchoolAddress">
</div>
<label> Language of Instruction </label>
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

<label> Father's First Name *</label>
<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" required name="FatherFirstName">
</div>
<label> Father's Middle Name *</label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" required name="FatherMiddleName">
</div>
<label> Father's Last Name *</label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" required name="FatherLastName">
</div>
<label> Father's Telephone *</label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" required name="FatherTel">
</div>
<label> Father's Mobile *</label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" required name="FatherMobile">
</div>
<label> Father's Email *</label>
<div class="controls">
<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="FatherEmail">
</div>
<label> Father's Occupation *</label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" required name="FatherOccupation">
</div>
<label> Father's Address </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="FatherAddress">
</div>
<label> Father's Company </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="FatherCompany">
</div>
<label> Father's Business Telephone </label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="FatherBusinessPhone">
</div>
<label> Father's Fax Number </label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="FatherFax">
</div>
<label> Father's Business Address </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="FatherBusinessAddress">
</div>
<p></p>
</fieldset>

<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">MOTHER INFO</span> </legend>

<label> Mother's First Name *</label>
<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" required name="MotherFirstName">
</div>
<label> Mother's Middle Name *</label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" required name="MotherMiddleName">
</div>
<label> Mother's Last Name *</label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" required name="MotherLastName">
</div>
<label> Mother's Telephone *</label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" required name="MotherTel">
</div>
<label> Mother's Mobile *</label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" required name="MotherMobile">
</div>
<label> Mother's Email *</label>
<div class="controls">
<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" required name="MotherEmail">
</div>
<label> Mother's Occupation *</label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" required name="MotherOccupation">
</div>
<label> Mother's Address </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="MotherAddress">
</div>
<label> Mother's Company </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="MotherCompany">
</div>
<label> Mother's Business Telephone </label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MotherBusinessPhone">
</div>
<label> Mother's Fax Number </label>
<div class="controls">
<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="MotherFax">
</div>
<label> Mother's Business Address </label>
<div class="controls">
<input type="text" class="form-control" placeholder="Enter Address" name="MotherBusinessAddress">
</div>
<p></p>
</fieldset>


<fieldset>
<legend style="color: CornflowerBlue"> <span class="auto-style3">FINANCIAL INFO</span> </legend>
<label> Relationship *</label>
<div class="controls">
	<input type="radio" name="Relationship" value="Father" required onclick="hideOtherFinancial()"> Father<br>
	<input type="radio" name="Relationship" value="Mother" required onclick="hideOtherFinancial()"> Mother<br>
	<input type="radio" name="Relationship" value="Other" required onclick="showOtherFinancial()"> Other (Please Specify their info below)<br>
</div>
<div id="otherFinancial" visibility="hidden">
	<label> Other </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Relationship" name="Other">
	</div>
	<label> First Name </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Fist Name" maxlength="45" name="OtherFirstName">
	</div>
	<label> Middle Name </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Middle Name" maxlength="45" name="OtherMiddleName">
	</div>
	<label> Last Name </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Last Name" maxlength="45" name="OtherLastName">
	</div>
	<label> Other's Address </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" name="OtherAddress">
	</div>
	<label> Other's Telephone </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Telephone" maxlength="45" name="OtherTel">
	</div>
	<label> Other's Mobile </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Mobile" maxlength="45" name="OtherMobile">
	</div>
	<label> Other's Email </label>
	<div class="controls">
	<input type="email" class="form-control" placeholder="Enter Email" maxlength="45" name="OtherEmail">
	</div>
	<label> Other's Occupation </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Occupation" maxlength="45" name="OtherOccupation">
	</div>
	<label> Other's Company </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Name" maxlength="45" name="OtherCompany">
	</div>
	<label> Other's Business Telephone </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="OtherBusinessPhone">
	</div>
	<label> Other's Fax Number </label>
	<div class="controls">
	<input type="tel" class="form-control" placeholder="Enter Number" maxlength="45" name="OtherFax">
	</div>
	<label> Other's Business Address </label>
	<div class="controls">
	<input type="text" class="form-control" placeholder="Enter Address" name="OtherBusinessAddress">
	</div>
	<p></p>
</div>

<label></label>
<div class="controls">
	<button type="submit" onclick="showAllSteps();" class="btn btn-primary">
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
</script>

</body>
</div>

</div> <!-- Container End !-->

</html>