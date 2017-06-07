<?php
session_start();
$_SESSION['email'] = $_GET['email'];
 include "config.php";
 if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
 	$email = mysqli_escape_string($con,$_GET['email']);
 	$hash = mysqli_escape_string($con,$_GET['hash']);

 	$validateQry = "SELECT `email`,`hash`,`active` FROM `oc_sellers` WHERE `email`='".$email."' AND `hash` = '".$hash."' AND `active` = '0' ";
 	if(!$checkValidateQry = mysqli_query($con,$validateQry)){
 		mysqli_close($con);
 		mysqli_error($con);
 		die("");
 	}
 	$rows = mysqli_num_rows($checkValidateQry);


 	if($rows> 0){
 		
 			$updateActive = "UPDATE `oc_sellers` SET `active`= '1' WHERE `email` = '".$email."' ";
 			if(!$updateCheckActive = mysqli_query($con,$updateActive)){
 				mysqli_error($con);
 				mysqli_close($con);
 				die("");

 			}
 			echo "Account activated";
 				echo "<script>window.location='../../sellers-login.php'</script>";

 	}else{
 		echo "Email already activated";
 		sleep(5);
 		die("");
 	}

 }
?>		