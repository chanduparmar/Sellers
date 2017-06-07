<?php 

include "php/scripts/config.php";
session_start();
$getSellerInfo  = "SELECT * FROM `oc_sellers` WHERE `email` = '".$_SESSION['email']."' ";
if(!$checkSellerInfo = mysqli_query($con,$getSellerInfo)){
		mysqli_query($con);
		mysqli_error($con);
		die("No Data Found");
}


$getSeller = mysqli_fetch_assoc($checkSellerInfo);
$_SESSION['seller_id'] = $getSeller['id']; 
 $company_name_db = $getSeller['company_name'];
 $pan_no_db = $getSeller['pan_no'];
 $vattin_no_db = $getSeller['vattin_no'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Verification Process</title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link type="text/css" rel="stylesheet" href="css/index.css">
	<link type="text/css" rel="stylesheet" href="css/dashboard.css">

	<style type="text/css">
		.back-half-color {

			background-color: #1F1A17;

			background-size: 100% 50%;
		}
		body{
			background-color: #1F1A17;
		}
		.input-field label {
			color: #1F1A17 !important;
		}
		/* label focus color */
		.input-field input[type=text]:focus + label {
			color: #1F1A17 !important;
		}
		/* label underline focus color */
		.input-field input[type=text]:focus {
			border-bottom: 1px solid #1F1A17 !important;
			box-shadow: 0 1px 0 0 #1F1A17 !important;
		}
		/* valid color */
		.input-field input[type=text].valid {
			border-bottom: 1px solid #1F1A17 !important;
			box-shadow: 0 1px 0 0 #1F1A17 !important;
		}
		/* invalid color */
		.input-field input[type=text].invalid {
			border-bottom: 1px solid #1F1A17 !important;
			box-shadow: 0 1px 0 0 #1F1A17 !important;
		}
		/* icon prefix focus color */
		.input-field .prefix.active {
			color: #1F1A17 !important;
		}
		span{
			color: red;
		}
	</style>
</head>
<body>
	<nav>
		<div class="nav-wrapper  card-color">
			<a href="index.php" class="brand-logo">Elegends</a>


			<!-- <p class="center-align">Sell On  Elegends</p> -->
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href=""><?php echo $_SESSION['email'];  ?></a></li>
				<li><a href="php/scripts/logout.php">Logout</a></li>

			</ul>

		</div> 
	</nav>

	<div class="card-panel card-color white-text" style="    margin-top: 0px;"> <h6 class="center-align">Deal Seller,Welcome to Elegends<br><font size="1px"><p>(You email verification is complete.You are just 1 step away from filling sellers registration form.)<br>(Please provide the informations below to proceed.)</p></font></h6></div>

	<div class="container">
		<div class="row " >
			<div class="col s12 m12 l12 ">
				<div class="card-panel  white">
					
					<div class="row">
						<div class="col s12 m12 l6" >
							
							<div id="basic_details" class="col s12">
								<h4>Basic Details</h4>
								<div class="row black-text">
									<form class="col s12 " id="form1">
										<div class="row">
											<div class="input-field col s6">

												<input  id="company_name" name="company_name" type="text" value="<?=$company_name_db?>"  placeholder="Enter company name" class="validate"  />
												
												<label for="company_name">Company Name <span id="compnay_name_error_msg" ></span></label>
											</div>
											<div class="input-field col s6">
												<input id="company_pan_no" type="text" name="company_pan_no" value="<?=$pan_no_db?>" class="validate" >
												
												<label for="company_pan_no">Company Pan Number<span id="compnay_pan_no_error_msg"></span></label>
											</div>

											<div class="input-field col s6">
												<input id="name" type="text" name="name" class="validate" placeholder="Enter name" >				
												<label for="name">Name<span id="name_error_msg"></span></label>
											</div>
											<div class="input-field col s12">
												<select multiple id="select_cate" name="cate_list[]" required>
													<option value="" disabled >Select Category</option>
													<option value="Auto Mobile">Auto Mobile</option>
													<option value="Bags & Luggage">Bags & Luggage</option>
													<option value="Boy Clothing">Boy Clothing</option>
													<option value="Gaming">Gaming</option>
													<option value="Girls Clothing">Girls Clothing</option>
													<option value="Home and Kitchen">Home and Kitchen</option>
												</select>
												<label>Select Category<span id="select_error_msg"></span></label>
											</div>
										</div>
										<button class="btn waves-effect waves-light grey update_form" type="submit" id="next1" name="action">Next
									<i class="material-icons right">send</i>
								</button>
									</form></div>
							</div>
							<div id="business_details" class="col s12">
								<h4>Business Details</h4>
								<div class="row black-text">
									<form class="col s12 " id="form2">
										<div class="row">
											<div class="input-field col s12">
												<input id="product_pickup_address" type="text" name="product_pickup_address" placeholder="Enter address" class="validate" required>
												<label for="product_pickup_address">Product Pickup Address<span id="pickup_add_error_msg"></span></label>
											</div>
											<div class="input-field col s6">
												<input id="pin_code" type="text" name="pin_code" placeholder="Enter pincode" class="validate" required>											
											<label for="pin_code">Pin Code <span id="pin_code_error_msg"></span></label>
											</div>
											<div class="input-field col s6">
												<input id="city" type="text" name="city" class="validate" placeholder="Enter city " required>
												<label for="city">City<span id="city_error_msg"></span></label>
											</div>
											<div class="input-field col s6">
												<input id="state" type="text" name="state" placeholder="Enter state" class="validate" required>										
												<label for="state">State<span id="state_error_msg"></span></label>
											</div>
											<div class="input-field col s6">
												<input id="vattin_number" type="text" name="vattin_number" value="<?=$vattin_no_db?>" placeholder="Enter VAT/TIN No" class="validate" required>											
												<label for="vattin_number">VAT/TIN Number<span id="vattin_error_msg"></span></label>
											</div>
											<div class=" col s12">
												<p>Do you have CST number to sell your goods across County?</p>
												<p>
													<input name="cst" type="radio" id="yes" />
													<label for="yes">Yes</label>
													<input name="cst" type="radio" id="no" />
													<label for="no">No</label>&nbsp&nbsp&nbsp<span id="cst_error_msg"></span>
												</p></div>
											</div>
										</div>
									</form>
									<button class="btn waves-effect waves-light grey update_form" type="submit" id="next2" name="action">Next
										<i class="material-icons right">send</i>
									</button></div>
									<div id="bank_details" class="col s12">	
										<h4>Bank Details</h4>						
										<div class="row black-text">
											<form class="col s12 " id="form3" >
												<div class="row">
													<div class="input-field col s12">
														<input  id="beneficiary_name" name="beneficiary_name" placeholder="Enter beneficiary name" type="text" class="validate" required/>
														
														<label for="beneficiary_name">Beneficiary Name<span id="beneficiary_name_error_msg"></span></label>
													</div>
													<div class="input-field col s6">
														<input id="current_account_number" type="text" placeholder="Enter account number" name="current_account_number" class="validate" required>

														<label for="current_account_number">Current Account Number<span id="current_account_numbe_error_msg"></span></label>
													</div>
													<div class="input-field col s6">
														<input id="confirm_current_account_number" type="text" name="confirm_current_account_number" class="validate" placeholder="Reenter account number" required>
														
														<label for="confirm_current_account_number">Confirm Account Number<span id="confirm_current_account_number_error_msg"></span></label>
													</div>
													<div class="input-field col s12">
														<input id="isfc" type="text" name="isfc" class="validate" placeholder="Enter ISFC code" required>
														
														<label for="name">ISFC Code<span id="isfc_code_error_msg"></span></label>
													</div>
												</div>
											</form><button class="btn waves-effect waves-light grey update_form" type="submit" id="next3" name="action">Next
											<i class="material-icons right">send</i>
										</button></div>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>



			<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
			<script type="text/javascript" src="js/materialize.min.js"></script>
			<script type="text/javascript" src="js/validate-form.js"></script>
			<script type="text/javascript">
				$(document).ready(function(){



					$('select').material_select();
					$('#business_details').hide();
					$('#bank_details').hide();

		


    	});


				
			</script>
		</body>
		</html>