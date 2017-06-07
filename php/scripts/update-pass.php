<?php
	session_start();
	$email = $_SESSION['email'];
	include "config.php";

 if(isset($_POST['new_pass']) && !empty($_POST['new_pass']) AND isset($_POST['re_pass']) && !empty($_POST['re_pass'])){
 	$new_pass = mysqli_escape_string($con,$_POST['new_pass']);
 	$re_pass = mysqli_escape_string($con,$_POST['re_pass']);

 	$updatePassQry = "UPDATE `oc_sellers` SET `password`= '".md5($new_pass)."' WHERE `email` = '".$email."'";
 	if(!$checkUpdatePassQry = mysqli_query($con,$updatePassQry)){
 		mysqli_close($con);
 		mysqli_error($con);
 		die("");
 	}
 	$getId = "SELECT * FROM `oc_sellers` WHERE `email` = '".$email."'";
 	if(!$checkId = mysqli_query($con,$getId)){
 		mysqli_close($con);
 		mysqli_error($con);
 		die("");
 	}
 	$id = mysqli_fetch_assoc($checkId);
 	$_SESSION['user_id'] = $id;
 	echo "Password Changed";
 	echo "<script>window.location='check-ver.php'</script>";
 }
?>
