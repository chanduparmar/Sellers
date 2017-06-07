<?php
session_start();
include "php/scripts/config.php";
if(isset($_POST['excel-submit'])){

				$excel_file_format = $_POST['excelfile'];

				 // Variable for indexing uploaded image
				 $file_name = $_FILES['excel-upload']['name'];
				 $target_path = "admin/excel-files/";
				 $new_path = $target_path.$excel_file_format.'_'.$_SESSION['seller_id'].'_'.date('Y-m-d').'_'.$file_name;
				 $target_file = $target_path . basename($_FILES['excel-upload']['name']);
	
				 $fileType = pathinfo($target_file,PATHINFO_EXTENSION);

			}

			if(file_exists($new_path)){
				echo "FIle already exists";
				die("");
			}
			if($fileType != 'xls' && $fileType != 'xlsx' && $fileType != 'csv'){
				echo "Invalid File";
				die("");
			}else{
				if(move_uploaded_file($_FILES['excel-upload']['tmp_name'], $new_path)){
					$insQry = "INSERT INTO `oc_seller_excel`(`seller_id`,`file_name` ,`path`, `date_added`,`file_format_id`) VALUES ('".$_SESSION['seller_id']."','".$file_name."','".$new_path."','".date('Y-m-d')."','".$excel_file_format."')";
					if(!mysqli_query($con,$insQry)){
						mysqli_error($con);
						mysqli_close($con);
						die("");
					}
					echo "<script>alert('File Uploaded')</script>";
					echo "<script>window.location='dashboard.php'</script>";
				}
				else{
					echo "Upload fail";
				}
			}



?>