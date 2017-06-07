<?php

$username = "root";
$server = "localhost";
$password = "root";
$dbname = "sumitb_stage";
$con = mysqli_connect($server,$username,$password,$dbname);
if(!$con){
	echo "".mysqli_error($con);
}
$fileId = $_GET['fileId'];

$deleteFile = "DELETE FROM `oc_seller_excel` WHERE `id` = '".$fileId."' ";
if(!$checkDeleteFile = mysqli_query($con,$deleteFile)){
	mysqli_error($con);
	mysqli_close($con);
	die("");
}
echo "<script>alert('File Rejected')</script>";
echo "<script>window.location='admin-panel.php'</script>";

?>