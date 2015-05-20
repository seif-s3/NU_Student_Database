<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Nile University</title>
        <meta name="generator" content="Bluefish 2.2.6" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="../views/css/bootstrap.min.css" rel="stylesheet">
        <link href="../views/css/styles.css" rel="stylesheet">
    </head>
</html>
<?php
    require_once("../functions.php");
    require_once("../config/applicants_config.php");
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
	// Create link to Applicants Database
	$link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
	$referred = $_SERVER['HTTP_REFERER'];
	// Clear $_POST to prevent against SQL injections
	$_POST = f_clean($_POST);
	$Name = $_POST['Name'];
	$ApplicationID = $_POST['ApplicationID'];
	$IntendedMajor = $_POST['IntendedMajor'];
	$AppliedSchool = $_POST['AppliedSchool'];
	$sql = "SELECT applicant.ApplicationID, FirstName, LastName, IntendedMajor, AppliedSchool, SemesterOfApplication, Year FROM applicant INNER JOIN admission_info ON applicant.ApplicationID = admission_info.ApplicationID 
	INNER JOIN contact_info ON applicant.ApplicationID = contact_info.ApplicationID WHERE ";
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
	$query_result = mysql_query($sql);
	if(!$query_result)
	{
		die('QUERY ERROR: <br> ' . mysql_error());
	}
	else
	{
		echo "<table border=1 class = 'table table-hover' style = 'width: 70%'><tr>";
		$columns = mysql_num_fields($query_result);
		for($i=0 ; $i<$columns ; $i++)
		{
			echo "<th style='color: CornflowerBlue'><span class='auto-style3'>" . mysql_field_name($query_result, $i) . "</span></th>";
		}
		echo "<th style='color: CornflowerBlue'><span class='auto-style3'>More Info</span></th></tr>";
		for($i =0 ; $i<mysql_num_rows($query_result) ; $i++){
			echo "<tr>";
			for($j=0; $j<mysql_num_fields($query_result) ; $j++){
				print "<td>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</td>";
			}
			// ADD VIEW ALL QUERY HERE
			$AppID = mysql_result($query_result,$i,mysql_field_name($query_result, 0));
			echo "<th><form target='_blank' method='post' action='./view_single_application.php'>
			<button type='submit' class='btn btn-link' name='ID' value='$AppID'>View All Info</button></form></th>";
			echo "</tr>";
		}
		echo "</table>";
	}
	mysql_close();
?>
