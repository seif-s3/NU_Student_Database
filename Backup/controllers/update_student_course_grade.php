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
    </head>
    <body>
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
			$Grade = $_POST['Grade'];
			$StudentID = $_POST['StudentID'];
			$Semester = $_POST['Semester'];
			$Year = $_POST['Year'];
			$CourseID = $_POST['CourseID'];
			echo $Grade . " " . $StudentID . " " . $Semester . " " . $Year . " " . $CourseID . "<br>";
			echo "
			<form method='post' name = 'refresh_view' action='$referred'>
			<input type='hidden' name='Semester' value='$Semester'>
			<input type='hidden' name='Year' value='$Year'>
			<input type='hidden' name='StudentID' value='$StudentID'>
			<input type='hidden' name='CourseID' value='$CourseID'>
			</form>
			";
			$sql = "UPDATE takes SET Grade='$Grade' 
			WHERE StudentID='$StudentID' AND CourseID = '$CourseID' 
			AND SemesterTaken = '$Semester' AND YearTaken = '$Year'";
			$query_result = mysql_query($sql);
			if(!$query_result)
			{
				die('QUERY ERROR: <br> ' . mysql_error());
			}
			else
			{
				echo "<script type='text/javascript'>
					document.refresh_view.submit();
					</script>";
			}
			mysql_close();
            	
        ?>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
