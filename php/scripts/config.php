<?php
$username = "root";
$server = "localhost";
$password = "root";
$dbname = "sumitb_stage";
$con = mysqli_connect($server,$username,$password,$dbname);
if(!$con){
	echo "".mysqli_error($con);
}
?>