<html>
<head>
	<title>Nile University Application</title>
	<link href="./bootstrap.css" rel="stylesheet">
	<link href="./images/NU.ico"  rel="shortcut icon">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>
	<script lang="text/javascript" src="./formToWizard.js"></script>
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
      <a class="navbar-brand" href="#"><IMG SRC="./images/NU LOGO.png" style="width:50px;height:25px"></a>
 </div>
<div class="container-fluid">
<a class="navbar-brand" href="Admin_home.html"> NU Undergrad Application Form </a>
</div> <!-- end navbar container -->
</nav>
<div class="container">
<div class="bs-docs-section">
<fieldset>
	<legend style="color: CornflowerBlue"> <span class="auto-style3"> Search Results </span> </legend>
	<iframe height="70" width = "100%" name="accept_applicant_response" frameborder = 0> </iframe>

	<?php
		require_once("./functions.php");
		require_once("./config/applicants_config.php");
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
		
		$Name = $_POST['Name'];
		$ApplicationID = $_POST['ApplicationID'];
		$IntendedMajor = $_POST['IntendedMajor'];
		$AppliedSchool = $_POST['AppliedSchool'];
		$AppliedSemester = $_POST['AppliedSemester'];
		$AppliedYear = $_POST['AppliedYear'];
		
		if($Name == "" && $ApplicationID == "" && $IntendedMajor == "" && $AppliedSchool == "" && $AppliedYear=="" && $AppliedSemester=="")
		{
			$sql = "SELECT applicant.ApplicationID as 'Application ID', FirstName as 'First Name', LastName as 'Last Name', 
							IntendedMajor as 'Intended Major', AppliedSchool as ' Applied School', SemesterOfApplication as 'Semester Applied',
							Year 'Year Applied' 
							FROM applicant NATURAL JOIN admission_info  
							NATURAL JOIN contact_info";
			$query_result = mysql_query($sql);
			if(!$query_result)
			{
				die('QUERY ERROR: <br> ' . mysql_error());
			}
			else if(mysql_num_rows($query_result) == 0)
			{
				echo "<p class='bg-danger text-center'><br><strong>No results found!</strong><br><br> </p>";
			}
			else
			{
				echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
				$columns = mysql_num_fields($query_result);
				for($i=0 ; $i<$columns ; $i++)
				{
					echo "<th><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
				}
				echo "<th ><span class='auto-style3'>More Info</span></th>";
				echo "<th><span class='auto-style3'>Accept Applicant</span></th></tr>";
				
				
				for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
					echo "<tr>";
					// ADD VIEW ALL QUERY HERE
					$Major = "";
					for($i =0 ; $i<mysql_num_rows($query_result) ; $i++)
					{
						echo "<tr>";
						for($j=0; $j<mysql_num_fields($query_result) ; $j++)
						{
							if(mysql_field_name($query_result, $j) == 'Intended Major')
							{
								$Major = mysql_result($query_result,$i,mysql_field_name($query_result, $j));
							}
							print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
						}
						// ADD VIEW ALL QUERY HERE
						$AppID = mysql_result($query_result,$i,mysql_field_name($query_result, 0));
						echo "<th><form method='post' action='./controllers/view_applicant_info.php'>
						<button type='submit' class='btn btn-link' name='ID' value='$AppID'>View All Info</button></form></th>";
						echo "<th><form target = 'accept_applicant_response' method='post' action='./controllers/accept_applicant.php'>
						<input type='hidden' name='Major' value='$Major'>
						<button type='submit' class='btn btn-success' name = 'ID' value = '$AppID'>Accept</button></form></th>";
						echo "</tr>";
					}
				echo "</table>";
			}
		}
	}
		else
		{
			$sql = "SELECT applicant.ApplicationID as 'Application ID', FirstName as 'First Name', LastName as 'Last Name', 
			IntendedMajor as 'Intended Major', AppliedSchool as ' Applied School', SemesterOfApplication as 'Semester Applied',
			Year 'Year Applied' 
			FROM applicant NATURAL JOIN admission_info  
			NATURAL JOIN contact_info WHERE ";
			
			$multiple = false;
			if($ApplicationID != "")
			{
				$sql .= " applicant.ApplicationID = '$ApplicationID'";
				$multiple = true;
			}
			if($IntendedMajor != "")
			{
				if($multiple == true)
				{
					$sql .= " AND";
				}
				$sql .= " admission_info.IntendedMajor = '$IntendedMajor'";
				$multiple = true;
			}
			if($AppliedSchool != "")
			{
				if($multiple == true)
				{
					$sql .= " AND";
				}
				$sql .= " admission_info.AppliedSchool = '$AppliedSchool'";
				$multiple = true;
			}
			if($Name != "")
			{
				if($multiple == true)
				{
					$sql .= " AND";
				}
				$sql .= " applicant.FirstName LIKE '%$Name%'";
				$multiple = true;
			}
			if($AppliedSemester != "")
			{
				if($multiple == true)
				{
					$sql .= " AND";
				}
				$sql .= " admission_info.SemesterOfApplication = '$AppliedSemester'";
				$multiple = true;
			}
			if($AppliedYear != "")
			{
				if($multiple == true)
				{
					$sql .= " AND";
				}
				$sql .= " admission_info.Year = '$AppliedYear'";
				$multiple = true;
			}
			$query_result = mysql_query($sql);
			if(!$query_result)
			{
				die('QUERY ERROR: <br> ' . mysql_error());
			}
			else
			{
				echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
				$columns = mysql_num_fields($query_result);
				for($i=0 ; $i<$columns ; $i++)
				{
					echo "<th ><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
				}
				echo "<th ><span class='auto-style3'>More Info</span></th>";
				echo "<th ><span class='auto-style3'>Accept Applicant</span></th></tr>";
				$Major = "";
				for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
					echo "<tr>";
					for($j=0; $j<mysql_num_fields($query_result) ; $j++){
						if(mysql_field_name($query_result, $j) == 'Intended Major')
						{
							$Major = mysql_result($query_result,$i,mysql_field_name($query_result, $j));
						}
						print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
					}
					// ADD VIEW ALL QUERY HERE
					$AppID = mysql_result($query_result,$i,mysql_field_name($query_result, 0));
					echo "<th><form method='post' action='./controllers/view_applicant_info.php'>
					<button type='submit' class='btn btn-link' name='ID' value='$AppID'>View All Info</button></form></th>";
					echo "<th><form target = 'accept_applicant_response' method='post' action='./controllers/accept_applicant.php'>
					<input type='hidden' name='Major' value='$Major'>
					<button type='submit' class='btn btn-success' name = 'ID' value = '$AppID'>Accept</button></form></th>";
					echo "</tr>";
				}
				echo "</table>";
			}
		}
		mysql_close();
	?>
</fieldset>
</div>
</div> <!-- Container End !-->
</html>