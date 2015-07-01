<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Nile University</title>
        <meta name="generator" content="Bluefish 2.2.6" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
    </head>
</html>
<?php
    require_once("../functions.php");
    require_once("../config/enrollments_config.php");
    
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
    	// Check if Application Has already been accepted
    	$ApplicationID = $_POST['ID'];
    	$IntendedMajor = $_POST['Major'];
    	$sql = "SELECT StudentID from student WHERE StudentID = '$ApplicationID'";
    	$query_result = mysql_query($sql);
    	if(!$query_result)
    	{
            mysql_close();
    		die("SQL Error!" . mysql_error());
    	}
    	if(mysql_num_rows($query_result)>0)
    	{
    		// Application already accepted
            mysql_close();
    		die("<p class='bg-danger text-center'><br>Applicant Already accepted!<br><br> </p>");
    	}
    	
    	$sql = "INSERT INTO enrollements.student (StudentID, GPA, CreditsTaken, MajorID)
    			VALUES ('$ApplicationID',0,0,'$IntendedMajor')";
    	if(!mysql_query($sql))
    	{
            mysql_close();
    		die("Error Inserting! Contact database admin!" . mysql_error());
    	}
        mysql_close();
    	echo "<p class='bg-success text-center'><br>Applicant enrolled!<br><br> </p>";
?>