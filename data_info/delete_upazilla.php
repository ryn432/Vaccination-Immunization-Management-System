<?php
require_once('../load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>

<?php
$con = mysqli_connect("localhost", "root", "", "central_db");
// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
mysqli_query($con,"TRUNCATE TABLE subdistrict");
mysqli_close($con);
header("Location: ../data_info/Upazilla.php");
?>
