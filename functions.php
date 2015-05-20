<?php
function f_sqlconnect($db, $uname, $password)
{
	/* Connect to a specific database on localhost */
	$link = mysql_connect('127.0.0.1',$uname,$password);
	if(!$link)
	{
		die("Could not establish link! Error Code: ". mysql_error());
	}
	$db_selected = mysql_select_db($db, $link);
	if(!$db_selected)
	{
		die("Could not connect to database! Error Code: ".mysql_error());
	}
}

function f_clean($array)
{
	/* Clean SQL query from malicious injections */
	return array_map('mysql_real_escape_string', $array);
}

function f_tableExists($tablename, $database = false)
{
	if(!$database)
	{
		$res = mysql_query("SELECT DATABASE()");
		$database = mysql_result($res,0);
	}
	
	$res = mysql_query("SELECT COUNT(*) AS count 
						FROM applicants.tables 
						WHERE table_schema = '$database' 
						AND table_name = '$tablename'");
	return mysql_result($res, 0) == 1;
}


function dropdown_all_years()
{
	// Call this function inside an <select> tag !!

	require_once("../config/enrollments_config.php");
	/* Check that request originated from same domain */
	$domain = $_SERVER['HTTP_HOST'];
	$request_domain = parse_url($_SERVER['HTTP_REFERER']);
	// Create link to Enrollments Database
	$link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
	$referred = $_SERVER['HTTP_REFERER'];
	$query = parse_url($referred, PHP_URL_QUERY);
	$referred = str_replace(array('?', $query), '', $referred);
	
	$sql = "SELECT * FROM enrollements.possible_years ORDER BY Year DESC";
	$query_result = mysql_query($sql);
	for ($i=0; $i<mysql_num_rows($query_result); $i++)
	{
	  $val = mysql_result($query_result, $i, 'Year');
	  echo "<option value='$val'>$val</option>";
	}

}

function dropdown_all_semesters()
{
	// Call this function inside an <select> tag !!

	require_once("../config/enrollments_config.php");                                
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
    // Create link to Enrollments Database
    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
    $referred = $_SERVER['HTTP_REFERER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    $referred = str_replace(array('?', $query), '', $referred);
    
    $sql = "SELECT * FROM applicants.applicant_applied_semester";
    $query_result = mysql_query($sql);
    for ($i=0; $i<mysql_num_rows($query_result); $i++)
    {
      $val = mysql_result($query_result, $i, 'AppliedSemester');
      echo "<option value='$val'>$val</option>";
    }
}

function dropdown_all_schools()
{
	require_once("../config/enrollments_config.php");                                
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
    // Create link to Enrollments Database
    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
    $referred = $_SERVER['HTTP_REFERER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    $referred = str_replace(array('?', $query), '', $referred);
    
    $sql = "SELECT * FROM enrollements.school";
    $query_result = mysql_query($sql);
    for ($i=0; $i<mysql_num_rows($query_result); $i++)
    {
      $id = mysql_result($query_result, $i, 'SchoolID');
      $val = mysql_result($query_result, $i, 'SchoolName');
      echo "<option value='$id'>$id  : $val</option>";
    }
}

function dropdown_all_majors()
{
	require_once("../config/enrollments_config.php");
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
    // Create link to Enrollments Database
    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
    $referred = $_SERVER['HTTP_REFERER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    $referred = str_replace(array('?', $query), '', $referred);
    
    $sql = "SELECT * FROM enrollements.major";
    $query_result = mysql_query($sql);
    for ($i=0; $i<mysql_num_rows($query_result); $i++)
    {
      $id = mysql_result($query_result, $i, 'MajorID');
      $mname = mysql_result($query_result, $i, 'MajorName');
      echo "<option value='$id'>$id  : $mname</option>";
    }
}

function dropdown_all_courses()
{
    require_once("../config/enrollments_config.php");
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
    // Create link to Enrollments Database
    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
    $referred = $_SERVER['HTTP_REFERER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    $referred = str_replace(array('?', $query), '', $referred);
    
    $sql = "SELECT * FROM enrollements.course";
    $query_result = mysql_query($sql);
    for ($i=0; $i<mysql_num_rows($query_result); $i++)
    {
      $id = mysql_result($query_result, $i, 'CourseID');
      $cname = mysql_result($query_result, $i, 'CourseName');
      echo "<option value='$id'>$id  : $cname</option>";
    }
}

function dropdown_all_courses_select_id($select)
{
    require_once("../config/enrollments_config.php");
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
    // Create link to Enrollments Database
    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
    $referred = $_SERVER['HTTP_REFERER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    $referred = str_replace(array('?', $query), '', $referred);
    
    $sql = "SELECT * FROM enrollements.course";
    $query_result = mysql_query($sql);
    for ($i=0; $i<mysql_num_rows($query_result); $i++)
    {
      $id = mysql_result($query_result, $i, 'CourseID');
      $cname = mysql_result($query_result, $i, 'CourseName');
      if($id == $select)
        echo "<option value='$id' selected>$id  : $cname</option>";  
      else
        echo "<option value='$id'>$id  : $cname</option>";
    }
}

function dropdown_all_grades()
{
    require_once("../config/enrollments_config.php");
    /* Check that request originated from same domain */
    $domain = $_SERVER['HTTP_HOST'];
    $request_domain = parse_url($_SERVER['HTTP_REFERER']);
    // Create link to Enrollments Database
    $link = f_sqlconnect(DB_NAME, DB_USER, DB_PASSWORD);
    $referred = $_SERVER['HTTP_REFERER'];
    $query = parse_url($referred, PHP_URL_QUERY);
    $referred = str_replace(array('?', $query), '', $referred);
    
    $sql = "SELECT * FROM enrollements.grading_points ORDER BY QualityPoints DESC , GradeLetter DESC";
    $query_result = mysql_query($sql);
    for ($i=0; $i<mysql_num_rows($query_result); $i++)
    {
      $gl = mysql_result($query_result, $i, 'GradeLetter');
      echo "<option value='$gl'>$gl</option>";
    }
}
 
?>