<?php
require "config.php";
foreach ($_POST as $field_name => $val) {
	//clean post value

	$field_user_id = strip_tags(trim($field_name));
	echo $val = strip_tags(trim(mysqli_real_escape_string($con,$val)));

	$split_data = explode(':', $field_user_id);
	echo $user_id = $split_data[1];
	echo $field_name = $split_data[0];
	if($field_name == 'name' && !empty($field_name) && !empty($val)){
		$updateName = "UPDATE `oc_product_description` SET `name`= '".$val."' WHERE `product_id` = '".$user_id."' ";
		if(!$updateNameQry = mysqli_query($con,$updateName)){
			mysqli_error($con);
			mysqli_close($con);
			die("");
		}
	}
	/*if(!empty($user_id) && !empty($field_name) && !empty($val) && $field_name != 'name'){
		$updateProd = "UPDATE `oc_product` SET $field_name'= '".$val."' WHERE `product_id` = '".$user_id."' ";
		if(!$updateProdQry = mysqli_query($con,$updateProd)){
			mysqli_error($con);
			mysqli_close($con);
			die("");
		}
	}*/
	if($field_name == 'weight' && !empty($field_name) && !empty($val)){
		$updateWeight = "UPDATE `oc_product` SET `weight`= '".$val."' WHERE `product_id` = '".$user_id."' ";
		if(!$updateWeightQry = mysqli_query($con,$updateWeight)){
			mysqli_error($con);
			mysqli_close($con);
			die("");
		}
	}
	if($field_name == 'model' && !empty($field_name) && !empty($val)){
		$updateModel = "UPDATE `oc_product` SET `model`= '".$val."' WHERE `product_id` = '".$user_id."' ";
		if(!$updateModelQry = mysqli_query($con,$updateModel)){
			mysqli_error($con);
			mysqli_close($con);
			die("");
		}
	}
	if($field_name == 'price' && !empty($field_name) && !empty($val)){
		$updatePrice = "UPDATE `oc_product` SET `price`= '".$val."' WHERE `product_id` = '".$user_id."' ";
		if(!$updatePriceQry = mysqli_query($con,$updatePrice)){
			mysqli_error($con);
			mysqli_close($con);
			die("");
		}
	}
	if($field_name == 'quantity' && !empty($field_name) && !empty($val)){
		$updateQuantity = "UPDATE `oc_product` SET `quantity`= '".$val."' WHERE `product_id` = '".$user_id."' ";
		if(!$updateQuantityQry = mysqli_query($con,$updateQuantity)){
			mysqli_error($con);
			mysqli_close($con);
			die("");
		}
	}
}

?>