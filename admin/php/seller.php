<?php

require "db_config.php";

class Seller{
		private  $db;
		private  $data = array();
		private  $files = array();
		public function __construct(){
			$this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			if(mysqli_connect_errno()){
				echo "Error : Could not connect to database";
				exit;
			}
		}
		public function getSellerInfo(){
			$sellerInfoQry = "SELECT * FROM oc_sellers ";
			$checkSellerInfo = mysqli_query($this->db,$sellerInfoQry);
			if(!$checkSellerInfo){
				mysqli_error($con);
				mysqli_close($con);
				die("");
			}
			$totalSeller = $checkSellerInfo->num_rows;
			while($sellerData = mysqli_fetch_assoc($checkSellerInfo)){
				 array_push($this->data, $sellerData);
			}

			return $this->data;
		}
		public function getSellerFiles(){
			$getFilesInfo = "SELECT * FROM `oc_seller_excel` WHERE `status` = 0";
			$checkFileInfo = mysqli_query($this->db,$getFilesInfo);
			if(!$checkFileInfo){
				mysqli_error($con);
				mysqli_close($con);
				die('');
			}
			$totalFiles = $checkFileInfo->num_rows;
			while($fileData = mysqli_fetch_assoc($checkFileInfo)){
				array_push($this->files,$fileData);

			}
			return $this->files;
		}

		public function getFileFormatName($id){
			$getFormatName = "SELECT * FROM `oc_file_format` WHERE `format_id` = '".$id."' ";
			$checkFormatQry = mysqli_query($this->db,$getFormatName);
			if(!$checkFormatQry){
				mysqli_error($con);
				mysqli_close($con);
				die("");
			}
			return mysqli_fetch_assoc($checkFormatQry);
		}

	
		
}


?>