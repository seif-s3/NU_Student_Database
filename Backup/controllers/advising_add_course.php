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
			$StudentID = $_POST['StudentID'];
			$Semester = $_POST['Semester'];
			$Year = $_POST['Year'];
			$CourseID = $_POST['CourseID'];
			$SectionID = $_POST['SectionID'];
			$sql = "INSERT INTO takes(StudentID, CourseID, SectionID, SemesterTaken, YearTaken) VALUES ('$StudentID', '$CourseID', '$SectionID', '$Semester', '$Year')";
			$query_result = mysql_query($sql);
			if(!$query_result)
			{
				mysql_close();
				die('QUERY ERROR: <br> ' . mysql_error());
			}
			else
			{
				echo "
				<form id = 'redirect' method='POST' action = '../controllers/advise_student.php'>
				<input type='hidden' name='StudentID' value='$StudentID'/>
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
			mysql_close();
        ?>
    </body>
</html>