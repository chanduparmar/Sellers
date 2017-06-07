 <?php
 	require_once 'php/admin.php';
 		$admin = new Admin();

 	if(isset($_REQUEST['submit'])){
 		extract($_REQUEST);

 		 $login = $admin->login($username,$password);

 		if($login){
 			
 			echo "<script>window.location='admin-panel.php'</script>";
 		}else if(!$login){
 			echo "invalid admin";
 		}
 	}


 ?>

  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
    <div class="container col s12 m12 l6">
    <div class="card-panel col s12 m12 l6">
    <h5 class="center-align">Admin</h5>
    	 <form name="login" method="post" action="" >
      <div class="row">
        <div class="input-field col s12 m12 l12">
          <input id="username" type="text" class="validate" name="username">
          <label for="username">Username</label>
        </div>
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
       <button class="btn waves-effect waves-light " name="submit" type="submit" onclick="return(submitLogin());" >Submit
    <i class="material-icons right">send</i>
  </button>
      </form>
    </div>
    	
    </div>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script type="text/javascript">
      	
      	function submitLogin(){
      		var form = document.login;
      		if(form.username.value == ""){
      			alert("Enter username");
      			return false;
      		}else if(form.password.value == ""){
      			alert("Enter Password");
      			return false;
      		}
      	}
      </script>
    </body>
  </html>
