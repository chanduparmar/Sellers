 <html>
 <head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link type="text/css" rel="stylesheet" href="css/index.css">
  <style type="text/css">
    .image-upload > input
{
    display: none;
}
.image{
  width: 50px;
}
 .input-field input[type=text].valid {
     border-bottom: 1px solid #1F1A17;
     box-shadow: 0 1px 0 0 #1F1A17;
   }
   .input-field input[type=text]:focus + label {
     color: #1F1A17;
   }
   /* label underline focus color */
   .input-field input[type=text]:focus {
     border-bottom: 1px solid #1F1A17;
     box-shadow: 0 1px 0 0 #1F1A17;
   }

  </style>
 </head>

 <body>

  <!-- Modal -->
   

  <!-- Modal -->
  <!-- NavBar Starts here....... -->
  <nav>
    <div class="nav-wrapper grey darken-4">
      <a href="#" class="brand-logo">Elegends</a>
      
      <ul id="nav-mobile" class="right hide-on-med-and-down">

        <li><a href="sass.html">Home</a></li>

        <li><a href="collapsible.html">Download App</a></li>

      </ul>
    </div>
  </nav>
  <!-- Nav end -->

  <!-- Tabs -->
  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Upload Product</a></li>
        <li class="tab col s3"><a href="#test2">Sales Panel</a></li>
        <li class="tab col s3 "><a href="#test3">Order History</a></li>
        <li class="tab col s3"><a href="#test4">New Orders</a></li>
      </ul>
    </div>

    <!-- ******************************************************************* Upload Product -->
    <div id="test1" class="col s12">
   <div id="images-to-upload">
      
    </div>
<div class="image-upload col s4 ">
<div class="row">
    <label for="images">
        <img id="my_image" src="images/upload_img.png" style="height: 12em;
    width: 13em;
       ;" />
    </label>
 
  <button class="btn waves-effect waves-light " type="submit" id="upload_all" name="action" style="background-color:#1A1F17; color:#ffffff;">Submit
    <i class="material-icons right">send</i>
  </button></div>
 
    <input id="images" type="file" name="images[]" multiple />

 <div id="toptitle" class="">
<h4>Upload you image here<h5>(click here)</h5> </h4>

</div>


</div>

 <div class="container col s8" id="contain">
<h3>Add Products</h3>
<h6>(You can upload multiple products )</h6>
<div class="divider"></div>
  <div class="section">
    <h5>1)</h5>
    <p>Please upload photos of your products</p>
  </div>

<div class="divider"></div>
  <div class="section">
    <h5>2)</h5>
    <p>Mention the size available or colors</p>
  </div>

<div class="divider"></div>
  <div class="section">
    <h5>3)</h5>
    <p>Mention the quantity available in it</p>
  </div>
</div>

    </div>
</div>

 



    <!-- ******************************************************************* Upload Product -->





    <div id="test2" class="col s12">Test 2</div>
    <div id="test3" class="col s12">Test 3</div>
    <div id="test4" class="col s12">Test 4</div>
  </div>
  <!-- Tabs -->




  <!-- Fotter Start -->

  <footer class="page-footer" style="background-color : #1F1A17;">
   <div class="container" id="change">
    <div class="row">
     <div class="col l6 s12">
      <h5 class="white-text">Elegneds</h5>
      <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
    </div>
    <div class="col l4 offset-l2 s12">
      <h5 class="white-text">Sellers Panel</h5>
      <ul>
       <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
       <li><a class="grey-text text-lighten-3" href="#!">Elegends</a></li>
       <li><a class="grey-text text-lighten-3" href="#!">Contact Us</a></li>
       <li><a class="grey-text text-lighten-3" href="#!">About Us</a></li>
     </ul>
   </div>
 </div>
</div>
<div class="footer-copyright">
  <div class="container">
   © 2016 Copyright Text
   <a class="grey-text text-lighten-4 right" href="#!">022-25877456</a>
 </div>
</div>
</footer>
<!-- End footer -->
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
<script type="text/javascript">

var fileCollection = new Array();
    $('#images').on('change',function(e){
      var files = e.target.files;
      $.each(files, function(i, file){
        fileCollection.push(file);
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
          var template = '<form action="/upload">'+
          '<div class="row">'+
          '<div class="col s1 ">'+
            '<img width="100px" src="'+e.target.result+'"> '+
            '</div>'+


          '<div class="input-field col s2 m2"><input placeholder="Product name" id="first_name" type="text" class="validate"></div>'+
          '<div class="input-field col s1"><input placeholder="Color" id="first_name" type="text" class="validate"></div>'+
          '<div class="input-field col s1"><input placeholder="Size" id="first_name" type="text" class="validate"></div>'+
          '<div class="input-field col s2"><input placeholder="Price" id="first_name" type="text" class="validate"></div>'+
          '<div class="input-field col s1"><input placeholder="Quantity" id="first_name" type="text" class="validate"></div>'+
          '<div class="input-field col s4"><input placeholder="Description" id="first_name" type="text" class="validate"></div>'+

          
        '</div>'+

          
          
          '</form>';
          $('#images-to-upload').append(template);
        };
      });
    });
    //form upload ... delegation
    $(document).on('submit','form',function(e){
      e.preventDefault();
      //this form index
      var index = $(this).index();
      var formdata = new FormData($(this)[0]); //direct form not object
      //append the file relation to index
      formdata.append('image',fileCollection[index]);
      var request = new XMLHttpRequest();
      request.open('post', 'server.php', true);
      request.send(formdata);
    });

    $(document).ready(function(){

      
      $(".image-upload").click(function(){
        if( $('#iamges').val() != ""){
          $("#contain").show();
          $("#toptitle").show();
        }else{
        $(".images-to-upload").show();
         $("#contain").hide();
          $("#toptitle").hide();
        
        $("#upload_all").show();
        $("#my_image").attr("src","images/upload_more.png");
        $("#my_image").css("height","100px");
          $("#my_image").css("width","100px");
          $("#upload_all").show();
        }

      });

    });

</script>
</body>
</html>