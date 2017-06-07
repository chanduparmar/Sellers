<?php
require "config.php";

$get_id = $_POST['id'];
$changeStatusQry = "UPDATE `oc_order_history` SET `order_status_id`= '3' WHERE `order_id` = '".$get_id."' ";
if(!$checkStatusQru = mysqli_query($con,$changeStatusQry)){
	mysqli_error($con);
	mysqli_close($con);
	die("");
}
$changeOrderStatusQry = "UPDATE `oc_order` SET `order_status_id`= '3' WHERE `order_id` = '".$get_id."' ";
if(!$checkOrderStatusQry = mysqli_query($con,$changeOrderStatusQry)){
	mysqli_error($con);
	mysqli_close($con);
	die("");
}
echo "Shipped";
?>