<?php
	session_start();
	$_SESSION['email'] = $_GET['sellerEmail'];
	$_SESSION['seller_id'] = $_GET['sellerId'];
	echo "<script>alert('Redirecting to seller's panel')</script>";
	echo "<script>window.location='../../dashboard.php'</script>";


?>