<?php 
require "db-config.php"
class Database{
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
			if(mysqli_connect_errno()){
				echo "Error : Could not connect to database";
				exit;
			}
		}
}

?>