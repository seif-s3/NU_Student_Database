<html>
<head>
	<title>Nile University Application</title>
	<link href="../bootstrap.css" rel="stylesheet">
	<link href="../images/NU.ico"  rel="shortcut icon">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
	<script lang="text/javascript" src="../formToWizard.js"></script>
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
      <a class="navbar-brand" href="#"><IMG SRC="../images/NU LOGO.png" style="width:50px;height:25px"></a>
 </div>
<div class="container-fluid">
<a class="navbar-brand" href="Admin_home.html"> NU Undergrad Application Form </a>
</div> <!-- end navbar container -->
</nav>
<div class="container">
<div class="bs-docs-section">
<fieldset>
	<legend style="color: CornflowerBlue"> <span class="auto-style3"> Applicant's Detailed Information </span> </legend>
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
				echo "<th><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
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
</fieldset>
</div>
</div> <!-- Container End !-->
</html>