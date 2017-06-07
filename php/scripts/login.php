<?php
include "config.php";

	if(!isset($_POST["login_email"]) && !isset($_POST["login_password"])) die("0");
	if(empty($_POST["login_email"]) && empty($_POST["login_password"])) die("1");
	$email = mysqli_escape_string($con,$_POST['login_email']);
	$password =mysqli_escape_string($con,$_POST['login_password']);


	
	$loginQry = "SELECT * FROM `oc_sellers` WHERE 	`email` = '".$email."' AND `password` = '".md5($password)."'  ";
	if(!$loginCheckQry = mysqli_query($con,$loginQry)){
		mysqli_close($con);
		die("1");
	}
	$row = mysqli_num_rows($loginCheckQry);
	if($row == 0){
		
		die("2");
	}
	$getLoginData = mysqli_fetch_assoc($loginCheckQry);
	$email = $getLoginData['email'];
        $ver = $getLoginData['active'];
        $id = $getLoginData['id'];
	if($ver == 0){
		
		die("3");
	}
	$email = test_input($_POST["login_email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("4");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	session_start();
	$_SESSION['email'] = $email;
	$_SESSION['seller_id'] = $id;
/*	echo "<script>window.location='check-ver.php'</script>";*/
die("");

?>			