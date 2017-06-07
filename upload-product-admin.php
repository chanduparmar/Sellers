<?php

session_start();

include "php/scripts/config.php";
include "PHPExcel/IOFactory.php";
			
			$getFormatId = $_POST['excelfile'];
			 $excel_name = $_FILES['excel-upload']['name'];
			 $excel_file = $_FILES['excel-upload']['tmp_name'];
			 $fileType = pathinfo($excel_name,PATHINFO_EXTENSION);
			if($fileType != 'xls' && $fileType != 'xlsx' && $fileType != 'csv'){
				echo "<script>alert('invalid file')</script>";
				echo "<script>window.location='dashboard.php'</script>";
				die("");
			}
			
			$objPHPExcel = PHPExcel_IOFactory::load($excel_file);
			$t=time();
			if($getFormatId == 1){

			foreach ($objPHPExcel -> getWorksheetIterator() as $worksheet) {
				 $highestRow = $worksheet->getHighestDataRow();
				for($row=2;$row<=$highestRow;$row++){

					$product_name = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(0,$row)->getValue());
					$product_name=mb_convert_encoding($product_name, "HTML-ENTITIES", 'UTF-8');
					$description = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
					$model = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
					$price = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(6,$row)->getValue()); 
					$tax_class = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(7,$row)->getValue());
					$quantity = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(8,$row)->getValue());
					$minimum_quantity = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(9,$row)->getValue());
					$subtract_stock = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(10,$row)->getValue());
					$out_of_stock_status = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(11,$row)->getValue());
					$requires_shipping = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(12,$row)->getValue());
					$shipping_amount = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(13,$row)->getValue());
					$sku = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(14,$row)->getValue());
					$upc = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(15,$row)->getValue());
					$ean = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(16,$row)->getValue());
					$jan = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(17,$row)->getValue());
					$isbn = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(18,$row)->getValue());
					$mpn = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(19,$row)->getValue());
					$location = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(20,$row)->getValue());	
					$image = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(22,$row)->getValue());
					$dimensions = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(23,$row)->getValue());
					$dimenshion_value = explode('x',$dimensions);
					$getDim = count($dimensions);
					$length = "";
					$width = "";
					$height = "";
					if(!empty($dimensions)){//Dimension End
					$length = $dimenshion_value[0];
					$width = $dimenshion_value[1];
					$height = $dimenshion_value[2];
					}//Dimension End
					$length_class_id = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(24,$row)->getValue());
					$weight = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(25,$row)->getValue());
					$weight_class_id = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(26,$row)->getValue());
					$status = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(27,$row)->getValue());
					if($status == 'Enabled'){
						$status = 1;
					}else
					{
						$status = 0;
					}
					$sort_order = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(28,$row)->getValue());
					$manufacturer_id = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(29,$row)->getValue());
					$categories = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(30,$row)->getValue());
					$stores = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(31,$row)->getValue());
					$related_products = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(32,$row)->getValue());
					$additional_image = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(33,$row)->getValue());
					$getAddImage = explode(',', $additional_image);
					$sizeOfArry = count($getAddImage);
					$downloaded_products = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(34,$row)->getValue());
					$date_available = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(35,$row)->getValue());
					$special_price = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(36,$row)->getValue());
					$special_customer_group_id = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(37,$row)->getValue());
					$special_customer_priority = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(38,$row)->getValue());
					$special_start_date = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(39,$row)->getValue());
					$special_end_date = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(40,$row)->getValue());
					$product_points = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(41,$row)->getValue());
					$field1 = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(42,$row)->getValue());
					$field2 = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(43,$row)->getValue());
					$field3 = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(44,$row)->getValue());
					$field4 = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(45,$row)->getValue());
					$seller_id =  mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow(46,$row)->getValue());
					$date = date('Y-m-d',$t);
					if(!empty($product_name) && !empty($description) && !empty($model) && !empty($price) && !empty($quantity) && !empty($image) ){
					$insProd = "INSERT INTO `oc_product`(`seller_id`, `model`, `sku`, `upc`, `ean`, `jan`, `isbn`, `mpn`, `location`, `quantity`, `stock_status_id`, `image`, `manufacturer_id`, `shipping`, `price`, `tax_class_id`, `date_available`, `weight`, `weight_class_id`, `length`, `width`, `height`, `length_class_id`, `subtract`, `minimum`, `sort_order`, `status`, `date_added`) VALUES ('".$seller_id."','".$model."','".$sku."','".$upc."','".$ean."','".$jan."','".$isbn."','".$mpn."','".$location."','".$quantity."','".$minimum_quantity."','".$image."','".$manufacturer_id."','".$shipping_amount."','".$price."','".$tax_class."','".$date_available."','".$weight."','".$weight_class_id."','".$length."','".$width."','".$height."','".$length_class_id."','".$subtract_stock."','".$minimum_quantity."','".$sort_order."','".$status."',NOW())";
					if(!$insCheckProd = mysqli_query($con,$insProd)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail Query");
					}else{
						echo "Data Inserted";
					}
					$ins_prod_id = mysqli_insert_id($con);

					$insProdDetails = "INSERT INTO `oc_product_description`(`product_id`,`seller_id`, `language_id`, `name`, `description`,`meta_title`) VALUES ('".$ins_prod_id."','".$seller_id."','1','".trim($product_name)."','".$description."','".$product_name."')";
					if(!$insProdCheckDetails = mysqli_query($con,$insProdDetails)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail QUery 2");

					}else{
						echo "Success";
					}
					$insImg = "INSERT INTO `oc_product_image`(`product_id`, `image`) VALUES ('".$ins_prod_id."','".$image."')";
					if(!$chekcImgQry = mysqli_query($con,$insImg)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail QUery 2");
					}
					for($s=0;$s<$sizeOfArry;$s++){
							$value = $getAddImage[$s];
							$insAddImage = "INSERT INTO `oc_product_image`(`product_id`, `image`) VALUES ('".$ins_prod_id."','".$value."')";
							if(!$checkAddImage = mysqli_query($con,$insAddImage)){
								mysqli_close($con);
								mysqli_error($con);
								die("Error ins image");
							}
					}//loop for prod image
					$instCate = "INSERT INTO `oc_product_to_category`(`product_id`, `category_id`) VALUES ('".$ins_prod_id."','".$categories."') ";
					$layoutQry = "INSERT INTO `oc_product_to_layout`(`product_id`, `store_id`, `layout_id`) VALUES ('".$ins_prod_id."','0','0')";
					$storeQry = "INSERT INTO `oc_product_to_store`(`product_id`, `store_id`) VALUES ('".$ins_prod_id."','0')";

					if(!$insCheckMulti = mysqli_query($con,$instCate)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					if(!$CheckLayoutQry = mysqli_query($con,$layoutQry)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					if(!$CheckCateQry = mysqli_query($con,$storeQry)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					
				} //If empty End
			}//End for loop
		}//End foreach loop
		echo "<script>alert('File Uploaded')</script>";
		echo "<script>window.location='admin/admin-panel.php'</script>";
	}/*End for xls if */ else if($getFormatId == 2){
		foreach ($objPHPExcel -> getWorksheetIterator() as $worksheet) {
				  $highestRow = $worksheet->getHighestDataRow();
				 $highestCol = $worksheet->getHighestDataColumn();
				 $colString = PHPExcel_Cell::columnIndexFromString($highestCol);

				for($row=2;$row<=$highestRow;$row++){
					for($col=0;$col<=$colString;$col++){
					  $colData[$col] = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow($col,$row)->getValue());
						}/*Column Data number*/
					


				if(!empty($colData['2']) && !empty($colData['3']) && !empty($colData['4']) && !empty($colData['5']) && !empty($colData['14'])  ){
					/*$insProd = "INSERT INTO `oc_product`(`seller_id`,`sku`,`quantity`, `stock_status_id`, `image`, `manufacturer_id`, `shipping`, `price`, `tax_class_id`, `date_available`, `weight`, `weight_class_id`, `length`, `width`, `height`, `length_class_id`, `subtract`, `minimum`, `sort_order`, `status`, `date_added`) VALUES ('".$seller_id."','".$model."','".$sku."','".$upc."','".$ean."','".$jan."','".$isbn."','".$mpn."','".$location."','".$quantity."','".$minimum_quantity."','".$image."','".$manufacturer_id."','".$shipping_amount."','".$price."','".$tax_class."','".$date_available."','".$weight."','".$weight_class_id."','".$length."','".$width."','".$height."','".$length_class_id."','".$subtract_stock."','".$minimum_quantity."','".$sort_order."','".$status."',NOW())";*/
					$getManufacturer = "SELECT * FROM `oc_manufacturer` WHERE `name` LIKE '%".$colData['16']."%' ";
					if(!$getManufacturer = mysqli_query($con,$getManufacturer)){
						mysqli_error();
						mysqli_close();
						die("");
					}
					$numManufact = mysqli_num_rows($getManufacturer);
					if($numManufact == 0){
						$insManufact = "INSERT INTO `oc_manufacturer`(`name`) VALUES ('".$colData['16']."')";
						if(!$checkInsManuFace = mysqli_query($con,$insManufact)){
						mysqli_error($con);
						mysqli_close($con);
						die("");
						}
						$lastManuId = mysqli_insert_id($con);
						$insManuToStoryQry = "INSERT INTO `oc_manufacturer_to_store`(`manufacturer_id`) VALUES ('".$lastManuId."')";
						if(!mysqli_query($con,$insManuToStoryQry)){
						mysqli_error();
						mysqli_close();
						die("");
						}
					}else{
					$getManufacturerData = mysqli_fetch_assoc($getManufacturer);
					$lastManuId = $getManufacturerData['manufacturer_id'];
					}
					if($colData['23'] == "Enabled"){
						$status_id = '1';
					}
					$seller_id = $colData['77'];
					$insProd = "INSERT INTO `oc_product`(`seller_id`,`sku`,`quantity`, `stock_status_id`, `image`, `manufacturer_id`, `price`,`tax_class_id`,`weight`,`minimum`,`status`, `date_added`) VALUES ('".$seller_id."','".$colData['3']."','".$colData['18']."','".$colData['32']."','".$colData['57']."','".$lastManuId."','".$colData['14']."','".$colData['26']."','".$colData['22']."','".$colData['32']."','".$status_id."',NOW())";
					if(!$insCheckProd = mysqli_query($con,$insProd)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail Query");
					}else{
						echo "Data Inserted";
					}
					$ins_prod_id = mysqli_insert_id($con);

					$insProdDetails = "INSERT INTO `oc_product_description`(`product_id`, `seller_id`, `language_id`, `name`, `description`,`meta_title`, `meta_description`, `meta_keyword`) VALUES ('".$ins_prod_id."','".$seller_id."','1','".$colData['4']."','".$colData['8']."','".$colData['6']."','".$colData['7']."','".$colData['9']."')";
					if(!$insProdCheckDetails = mysqli_query($con,$insProdDetails)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail QUery 2");

					}else{
						echo "Success";
					}
					$insImg = "INSERT INTO `oc_product_image`(`product_id`, `image`) VALUES ('".$ins_prod_id."','".$colData['57']."')";
					if(!$chekcImgQry = mysqli_query($con,$insImg)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail QUery 2");
					}
					/*for($s=0;$s<$sizeOfArry;$s++){
							$value = $getAddImage[$s];
							$insAddImage = "INSERT INTO `oc_product_image`(`product_id`, `image`) VALUES ('".$ins_prod_id."','".$colData['57']."')";
							if(!$checkAddImage = mysqli_query($con,$insAddImage)){
								mysqli_close($con);
								mysqli_error($con);
								die("Error ins image");
							}
					}*///loop for prod image
					$instCate = "INSERT INTO `oc_product_to_category`(`product_id`, `category_id`) VALUES ('".$ins_prod_id."','".$colData['2']."') ";
					$layoutQry = "INSERT INTO `oc_product_to_layout`(`product_id`, `store_id`, `layout_id`) VALUES ('".$ins_prod_id."','0','0')";
					$storeQry = "INSERT INTO `oc_product_to_store`(`product_id`, `store_id`) VALUES ('".$ins_prod_id."','0')";

					if(!$insCheckMulti = mysqli_query($con,$instCate)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					if(!$CheckLayoutQry = mysqli_query($con,$layoutQry)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					if(!$CheckCateQry = mysqli_query($con,$storeQry)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					

				} //If empty End















				}/*End for loop csv*/
			}/*ENd foreach csv*/
			echo "<script>alert('File Uploaded')</script>";
		echo "<script>window.location='admin/admin-panel.php'</script>";

	}/*ENd of CSV if*/ 
	if($getFormatId == 3){


foreach ($objPHPExcel -> getWorksheetIterator() as $worksheet) {
				  $highestRow = $worksheet->getHighestDataRow();
				 $highestCol = $worksheet->getHighestDataColumn();
				 $colString = PHPExcel_Cell::columnIndexFromString($highestCol);

				for($row=2;$row<=$highestRow;$row++){
					for($col=0;$col<=$colString;$col++){
					  $colData[$col] = mysqli_real_escape_string($con,$worksheet->getCellByColumnAndRow($col,$row)->getValue());
						}/*Column Data number*/
					

						$seller_id = $colData['0'];
				if(!empty($colData['1']) && !empty($colData['2']) && !empty($colData['5']) && !empty($colData['6'])){
					/*$insProd = "INSERT INTO `oc_product`(`seller_id`,`sku`,`quantity`, `stock_status_id`, `image`, `manufacturer_id`, `shipping`, `price`, `tax_class_id`, `date_available`, `weight`, `weight_class_id`, `length`, `width`, `height`, `length_class_id`, `subtract`, `minimum`, `sort_order`, `status`, `date_added`) VALUES ('".$seller_id."','".$model."','".$sku."','".$upc."','".$ean."','".$jan."','".$isbn."','".$mpn."','".$location."','".$quantity."','".$minimum_quantity."','".$image."','".$manufacturer_id."','".$shipping_amount."','".$price."','".$tax_class."','".$date_available."','".$weight."','".$weight_class_id."','".$length."','".$width."','".$height."','".$length_class_id."','".$subtract_stock."','".$minimum_quantity."','".$sort_order."','".$status."',NOW())";*/
					$getManufacturer = "SELECT * FROM `oc_manufacturer` WHERE `name` LIKE '%".$colData['10']."%' ";
					if(!$getManufacturer = mysqli_query($con,$getManufacturer)){
						mysqli_error();
						mysqli_close();
						die("");
					}
					$numManufact = mysqli_num_rows($getManufacturer);
					if($numManufact == 0){
						$insManufact = "INSERT INTO `oc_manufacturer`(`name`) VALUES ('".$colData['10']."')";
						if(!$checkInsManuFace = mysqli_query($con,$insManufact)){
						mysqli_error($con);
						mysqli_close($con);
						die("");
						}
						$lastManuId = mysqli_insert_id($con);
						$insManuToStoryQry = "INSERT INTO `oc_manufacturer_to_store`(`manufacturer_id`) VALUES ('".$lastManuId."')";
						if(!mysqli_query($con,$insManuToStoryQry)){
						mysqli_error();
						mysqli_close();
						die("");
						}
					}else{
					$getManufacturerData = mysqli_fetch_assoc($getManufacturer);
					$lastManuId = $getManufacturerData['manufacturer_id'];
					}
					if($colData['12'] == 'FALSE'){
						$stock_status_id = '0';
					}
					
					$status_id = '1';
					$getAddImage = explode(',', $colData['4']);

					$sizeOfArry = count($getAddImage);
					

					$insProd = "INSERT INTO `oc_product`(`seller_id`,`sku`,`quantity`, `stock_status_id`, `image`, `manufacturer_id`, `price`,`status`, `date_added`) VALUES ('".$seller_id."','".$colData['1']."','".$colData['6']."','".$stock_status_id."','".$getAddImage['0']."','".$lastManuId."','".$colData['6']."','".$status_id."',NOW())";
					if(!$insCheckProd = mysqli_query($con,$insProd)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail Query");
					}else{
						echo "Data Inserted";
					}
					$ins_prod_id = mysqli_insert_id($con);

					$insProdDetails = "INSERT INTO `oc_product_description`(`product_id`, `seller_id`, `language_id`, `name`, `description`,`meta_title`, `meta_description`, `meta_keyword`) VALUES ('".$ins_prod_id."','".$seller_id."','1','".$colData['1']."','".$colData['3']."','".$colData['1']."','".$colData['1']."','".$colData['1']."')";
					if(!$insProdCheckDetails = mysqli_query($con,$insProdDetails)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail QUery 2");

					}else{
						echo "Success";
					}
					$insImg = "INSERT INTO `oc_product_image`(`product_id`, `image`) VALUES ('".$ins_prod_id."','".$getAddImage['0']."')";
					if(!$chekcImgQry = mysqli_query($con,$insImg)){
						mysqli_error($con);
						mysqli_close($con);
						die("Fail QUery 2");
					}
					for($s=0;$s<$sizeOfArry;$s++){
							$value = $getAddImage[$s];
							$insAddImage = "INSERT INTO `oc_product_image`(`product_id`, `image`) VALUES ('".$ins_prod_id."','".$value."')";
							if(!$checkAddImage = mysqli_query($con,$insAddImage)){
								mysqli_close($con);
								mysqli_error($con);
								die("Error ins image");
							}
					}//loop for prod image
					$instCate = "INSERT INTO `oc_product_to_category`(`product_id`, `category_id`) VALUES ('".$ins_prod_id."','".$colData['9']."') ";
					$layoutQry = "INSERT INTO `oc_product_to_layout`(`product_id`, `store_id`, `layout_id`) VALUES ('".$ins_prod_id."','0','0')";
					$storeQry = "INSERT INTO `oc_product_to_store`(`product_id`, `store_id`) VALUES ('".$ins_prod_id."','0')";

					if(!$insCheckMulti = mysqli_query($con,$instCate)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					if(!$CheckLayoutQry = mysqli_query($con,$layoutQry)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					if(!$CheckCateQry = mysqli_query($con,$storeQry)){
						mysqli_error($con);
						mysqli_close($con);

						die("Error");
					}
					

				} //If empty End
			}/*End for loop csv*/
		}
		echo "<script>alert('File Uploaded')</script>";
		echo "<script>window.location='admin/admin-panel.php'</script>";
	}
/*echo "<script>alert('File Uploaded Successfully')</script>";
echo "<script>window.location='dashboard.php'</script>";*/

		
?>