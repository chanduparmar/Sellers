<?php
	require "db_config.php";
	
	class Admin{
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			if(mysqli_connect_errno()){
				echo "Error : Could not connect to database";
				exit;
			}
		}
		
		public function login($username,$password){
			/*$password = md5($password);*/


			$loginQry = "SELECT * FROM `oc_seller_admin` WHERE `username` = '".$username."' AND `password` = '".$password."'  ";
			
			 $result = mysqli_query($this->db,$loginQry);

			
			 $admin_data = mysqli_fetch_assoc($result);
		 $count_row = $result->num_rows;
			if($count_row == 1){
				session_start();
				$_SESSION['username'] = $admin_data['username'];
				return true;
			}else{
				return false;
			}
		}
	}


?>