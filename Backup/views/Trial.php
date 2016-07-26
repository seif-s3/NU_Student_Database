<?php
	require_once("../config/enrollments_config.php");
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
    // Create link to Enrollments Database
    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
    $referred = $_SERVER['HTTP_REFERER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    $referred = str_replace(array('?', $query), '', $referred);
	$SchoolID=$_POST['SchoolID'];
	$sql = "SELECT * FROM enrollements.major WHERE SchoolID='$SchoolID'";
	$query_result = mysql_query($sql);
	for ($i=0; $i<mysql_num_rows($query_result); $i++)
	{
	  $id = mysql_result($query_result, $i, 'MajorID');
	  $mname = mysql_result($query_result, $i, 'MajorName');
	  echo "<option value='$id'>$id  : $mname</option>";
	}

>	
	