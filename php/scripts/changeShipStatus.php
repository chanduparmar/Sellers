<?php
	require "config.php";
	
	 $orderID = $_GET['orderID'];
	 $newID = $_GET['newID'];

  $updateStatus = "UPDATE `oc_order_history` SET `order_status_id`= '".$newID
  ."'  WHERE `order_id` = '".$orderID."' ";
  if(!$checkUpdate = mysqli_query($con,$updateStatus)){
  	mysqli_error($con);
  	mysqli_close($con);
  	die("");
  }
  $updateOrderStatus = "UPDATE `oc_order` SET `order_status_id`= '".$newID
  ."'  WHERE `order_id` = '".$orderID."' ";
  if(!$checkOrderUpdate = mysqli_query($con,$updateOrderStatus)){
  	mysqli_error($con);
  	mysqli_close($con);
  	die("");
  }
  echo "<script>alert('Status Updated')</script>";
  echo "<script>window.location='../../dashboard.php'</script>";

?>