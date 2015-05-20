<html>
	<body>
		<script language='JavaScript'>
	            function fncAutoSubmitForm(){
	                //alert('test');
	                document.getElementById('redirect').submit();
	            }
	        </script>
	<?php
	    require_once("../functions.php");
	    require_once("../config/enrollments_config.php");
	    
	    /* Check that request originated from same domain */
	    $domain = $_SERVER['HTTP_HOST'];
	    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
		// Create link to Applicants Database
		$link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
		/*set autocommit to true*/
		$referred = $_SERVER['HTTP_REFERER'];
		$query = parse_url($referred, PHP_URL_QUERY);
		$referred = str_replace(array('?', $query), '', $referred);
		// Get Application ID from last query -- All subsequent adding to table MUST include this variable
		$_POST = f_clean($_POST);
		// Get applicant table attributes from form
		
		$CourseKey = $_POST['CourseKey'];
		$CourseID = $_POST['CourseID'];
		$CourseName = $_POST['CourseName'];
		$Credits = $_POST['Credits'];
		$MinPreq = $_POST['MinPreq'];
		$Preq1 = $_POST['Preq1'];
		$Preq2 = $_POST['Preq2'];
		

		$preq_sql = "DELETE FROM prerequisites WHERE CourseID='$CourseKey'";
		$preq_result = mysql_query($preq_sql);
		if(!$preq_result)
		{
			die("QUERY ERROR" . mysql_error());
			//header("location: $referred?msg=-1");
		}
		
		$sql = "UPDATE course SET CourseID='$CourseID', CourseName='$CourseName', CreditHours = '$Credits', MinimumPrereq='$MinPreq' WHERE CourseID='$CourseKey'";
		$query_result = mysql_query($sql);
		if(!$query_result)
		{
			die("QUERY ERROR" . mysql_error());
		}
		

		if($MinPreq == 1)
		{
			$sql = "INSERT INTO prerequisites (CourseID, PrereqID) VALUES ('$CourseID', '$Preq1')";
			$query_result = mysql_query($sql);
			if(!$query_result)
				die("QUERY ERROR" . mysql_error());
		}
		else if($MinPreq == 2)
		{
			$sql = "INSERT INTO prerequisites (CourseID, PrereqID) VALUES ('$CourseID', '$Preq1')";
			$query_result = mysql_query($sql);
			if(!$query_result)
				die("QUERY ERROR" . mysql_error());
			$sql = "INSERT INTO prerequisites (CourseID, PrereqID) VALUES ('$CourseID', '$Preq2')";
			$query_result = mysql_query($sql);
			if(!$query_result)
				die("QUERY ERROR" . mysql_error());
		}



		echo "
		<form id = 'redirect' method='POST' action = '../controllers/edit_course_details.php'>
		<input type='hidden' name='CourseID' value='$CourseID'/>
		</form>
		";
		echo "
			<script language='JavaScript'>
			fncAutoSubmitForm();
			</script>
			";	
	 ?>	
	</body>
</html>