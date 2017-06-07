<?php
	if($_FILES['files']['error']>0){
		echo "Error :".$_FILES['files']['error'].'<br>';
	}
	else{
		echo "Upload :".$_FILES['files']['name'].'<br>';
		echo "Type :".$_FILES['files']['type'];
		echo "Size".($_FILES['files']['size']/1024).'Kb<br>';

		$excel_file = $_FILES['files']['tmp_name'];
		echo $excel_file;
		include "config.php";
		$csv_file = $excel_file;
		if(($getfile = fopen($csv_file,"r")) !== false){
			$data = fgetcsv($getfile,1000,",");
			while (($data = fgetcsv($getfile,1000,",")) !== false) {
				$result = $data;
				$str = implode(",", $result);
				$slice = explode(",", $str);
				echo $col1 = $slice[0];
				/*echo $col2 = $slice[1];
				echo $col3 = $slice[2];
				echo $col4 = $slice[3];*/
				/*$insQuery = "INSERT INTO `customer`(`id`,`name`,`age`,`email`) VALUES ('".$col1."','".$col2."','".$col3."','".$col4."')";
				$checkInsQuery = mysqli_query($con,$insQuery);*/
			}
		}
		echo "<script>alert('Record successfully uploaded.');</script>";

	}


?>