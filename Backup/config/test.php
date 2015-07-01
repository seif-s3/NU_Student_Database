<html>
<?php
/* Config file containing defines for connection to Applicants Database*/

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_COLLATE","");
define("DB_NAME","applicants");
define("DB_CHARSET","utf8");

?>


<?php
$con=mysqli_connect("localhost",DB_USER,DB_PASSWORD,DB_NAME);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// Perform queries and print out affected rows
mysqli_query($con,"SELECT * FROM applicant_military_status");
echo "Affected rows: " . mysqli_affected_rows($con);

mysqli_query($con,"SELECT * FROM applicant_applied_semester");
echo "Affected rows: " . mysqli_affected_rows($con);

$sql="SELECT * FROM relationship_financial_info";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch row
  $row=mysqli_fetch_row($result);

  printf ("Relationship Fin Info: %s\n", $row[0]);

  // Free result set
  mysqli_free_result($result);
}



mysqli_close($con);
?>
</html>