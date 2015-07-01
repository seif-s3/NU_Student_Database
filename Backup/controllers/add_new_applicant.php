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
	// Get Application ID from last query -- All subsequent adding to table MUST include this variable
	$Year = $_POST['Year'];
	$SemesterOfApplication = $_POST['SemesterOfApplication'];
	$Password = $_POST['Password'];
	$Password2 = $_POST['Password2'];

	if($Password != $Password2)
	{
		header("location: $referred?msg=pw");
	}

	$sql = mysql_query("SELECT ApplicationID from admission_info WHERE SemesterOfApplication='$SemesterOfApplication' AND Year='$Year' 
		ORDER BY ApplicationID DESC LIMIT 1");
	if(mysql_num_rows($sql) == 0)
	{
		$ApplicationID = $Year%100 * 100000;
		if($SemesterOfApplication == 'Fall')
			$ApplicationID += 10001;
		else
			$ApplicationID += 20001;
	}
	else
	{
		$ApplicationID = mysql_result($sql, 0, 'ApplicationID') + 1;
	}
	
	echo ("New Application ID: " . $ApplicationID . "<br>");
	// Clear $_POST to prevent against SQL injections
	$_POST = f_clean($_POST);
	// Get applicant table attributes from form
	$FirstName = $_POST['FirstName'];
	$MiddleName = $_POST['MiddleName'];
	$LastName = $_POST['LastName'];
	$DateOfBirth = $_POST['DateOfBirth'];
	$MilitaryStatus = $_POST['MilitaryStatus'];
	$PlaceOfBirth = $_POST['PlaceOfBirth'];
	$NationalID = $_POST['NationalID'];
	$NationalIDExpiry = $_POST['NationalIDExpiry'];
	$Passport = $_POST['Passport'];
	$PassportExpiry = $_POST['PassportExpiry'];
	$Gender = $_POST['Gender'];
	
	if($Gender == "Male")
	{
		$Gender = 1;
		if($MilitaryStatus == "")
		{
			header("location: $referred?msg=military");
			//die('Error: Males Should have a Military Status! <br>');
		}
	}
	else if($Gender == "Female")
	{
		$Gender = 0;
	}
	$applicant_sql = "INSERT INTO applicant (ApplicationID, FirstName, MiddleName, LastName, DateOfBirth, IsMale, MilitaryStatus, PlaceOfBirth, NationalID, NationalIDExpiry, Passport, PassportExpiry, ApplicationPassword)
		VALUES ('$ApplicationID','$FirstName','$MiddleName' , '$LastName', '$DateOfBirth' , $Gender, '$MilitaryStatus', '$PlaceOfBirth', '$NationalID', '$NationalIDExpiry', '$Passport', '$PassportExpiry', '$Password');
		";
	echo "Applicant Table QUERY <br>" . $applicant_sql . "<br>";
	// Add contact_info
	$HomeEmail	= $_POST['HomeEmail'];
	$HomeAddress= $_POST['HomeAddress'];
	$HomeTel= $_POST['HomeTel'];
	$HomeMobile= $_POST['HomeMobile'];
	$HomeFax= $_POST['HomeFax'];
	$MailingAddress= $_POST['MailingAddress'];
	$MailingTel= $_POST['MailingTel'];
	$MailingMobile= $_POST['MailingMobile'];
	$MailingFax= $_POST['MailingFax'];
	$MailingEmail= $_POST['MailingEmail'];
	if($HomeEmail == "" || $HomeAddress == "" || $HomeTel == "" || $HomeMobile == "")
	{
		header("location: $referred?msg=contact");
	}
	$contact_sql = "INSERT INTO contact_info
					(ApplicationID, HomeAddress, HomeTel, HomeMobile, HomeFax, HomeEmail, MailingAddress, MailingTel, MailingMobile, MailingFax, MailingEmail)
			VALUES ('$ApplicationID', '$HomeAddress', '$HomeTel', '$HomeMobile', '$HomeFax', '$HomeEmail', '$MailingAddress', '$MailingTel', '$MailingMobile', '$MailingFax', '$MailingEmail');";
	
	echo "Contact_Info QUERY <br>" . $contact_sql . "<br>";
	// Add admission_info
	$Year = $_POST['Year'];
	$SemesterOfApplication = $_POST['SemesterOfApplication'];
	$AppliedSchool = $_POST['AppliedSchool'];
	$IntendedMajor = $_POST['IntendedMajor'];
	$TOEFLResults = $_POST['TOEFLResults'];
	$TOEFLDate = $_POST['TOEFLDate'];
	
	if($AppliedSchool == "")
	{
		header("location: $referred?msg=school");
	}
	if($IntendedMajor == "")
	{
		header("location: $referred?msg=major");
	}
	$admission_sql = "INSERT INTO admission_info
	(ApplicationID, SemesterOfApplication, Year, AppliedSchool, IntendedMajor, TOEFLResults, TOEFLDate)
	VALUES ('$ApplicationID', '$SemesterOfApplication', '$Year', '$AppliedSchool', '$IntendedMajor', '$TOEFLResults', '$TOEFLDate');";

	echo "Admission_Info QUERY <br> " . $admission_sql . "<br>";
	// Add father_info
	$FatherFirstName = $_POST['FatherFirstName'];
	$FatherMiddleName = $_POST['FatherMiddleName'];
	$FatherLastName = $_POST['FatherLastName'];
	$FatherAddress = $_POST['FatherAddress'];
	$FatherTel = $_POST['FatherTel'];
	$FatherMobile = $_POST['FatherMobile'];
	$FatherOccupation = $_POST['FatherOccupation'];
	$FatherCompany = $_POST['FatherCompany'];
	$FatherBusinessPhone = $_POST['FatherBusinessPhone'];
	$FatherEmail = $_POST['FatherEmail'];
	$FatherFax = $_POST['FatherFax'];
	$FatherBusinessAddress = $_POST['FatherBusinessAddress'];
	
	if($FatherFirstName == "" || $FatherMiddleName=="" || $FatherLastName==""  || $FatherTel==""
		|| $FatherMobile =="" || $FatherOccupation == ""  || $FatherEmail == "")
		{
			header("location: $referred?msg=father");
		}
	$father_sql = "INSERT INTO father_info
			(ApplicationID, FatherFirstName, FatherMiddleName, FatherLastName, FatherAddress, FatherTel, FatherMobile, FatherOccupation, FatherCompany, FatherBusinessPhone, FatherEmail, FatherFax, FatherBusinessAddress)
	VALUES ('$ApplicationID', '$FatherFirstName', '$FatherMiddleName', '$FatherLastName', '$FatherAddress', '$FatherTel', '$FatherMobile', '$FatherOccupation', '$FatherCompany', '$FatherBusinessPhone', '$FatherEmail', '$FatherFax', '$FatherBusinessAddress')";
	
	echo "Father_Info QUERY <br>" . $father_sql . "<br>";
	// Add mother_info
	$MotherFirstName = $_POST['MotherFirstName'];
	$MotherMiddleName = $_POST['MotherMiddleName'];
	$MotherLastName = $_POST['MotherLastName'];
	$MotherAddress = $_POST['MotherAddress'];
	$MotherTel = $_POST['MotherTel'];
	$MotherMobile = $_POST['MotherMobile'];
	$MotherOccupation = $_POST['MotherOccupation'];
	$MotherCompany = $_POST['MotherCompany'];
	$MotherBusinessPhone = $_POST['MotherBusinessPhone'];
	$MotherEmail = $_POST['MotherEmail'];
	$MotherFax = $_POST['MotherFax'];
	$MotherBusinessAddress = $_POST['MotherBusinessAddress'];
	if($MotherFirstName == "" || $MotherMiddleName=="" || $MotherLastName==""  || $MotherTel==""
		|| $MotherMobile =="" || $MotherOccupation == "" || $MotherEmail == "")
		{
			header("location: $referred?msg=mother");
			die("Error: Essential Info Missing in Mother! <br>");
		}
	$mother_sql = "INSERT INTO Mother_info
			(ApplicationID, MotherFirstName, MotherMiddleName, MotherLastName, MotherAddress, MotherTel, MotherMobile, MotherOccupation, MotherCompany, MotherBusinessPhone, MotherEmail, MotherFax, MotherBusinessAddress)
	VALUES ('$ApplicationID', '$MotherFirstName', '$MotherMiddleName', '$MotherLastName', '$MotherAddress', '$MotherTel', '$MotherMobile', '$MotherOccupation', '$MotherCompany', '$MotherBusinessPhone', '$MotherEmail', '$MotherFax', '$MotherBusinessAddress');";
	
	echo "Mother_Info QUERY <br>" . $mother_sql . "<br>";
	// Add financial_info
	$Relationship =$_POST['Relationship'];
	$Other = $_POST['Other'];
	$OtherFirstName =$_POST['OtherFirstName'];
	$OtherMiddleName =$_POST['OtherMiddleName'];
	$OtherLastName =$_POST['OtherLastName'];
	$OtherAddress =$_POST['OtherAddress'];
	$OtherTel =$_POST['OtherTel'];
	$OtherMobile =$_POST['OtherMobile'];
	$OtherOccupation =$_POST['OtherOccupation'];
	$OtherCompany =$_POST['OtherCompany'];
	$OtherBusinessPhone =$_POST['OtherBusinessPhone'];
	$OtherEmail =$_POST['OtherEmail'];
	$OtherFax =$_POST['OtherFax'];
	$OtherBusinessAddress =$_POST['OtherBusinessAddress'];
	
	if($Relationship == 'Father' || $Relationship == 'Mother')
	{
		$financial_sql = "INSERT INTO financial_info 
		(ApplicationID, Relationship) VALUES ('$ApplicationID', '$Relationship');";
		echo "Financial_Info QUERY <br>" . $financial_sql . "<br>";	
	}
	else if($Relationship == 'Other')
	{
		if($Other == "" || $OtherFirstName == "" || $OtherMiddleName=="" || $OtherLastName=="" || $OtherAddress=="" || $OtherTel==""
		|| $OtherMobile =="" || $OtherOccupation == "" || $OtherEmail == "")
		{
			header("location: $referred?msg=other");
		}
		else
		{
			$financial_sql = "INSERT INTO financial_info 
			(ApplicationID, Relationship, Other, OtherFirstName, OtherMiddleName, OtherLastName, OtherAddress, OtherTel, OtherMobile, OtherOccupation, OtherCompany, OtherBusinessPhone, OtherEmail, OtherFax, OtherBusinessAddress) 
			VALUES ('$ApplicationID', '$Relationship', '$Other', '$OtherFirstName', '$OtherMiddleName', '$OtherLastName', '$OtherAddress', '$OtherTel', '$OtherMobile', '$OtherOccupation', '$OtherCompany', '$OtherBusinessPhone', '$OtherEmail', '$OtherFax', '$OtherBusinessAddress');";
			
			echo "Other Financial_Info QUERY <br>" . $financial_sql . "<br>";	
		}
	}
	
	if(!mysql_query($applicant_sql))
	{
		echo "Applicant Info table can not be updated <br>";
		die('Error: ' . mysql_error());
	}
	if(!mysql_query($contact_sql))
	{
		echo "Contact Info table can not be updated <br>";
		die('Error: ' . mysql_error());
	}
	if(!mysql_query($admission_sql))
	{
		echo "Admission Info table can not be updated <br>";
		die('Error: ' . mysql_error());
	}
	if(!mysql_query($father_sql))
	{
		echo "Father Info table can not be updated <br>";
		die('Error: ' . mysql_error());
	}
	if(!mysql_query($mother_sql))
	{
		echo "Mother Info table can not be updated <br>";
		die('Error: ' . mysql_error());
	}
	if(!mysql_query($financial_sql))
	{
		echo "Financial_Info table can not be updated <br>";
		die('Error: ' . mysql_error());
	}
	echo "Queries Executed Successfully!<br>";
	mysql_close();
	
	header("location: $referred?msg=$ApplicationID");
 ?>