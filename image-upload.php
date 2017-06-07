<?php
session_start();
		include "php/scripts/config.php";
		
		if(isset($_POST['img_submit'])){
				$j=0; // Variable for indexing uploaded image
				/*$target_path = "../image/catalog/demo/".$_SESSION['email'].'/';*/
			/*	$date_path = $target_path.date('Y-m-d');*/
			$target_path = "../image/catalog/demo/";
	
				 $image_name = $_FILES['img-file']['name'];

				for($i=0; $i< count($_FILES['img-file']['name']);$i++){
						//Loop to get individual element from the array
					 $name = $_FILES['img-file']['name'][$i];
					 $image_cont = addslashes(file_get_contents($_FILES['img-file']['tmp_name'][$i]));
					$validextensions = array("jpeg","jpg","png","JPG","JPEG");//Extension which are allowed
					$ext = explode(".",basename($_FILES['img-file']['name'][$i]));//Explode file name from Dot .
					$file_extension = end($ext);//Store extension in variable
									/*if (!file_exists($target_path)) {
											 mkdir($target_path, 0777, true);
											 
											if(!file_exists($date_path)){
 									 mkdir($date_path, 0777, true);
 									 $date_path = $target_path.date('Y-m-d').'/';
 												}
									}else{
									$date_path = $target_path.date('Y-m-d').'/';
									}*/
									
	
					/*$date_path = $date_path.$name.".".$ext[count($ext)-1];*/ //Set target file with new name and decrement count of ext
				$new_path = $target_path.$name;
					$j = $j+1; // increament index upload
					
					if(in_array($file_extension, $validextensions)){
						if(move_uploaded_file($_FILES['img-file']['tmp_name'][$i], $new_path)){
							echo "<script>alert('Images Uploaded')</script>";
							echo "<script>window.location='dashboard.php'</script>";
						}else{
							echo "Error uploading images";
							die("");
						}
					}


				}



		}
?>