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
<?php
	if(isset($_GET['msg']) && $_GET['msg'] == '0')
	{
		echo "<p class='bg-danger text-center'><br>Error! You have to Select at least one attribute to search for!<br><br> </p>";
	}
?>
<form id="SearchStudent" class="form-vertical" action="view_student_fees.php" method="post">
	<fieldset>
	
		<legend style="color: CornflowerBlue"> <span class="auto-style3"> Search for Student </span> </legend>
			<label><b> Student ID </b></label>
			<div class="controls">
				<input type="text" class="form-control" placeholder="Enter ID" style="width: 50%" name="StudentID" required>
			</div>
			<label><b> Semester </b></label>
			<div class="controls">
				<select name="Semester" class="form-control" required>
					<option value="" selected>--Semester--</option>
					<?php
					require_once("./functions.php");
					dropdown_all_semesters();
					?>
				</select>
			</div>
			<label><b> Year </b></label>
			<div class="controls">
				<select name="Year" class="form-control" required>
					<option value="" selected>--Year--</option>
					<?php
					require_once("./functions.php");
					dropdown_all_years();
					?>
				</select>
			</div>
			<label></label>
			<div class="controls">
				<button type="submit" class="btn btn-primary">
					Search
				</button>
				
			</div>
	</fieldset>
</form>
</div>
</div> <!-- Container End !-->
</html>