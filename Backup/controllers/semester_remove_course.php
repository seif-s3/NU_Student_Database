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
			$referred = $_SERVER['HTTP_REFERER'];
			$query = parse_url($referred, PHP_URL_QUERY);
			$referred = str_replace(array('?', $query), '', $referred);
			// Clear $_POST to prevent against SQL injections
			$_POST = f_clean($_POST);
			$Semester = $_POST['Semester'];
			$Year = $_POST['Year'];
			$CourseID = $_POST['CourseID'];
			
			$sql = "DELETE FROM section WHERE (CourseID='$CourseID' AND SemesterOfOfferedSection='$Semester' AND YearOfOfferedSection='$Year')";
			$query_result = mysql_query($sql);
			if(!$query_result)
			{
				die('QUERY ERROR: <br> ' . mysql_error());
			}
			else
			{
				mysql_close();
				echo "
					<form id = 'redirect' method='POST' action = '../controllers/manage_semester_courses.php'>
					<input type='hidden' name='Semester' value='$Semester'/>
					<input type='hidden' name='Year' value='$Year'/>
					</form>
					";
				echo "
					<script language='JavaScript'>
					fncAutoSubmitForm();
					</script>
					";
			}			
        ?>
    </body>
</html>