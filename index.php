<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sell Products Online On Elegends</title>
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link type="text/css" rel="stylesheet" href="css/index.css">
  <link type="text/css" rel="stylesheet" href="css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
  <style type="text/css">
    span{
      color: red !important;
    }
.side-nav a{
  color: white;
}
.li-color{
      background-color: #1F1A17;
          border: solid 1px;
    }
    button:focus {
    outline: none;
    background-color: #ffffff;
}

  </style>

</head>
<body>




  <!-- Modal -->
  <!-- NavBar Starts here....... -->
  <nav>
    <div class="nav-wrapper  card-color">
    <img class="responsive-img" src="images/logo2.png" style="max-width: 65px;
    max-height: 56px;">
     <!--  <a href="#" class="brand-logo">Elegends</a> -->
      <a href="#" data-activates="mobile-demo" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a> 
      <!-- <p class="center-align">Sell On  Elegends</p> -->
      <ul  class="right  hide-on-med-and-down">
      <?php if(!isset($_SESSION['email'])){ ?>
        <div class="row">
         <li><a class="modal-trigger" href="#modal1">Login</a></li>
       </div>  
       <?php }else{   ?>
        <div class="row">
             <li><?php echo $_SESSION['email']; ?></li>
                <li><a href="dashboard.php">Dashboard</a></li>
             <li><a href="php/scripts/logout.php">Logout</a></li>
             </div>
        <?php } ?>
     </ul>
     <ul class="side-nav hide-on-large-only" id="mobile-demo" style="        min-height: 30em; " >
     <?php if(isset($_SESSION['email'])){ ?>
      <div class="row">

             <li class="li-color"><a><?php echo $_SESSION['email']; ?></a></li>
              <li class="li-color"><a href="dashboard.php">Dashboard</a></li>
             <li class="li-color"><a href="php/scripts/logout.php">Logout</a></li>

             </div>
      <?php }else{ ?>
 <li class="li-color"><a href="#modal1" class="modal-trigger">Login</a></li>
        <?php } ?>

   
    </ul>
  </div>
</nav>

<!-- <nav>
  <div class="nav-wrapper">
    <a href="#!" class="brand-logo">Logo</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse hide-on-med-and-up"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="sass.html">Sass</a></li>
      <li><a href="badges.html">Components</a></li>
      <li><a href="collapsible.html">Javascript</a></li>
      <li><a href="mobile.html">Mobile</a></li>
    </ul>
    <ul class="side-nav hide-on-med-and-up " id="mobile-demo" style="    left: -38px;" > 
      <li><a href="sass.html">Sass</a></li>
      <li><a href="badges.html">Components</a></li>
      <li><a href="collapsible.html">Javascript</a></li>
      <li><a href="mobile.html">Mobile</a></li>
    </ul>
  </div>
</nav> -->
<div id="modal1" class="modal" style="background-color:#1F1A17;">
  <div class="modal-content" style="color:white;">
    <h5>Login</h5>
    <form id="login_form" class="col s12" >
     <div class="input-field  col s6">
      <input id="email"  name="login_email"  type="email" class="validate">
      <label for="email" data-error="Enter vaid email">Email</label>
    </div>
    <div class="input-field  col s6 ">
      <input  id="password"  name="login_password" type="password" class="validate">
      <label for="password">Password</label>
    </div>
  </form>
  <button class="btn waves-effect waves-light" type="submit" id="login_btn" name="action">Submit

  </button>
</div>
</div>


<!-- Card for SignUp -->

<div class="row  ">

 <div class="card  card-color col s12 m12 l6 ">
  <div class="card-content white-text ">
   <p class="card-title">SignUp</p>
   <div class="row">
    <form class="col s12 m12 l12"  id="signup_form">
     <div class="row">

      <div class="input-field col s12 ">
        <input id="company_name" type="text" name="company_name" class="validate  " >
        <label for="company_name">Company Name<span id="error_company_name"></span></label>
      </div>
      <div class="input-field col s6">
       <input id="email" type="email" name="email" class="validate" >
       <label for="email">Email<span id="error_email"></span></label>
     </div>
     <div class="input-field col s6">
      <input id="mobile_no" type="text" name="mobile_no" class="validate">
      <label for="mobile_no">Mobile No<span id="error_mobile_no"></span></label>
    </div>
    <div class="input-field col s6">
      <input id="pickup_pincode" type="text" name="pickup_pincode" class="validate">
      <label for="pickup_pincode">Pickup Pincode<span id="error_pickup_pincode"></span></label>
    </div>
    <div class="input-field col s6">
      <input id="pan_no" type="text" name="pan_no" class="validate">
      <label for="pan_no">Pan No<span id="error_pan_no"></span> </label>
    </div>

    <div class="input-field col s12">
      <input id="vattin" type="text" class="validate" name="vattin">
      <label for="vattin">VAT/TIN No<span id="error_vattin"></span></label>
    </div>
  </div>

  <div class="card-action">

  </div>     
</form> <button class="btn waves-effect waves-light" id="signup_btn" type="submit" name="action">Submit
<i class="material-icons right">send</i>
</button>
<button class="btn waves-effect waves-light" type="reset" id="reset" name="action">Reset

</button>
</div>
</div>

</div>



<div class="container col s6 m6" style="margin-top : -11px;">
  <div class="slider slider-side hide-on-med-and-down">
    <ul class="slides slides-side">
      <li>
        <img src="images/ecom1.jpg"> <!-- random image -->
        <div class="caption center-align">

        </div>
      </li>
      <li>
        <img src="images/ecom2.jpg"> <!-- random image -->
        <div class="caption left-align">

        </div>
      </li>
      <li>
        <img src="images/ecom3.png"> <!-- random image -->
        <div class="caption right-align">

        </div>
      </li>

    </ul>
  </div>
</div>


</div>
<div class="row">

  <div class="slider responsive-img">
    <ul class="slides responsive-img" style="max-width:100%;">
      <li>
        <img class="responsive-img"  src="images/01.png"> <!-- random image -->
    
      </li>
      <li>
        <img  class="responsive-img"   src="images/02.png"> <!-- random image -->
      
      </li>
      <li>
        <img class="responsive-img"   src="images/03.png"> <!-- random image -->
       
      </li>
    </ul>
  </div>
  </div>
  
  
<!-- End Card here -->
<hr>
<div class="container col s12 m12 l12 offset-s2">
 <div class="row">

  <div class="col s12 m4 l4 center-align ">
   <img class="responsive-img-pro " src="images/prom1.png">
   <h5 >Sell 24x7 across
    6000 cities and towns</h5>
  </div>
  <div class="col s12 m4 l4 center-align">
   <img class="responsive-img-pro" src="images/prom2.png">
   <h5>Millions of users and
    3,00,000 sellers across India</h5>
  </div>
  <div class="col s12 m4 l4 center-align">
   <img class="responsive-img-pro" src="images/prom3.png">
   <h5>Quick payments and 
    transparent processes</h5>
  </div>

</div>
</div>
<hr>
<div class="container col s12 m12 l12">
  <h4 class="center-align">4 Simple steps to start selling online</h4>
</div>
<div class="container">

 <div class="row s12">
  <div class="col s12 m12 l6">
    <div class="card-panel card-color white-text">
     <div class="chip">

       Step 1:
       Register and list your products </div>
       <ol>
        <li>Register your business for free and create a product catalogue. </li>
        <li>Get free training on how to run your online business
          Get your documentation, photo-shoots, cataloguing, etc. </li>

        </ol>
      </div>

    </div>
    <div class="col s12 m12 l6 ">
      <div class="card-panel card-color white-text ">
       <div class="chip">
        Step 2: Receive orders and sell across India</div>
        <ol>
          <li>Once listed, your products will be available to millions of users across India </li>
          <li>Get orders and manage your online business via our top of the line Seller Panel and Seller Zone Mobile App</li>

        </ol>
      </div>

    </div>
  </div>
</div>
<div class="container">

 <div class="row s12">
  <div class="col s12 m12 l6">
    <div class="card-panel card-color white-text">
     <div class="chip">

       Step 3: Package and ship with ease </div>
       <ol>
        <li>On receiving orders, pack the goods & leave the worries of pick-up & delivery to our courier partners </li>
        <li>With Snapdeal Plus facility, simply hand over the responsibilities of inventory storage, packaging.</li>

      </ol>
    </div>

  </div>
  <div class="col s12 m12 l6 ">
    <div class="card-panel card-color white-text ">
     <div class="chip">
      Step 4: Get payments and grow your business </div>
      <ol>
        <li>Receive quick and hassle-free payments in your account once your orders are fulfilled </li>
        <li>Expand your business with low interest & collateral-free business loans through Capital Assist</li>

      </ol>
    </div>

  </div>
</div>
</div>
<hr>
<div class="container col s12">
  <div class="row" ">
   <div class="video-container">
    <iframe   src="//www.youtube.com/embed/Q8TXgCzxEnw?rel=0" frameborder="0" allowfullscreen></iframe>
  </div>
</div>
</div>



<!-- Fotter Start -->

<?php include "php/pages/footer.php" ?>
<!-- End footer -->



<!-- slider -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript" src="js/validate-signup.js"></script>
<script type="text/javascript" src="js/sweetalert.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.button-collapse').sideNav({
       // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
    );
    $('.modal-trigger').leanModal();
    $('.slider').slider();

    $('select').material_select();
      $('#reset').click(function(){
        $('#signup_form')[0].reset();
  });

  });
</script>
</body>
</html>