<?php
	if(!isset($_POST['company_name']) || !isset($_POST['email'])  ||  !isset($_POST['mobile_no']) ||  !isset($_POST['pickup_pincode']) || !isset($_POST['pan_no'])  || !isset($_POST['vattin'])) die("1");
if(empty($_POST['company_name'])|| empty($_POST['email']) ||
empty($_POST['mobile_no']) ||  empty($_POST['pickup_pincode']) || empty($_POST['pan_no'])  ||  empty($_POST['vattin'])) die("0");

	include "config.php";

	$company_name = mysqli_escape_string($con,$_POST["company_name"]);
	$email = mysqli_escape_string($con,$_POST["email"]);
	
	$mobile_no = mysqli_escape_string($con,$_POST["mobile_no"]);
	$pickup_pincode = mysqli_escape_string($con,$_POST["pickup_pincode"]);
	$pan_no =mysqli_escape_string($con, $_POST["pan_no"]);
	$vattin =mysqli_escape_string($con, $_POST["vattin"]);
	$mobile_no_len = strlen($mobile_no);
	$pickup_pincode_len = strlen($pan_no);
	if($mobile_no_len > 10 || $mobile_no_len < 10 || $pickup_pincode_len > 10 || $pickup_pincode_len <10){
		die("1");
	}

	if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $_POST['pan_no'])) {
  		die("5");
}
	
	$emailQry = "SELECT * FROM `oc_sellers` where `email` = '$email' ";

	if(!$emailCheckQry = mysqli_query($con,$emailQry)){
		
		mysqli_close($con);
		mysqli_error($con);
		die("2");
	}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  die("4");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

/*Vattin*/
$endpoint = 'validate';
$access_key = '0a97792bf01ad43a5684f6ffe5a5f25f';

// set VAT number
$vat_number = $_POST['vattin'];

// Initialize CURL:
$ch = curl_init('http://apilayer.net/api/'.$endpoint.'?access_key='.$access_key.'&vat_number='.$vat_number.'');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);

// Decode JSON response:
$validationResult = json_decode($json, true);

// Access and use your preferred validation result objects
 if($validationResult['valid']==0 || $validationResult['valid'] == false){
 	die("6");
 }
/*Vattin*/
	if(mysqli_num_rows($emailCheckQry)){
	
		mysqli_close($con);
		die("3");
		
	}
	$msg = "Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.";
	$hash = md5(rand(0,1000));
	$rand_password = rand(1000,5000);

	$signupQry = "INSERT INTO  `oc_sellers` (`company_name`, `email`, `password`, `mobile_no`, `pickup_pincode`, `pan_no`, `vattin_no`,`hash`) VALUES ('".$company_name."','".$email."','".md5($rand_password)."','".$mobile_no."','".$pickup_pincode."','".$pan_no."','".$vattin."','".$hash."')";
	if(!$signupCheckQry = mysqli_query($con,$signupQry)){
		
		mysqli_close($con);
		die("2");

	}
	$to = $email;
	$subject = 'Signup | Verification';
	$message = 'Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$email.'
Password: '.$rand_password.'
------------------------
 
Please click this link to activate your account:
http://www.elegends.hol.es/php/scripts/verify.php?email='.$email.'&hash='.$hash.'

';
$headers = 'From:www.elegends.in' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers);



	die("");
	
?>


	