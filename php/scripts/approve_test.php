<?php
session_start();
include "config.php";
if(!isset($_POST['company_name']) && !isset($_POST['company_pan_no']) && !isset($_POST['name']) && !isset($_POST['cate_list']) && !isset($_POST['product_pickup_address']) && !isset($_POST['pin_code']) && !isset($_POST['city']) && !isset($_POST['state']) && !isset($_POST['vattin_number']) && !isset($_POST['cst']) && !isset($_POST['beneficiary_name']) && !isset($_POST['current_account_number']) && !isset($_POST['confirm_current_account_number'])  && !isset($_POST['isfc']) ){
	echo "Not set";
}
if(empty($_POST['company_name']) && empty($_POST['company_pan_no'])  && empty($_POST['name'])  && empty($_POST['cate_list'])  && empty($_POST['product_pickup_address'])  && empty($_POST['pin_code'])  && empty($_POST['city'])  && empty($_POST['state'])  && empty($_POST['vattin_number'])  && empty($_POST['cst'])  && empty($_POST['beneficiary_name'])  && empty($_POST['current_account_number'])   && empty($_POST['confirm_current_account_number'])  && empty($_POST['isfc'])){
	echo "empty";
}

$user_id = $_SESSION['seller_id'];
$email = $_SESSION['email'];
$company_name = $_POST['company_name'];
$company_pan_no = $_POST['company_pan_no'];
$name = $_POST['name'];
$cate_list = implode(',', $_POST['cate_list']);
$product_pickup_address = $_POST['product_pickup_address'];
$pin_code = $_POST['pin_code'];
$city = $_POST['city'];
$state = $_POST['state'];
$vattin_number = $_POST['vattin_number'];
$cst = $_POST['cst'];
$beneficiary_name = $_POST['beneficiary_name'];
$current_account_number= $_POST['current_account_number'];
$confirm_current_account_number = $_POST['confirm_current_account_number'];
$isfc = $_POST['isfc'];
if($current_account_number != $confirm_current_account_number){
	die("3");
}

$ch = curl_init('http://ebank.org.in/api.php?ifsc='.$isfc);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$json = curl_exec($ch);
curl_close($ch);
$validationResult = json_decode($json, true);
 if($validationResult['status'] == 0){
 	die("2");
 }

$insUserDet = "INSERT INTO `oc_sellers_verification`(`user_id`, `email`, `company_name`, `company_pan_no`, `name`, `category`, `product_pickup_address`, `pin_code`, `city`, `state`, `vattin_number`, `cst_no`, `beneficiary_name`, `current_account_number`, `confirm_current_account_number`, `isfc`) VALUES ('$user_id','$email','$company_name','$company_pan_no','$name','$cate_list','$product_pickup_address','$pin_code','$city','$state','$vattin_number','$cst','$beneficiary_name','$current_account_number','$confirm_current_account_number','$isfc')";
if(!$checkUserDet = mysqli_query($con,$insUserDet)){
	mysqli_close($con);
 	mysqli_error($con);
 	die("1");
}
$updateVerification = "UPDATE `oc_sellers` SET `verification` = '1' WHERE `email` = '".$email."'";
if(!$checkUpdateVerif = mysqli_query($con,$updateVerification)){
	mysqli_close($con);
 	mysqli_error($con);
 	die("1");
}

echo "verification complete";


?>