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
		<?php
			require_once("./functions.php");
			require_once("./config/enrollments_config.php");
			/* Check that request originated from same domain */
			$domain = $_SERVER['HTTP_HOST'];
			$request_domain = parse_url($_SERVER['HTTP_REFERER']);
			// Create link to Enrollments Database
			$link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
			$referred = $_SERVER['HTTP_REFERER'];
			$query = parse_url($referred, PHP_URL_QUERY);
			$referred = str_replace(array('?', $query), '', $referred);
			// Clear $_POST to prevent against SQL injections
			$_POST = f_clean($_POST);
			$StudentID = $_POST['StudentID'];
			$Semester = $_POST['Semester'];
			$Year = $_POST['Year'];
			$details_sql = "SELECT applicants.applicant.FirstName as 'First Name', applicants.applicant.MiddleName as 'Middle Name', applicants.applicant.LastName as 'Last Name', enrollements.student.GPA as 'GPA', enrollements.student.CreditsTaken as 'Credits Taken', enrollements.student.MajorID as 'Major ID' FROM applicants.applicant INNER JOIN enrollements.student ON applicants.applicant.ApplicationID = enrollements.student.StudentID WHERE enrollements.student.StudentID = $StudentID ";
			$query_result = mysql_query($details_sql);
			if(!$query_result)
				{
					mysql_close();
					die("QUERY ERROR" . mysql_error());
				}
			else if(mysql_num_rows($query_result) == 0)
			{
			}
			else
			{
				$Name = mysql_result($query_result, 0, 'First Name') . " " . mysql_result($query_result, 0, 'Middle Name') . " " . mysql_result($query_result, 0, 'Last Name');
				$GPA = mysql_result($query_result, 0, 'GPA');
				$Credits = mysql_result($query_result, 0, 'Credits Taken');
				$MajorId = mysql_result($query_result, 0, 'Major ID');
				echo "<table class ='table-striped' style = 'width: 100%'>
				<tr><td><h4><b>Name</h4></td><td><h4>$Name</h4></td></tr>
				<tr><td><h4><b>GPA</h4></td><td><h4>$GPA</h4></td></tr>
				<tr><td><h4><b>Credits</h4></td><td><h4>$Credits</h4></td></tr>
				<tr><td><h4><b>Major</h4></td><td><h4>$MajorId</h4></td></tr>
				</table><br>";
			}
			echo "<hr>";
			$sql = "SELECT *
					FROM (SELECT CourseID as 'Course ID', CourseName as 'Course Name', CreditHours as 'Credit Hours', SemesterTaken as 'Semester', YearTaken as 'Year', Grade 
							FROM takes NATURAL JOIN course 
							WHERE StudentID = $StudentID) as All_Semesters
					WHERE All_Semesters.Semester = '$Semester' AND All_Semesters.Year= $Year";
								
			$query_result = mysql_query($sql);
			if(!$query_result)
			{
				mysql_close();
				header("location: $referred?msg=-1");
			}
			else if(mysql_num_rows($query_result) == 0)
			{
				echo "<p class='bg-danger text-center'><br><strong>No Results!</strong><br><br> </p>";
			}
			else
			{
				$current_semester = mysql_result($query_result, 0, "Semester");
				$current_year = mysql_result($query_result, 0, "Year");
				echo "<h4><strong> $current_semester $current_year </strong></h4>";
				echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
				$columns = mysql_num_fields($query_result);
				for($i=0 ; $i<$columns ; $i++)
				{
					if(mysql_field_name($query_result, $i) == "Semester" || mysql_field_name($query_result, $i) == "Year")
					{continue;} 
					echo "<th style='color: CornflowerBlue'><span class='auto-style3'><p class='text-center'>" . mysql_field_name($query_result, $i) . "</p></span></th>";
				}
				echo "</tr>";
				for($i =0 ; $i<mysql_num_rows($query_result) ; $i++)
				{
					if(mysql_result($query_result,$i,'Semester') != $current_semester || mysql_result($query_result,$i,'Year') != $current_year)
						{
							echo "</table>";
							$current_year = mysql_result($query_result,$i,'Year');
							$current_semester = mysql_result($query_result,$i,'Semester');
							echo "<br><h4><strong> $current_semester $current_year </strong></h4>";
							echo "<table class = 'table table-hover' style = 'width: 100%'><tr>";
							for($ii=0 ; $ii<$columns ; $ii++)
							{
								if(mysql_field_name($query_result, $ii) == "Semester" || mysql_field_name($query_result, $ii) == "Year")
								{continue;} 
								echo "<th style='color: CornflowerBlue'><span class='auto-style3'><p class='text-center'>" . mysql_field_name($query_result, $ii) . "</p></span></th>";
							}
							echo "</tr>";
						}
					else
					{
						echo "<tr>";
					}
					for($j=0; $j<mysql_num_fields($query_result) ; $j++)
					{
						if(mysql_field_name($query_result, $j) == "Semester" || 
							mysql_field_name($query_result, $j) == "Year")
						{continue;} 
						if(mysql_result($query_result,$i,'Grade') == 'A' || mysql_result($query_result,$i,'Grade') == 'A+')
						{
							print "<td class='success'><p class='text-center'>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</p></td>";
						}
						else if(mysql_result($query_result,$i,'Grade')=='F')
						{
							print "<td class='danger'><p class='text-center'>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</p></td>";
						}
						else if(mysql_result($query_result,$i,'Grade')=='I')
						{
							print "<td class='warning'><p class='text-center'>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</p></td>";
						}
						else
						{
							print "<td><p class='text-center'>".mysql_result($query_result,$i,mysql_field_name($query_result, $j)) ."</p></td>";
						}
					}
					// ADD VIEW ALL QUERY HERE
					$AppID = mysql_result($query_result,$i,mysql_field_name($query_result, 0));
					echo "</tr>";
				}				
				echo "</table>";
				$total_credits_sql = "SELECT SUM(CreditHours) as 'Credits This Semester'
						FROM (SELECT CourseID as 'Course ID', CourseName as 'Course Name', CreditHours, SemesterTaken as 'Semester', YearTaken as 'Year', Grade 
								FROM enrollements.takes NATURAL JOIN enrollements.course 
								WHERE StudentID = $StudentID) as All_Semesters
						WHERE All_Semesters.Semester = '$Semester' AND All_Semesters.Year= $Year";
				$query_result = mysql_query($total_credits_sql);
				$Total_Credit = mysql_result($query_result, 0, 'Credits This Semester');
				
				echo "<table class ='table-striped' style = 'width: 100%'>
				<tr><td><h4><b>Credits</h4></td><td><h4>$Total_Credit</h4></td></tr>
				</table><br>";
			}
			
			mysql_close();
            ?>
</fieldset>
</div>
</div> <!-- Container End !-->
</html>