<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
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
     color: #1F1A17;
   }
   /* label focus color */
   .input-field input[type=text]:focus + label {
     color: #1F1A17;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #1F1A17;
     box-shadow: 0 1px 0 0 #1F1A17;
   }
   /* valid color */
   .input-field input[type=text].valid {
     border-bottom: 1px solid #1F1A17;
     box-shadow: 0 1px 0 0 #1F1A17;
   }
   /* invalid color */
 
   /* icon prefix focus color */
   .input-field .prefix.active {
     color: #1F1A17;
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
					 <div class="row black-text">
    <form class="col s12 " action="php/scripts/update-pass.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input  id="new_pass" name="new_pass" type="text" class="validate">
          <label for="new_pass">New Password</label>
        </div>
        <div class="input-field col s6">
          <input id="re_pass" type="text" name="re_pass" class="validate">
          <label for="re_pass">Retype Password</label>
        </div>
      </div>
      <button class="btn waves-effect waves-light grey" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
      </form></div>
			<!-- 	<div class="row">
					<div class="col s6 m6 l6">
						<ul class="tabs">
							<li class="tab col s2"><a href="#test1">Test 1</a></li>
							<li class="tab col s2"><a class="active" href="#test2">Test 2</a></li>
							<li class="tab col s2 "><a href="#test3">Test 3</a></li>
						</ul>
						<div id="test1" class="col s12">Test 1</div>
						<div id="test2" class="col s12">Test 2</div>
						<div id="test3" class="col s12">Test 3</div>
					</div>


				</div> -->

			</div>
		</div>
	</div>
</div>



	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>