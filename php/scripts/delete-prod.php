<?php

require "config.php";
$del_prod = $_POST['checkbox'];
foreach ($del_prod as  $value) {
	$delProd = "DELETE FROM `oc_product` WHERE product_id = '".$value."'   ";
	if(!$deleteProd = mysqli_query($con,$delProd)){
		echo mysqli_error($con);
		mysqli_close($con);
		die("fail");
	}else{
		echo "Success";
	}
	$delProdDes = "DELETE FROM `oc_product_description` WHERE product_id = '".$value."'   ";
	if(!$deleteProdDes = mysqli_query($con,$delProdDes)){
		echo mysqli_error($con);
		mysqli_close($con);
		die("fail");
	}else{
		echo "Success";
	}
	$delProdImg = "DELETE FROM `oc_product_image` WHERE product_id = '".$value."'   ";
	if(!$deleteProdImg = mysqli_query($con,$delProdImg)){
		echo mysqli_error($con);
		mysqli_close($con);
		die("fail");
	}else{
		echo "Success";
	}
	$delProdCate = "DELETE FROM `oc_product_to_category` WHERE product_id = '".$value."'   ";
	if(!$deleteProdCate = mysqli_query($con,$delProdCate)){
		echo mysqli_error($con);
		mysqli_close($con);
		die("fail");
	}else{
		echo "Success";
	}
	$delProdLayout = "DELETE FROM `oc_product_to_layout` WHERE product_id = '".$value."'   ";
	if(!$deleteProdLayout = mysqli_query($con,$delProdLayout)){
		echo mysqli_error($con);
		mysqli_close($con);
		die("fail");
	}else{
		echo "Success";
	}
	$delProdStore = "DELETE FROM `oc_product_to_store` WHERE product_id = '".$value."'   ";
	if(!$deleteProdStore = mysqli_query($con,$delProdStore)){
		echo mysqli_error($con);
		mysqli_close($con);
		die("fail");
	}else{
		echo "Success";
	}
}

?>