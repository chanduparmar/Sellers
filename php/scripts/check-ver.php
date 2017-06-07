<?php
		session_start();
		$email = $_SESSION['email'];

		include "config.php";
		$checkVerNo = "SELECT `verification` FROM `oc_sellers` WHERE `email` = '".mysqli_escape_string($con,$email)."'";
		if(!$resVerNo = mysqli_query($con,$checkVerNo)){
			mysqli_close($con);
			mysqli_error($con);
			die("");	
		} 
		if(mysqli_num_rows($resVerNo) == 0){
			echo "No data found";
			die("");
		}
		$verification_no = mysqli_fetch_assoc($resVerNo);
		$verifi_no = $verification_no['verification'];

		if($verifi_no == 0){
				echo "<script>window.location='../../sellers-ver.php'</script>";
		}else{
				echo "<script>window.location='../../dashboard.php'</script>";
		}
?>