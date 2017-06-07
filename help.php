 <?php 
 session_start();
 ?>
 <html>
 <head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="css/dashboard.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <style type="text/css">
    body{
      background-color:#1F1A17;     }
  </style>
</head>

<body>

  <nav>
    <div class="nav-wrapper card-color">

     <a href="index.php">  <img class="responsive-img" src="images/logo2.png" style="max-width: 65px;
      max-height: 56px;
      margin-bottom: 8px;"></a>

      <a href="#" data-activates="mobile-demo" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
      <!-- <p class="center-align">Sell On  Elegends</p> -->
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if(isset($_SESSION['email'])){ ?>
         <li ><a href="index.php">Home</a></li>
         <li ><a href="dashboard.php">Dashboard</a></li>
         <li><?php echo "".$_SESSION['email']; ?></li>
         <li><a href="php/scripts/logout.php">Logout</a></li>
         <?php } else {  echo "<script>alert('Login please!');</script>";
         echo "<script>window.location='index.php'</script>"; }?>
       </ul><div class="row">
       <ul class="side-nav hide-on-large-only" id="mobile-demo" style="   min-height: 30em; " >
         <?php if(isset($_SESSION['email'])){ ?>
            <li ><a id="help">Help</a></li>
        <li ><a id="already_list_nav">Upload Product</a></li>
        
           <li class="li-color"><a href="index.php">Home</a></li>
           <li class="li-color"><a href="dashboard.php">Dashboard</a></li>
           <li class="li-color"><a href="php/scripts/logout.php">Logout</a></li>
         </div>
         <?php }else{ ?>
           <li><a href="#modal1" class="modal-trigger">Login</a></li>
           <?php } ?>
         </ul>
       </div>
     </nav>

     <div class="col s12 m12 l12"><!-- PAge Div starts -->
     <div class="row"><!-- Side nav row starts -->
     <div class="col s12 m12 l2 side-nav fixed hide-on-med-and-down" ><!-- Side NAv Starts -->
       <ul >
        <li ><a id="help_nav">Help</a></li>
        <li ><a id="upload_product_nav">Upload Product</a></li>
        
      </ul>
    </div><!-- Side nav ends -->
    <div class=" col s12 m12 l10" id="help_cont">
      <div class="card-panel  "><div class="card-content  center-align" style="font-family: Century Gothic;"> <img class="responsive-img" src="images/logo2.png" style="max-width: 65px;
      max-height: 56px;
      margin-bottom: 8px;"><h3>Welcome to E-Legends help panel</h3><h5><p > You will find detailed instructions about all the features of the seller panel right here.
On the left side you can select the category in which you have any query or doubts and need help regarding the same.
You can access them at any-time and understand the panel in a better way using this section
Incase if you need any further assistance you can drop us an E-mail or fill the contact us form</p></h5>
<hr>
<div class="card-panel">
<h1>HAPPY SELLING !</h1>
</div>
</div></div>

    </div>
    <div class="col s12 m12 l10" id="upload_product_cont"><!-- Upload product cont starts -->
       <div class="card-panel hoverable col s12 m12 l12  "><!-- Main page card -->
           
            <!-- Upload product card -->
            <div class="card-panel hoverable ">
              <a href="" download>Elegends File Format</a>
              <a href="" download>Magento File Format</a>
              <a href="" download>Row File Format</a>
            </div>
              <div class="card-panel hoverable "><h5>How to create your products excel file</h5>
                <ol>
                  <li>Download the template for the Excel sheet from<a href="files/Product upload format.xls" download/>&nbsphere</a></li>
                  
                  <li>After the template is downloaded, open the template.</li>
                  <li>In the template you will find a predefined format in the excel sheet where you have to enter the details.</li>
                  <li> For example if you are a apparel’s vendor then you will have to fill the (Product name, Size, Color, Price, Weight, Description, Images path, additional images path etc).</li>
                  <li>Excel File Detail
                    <ol>
                      <li>Product Name = "You Product Name" (Ex. MacBook Air)</li>
                      <li>Meta Tag and Meta Tag Keyword will be field by system.</li>
                      <li>Description = "Your product description" (Ex. This is macbook air.....)</li>
                      <li>Product Tags will be field by system.</li>
                      <li>Model = "Model Number" (Ex. SM-G920)</li>
                      <li>Price = "Product Price " (Ex. 47000)</li>
                      <li>Tax Class leave  as it is.</li>
                      <li>Quantity = "Quantity of product" (Ex. 5)</li>
                      <li>Minimum Quantity: the minimum amount of product a customer must reach to add that product to their Shopping Cart. (Ex. 2)</li>
                      <li>Subtract Stock: "Yes" will subtract stock from the quantity of the product (Ex: If there are 100 computers, and a customer buys 2 computers, Subtract Stock will change the quantity to 98).</li>
                      <li>Out of Stock Status: select "Out of Stock", "In Stock", "2-3 days", or "Preorder" as the message shown on the product page when the product's quantity reaches 0.</li>
                      <li>Requires Shipping: If the product requires shipping, select "Yes". If not, select "No".</li>
                      <li>SKU (stock keeping unit): a random code for the product.</li>
                      <li>UPC (universal product code): the product's unique barcode.</li>
                      <li>EAN (European Artical Number)</li>
                      <li>JAN (Japanese Artical Number)</li>
                      <li>ISBN (International Standard Book Number)</li>
                      <li>MPN (Manufacturer Part Number)</li>
                      <li>Location: where the product is located.</li>
                      <li>SEO Keyword : System generated</li>
                      <li>Image : Path for image = "catalog/demo/image-name.jpg" (Path for the image must be 'catalog/demo/' then your image name .jpg</li>
                      <li>Dimensions: enter the length by width by height of the product if there are dimensions to include.(Sepereted by 'x'</li>
                      <li>Length Class: determines the metric units for the dimensions above.</li>
                      <li>Weight: Enter a number for the weight.</li>
                      <li>Weight Class: Specify the units of weight for the number entered into "Weight".</li>
                      <li>Status: Enabling makes the product publicly available in the store. Disabling allows the product to be edited in the administration , but hides it from the store front .</li>
                      <li>Sort Order: When the product is sorted in a list, a number assigns it a priority. A product with a sorting order or 2 will be placed higher than a product with a sorting order of 3, but lower than a product with a sorting order of 1.</li>
                      <li>Manufacturer = Name of the manufacturer (Ex. Samsung)</li>
                      <li>Catagories = "Catagory of the product"</li>
                      <li>Stores : Leave it as default</li>
                      <li>Related optional</li>
                      <li>Additional Images = This is important part (Multiple images for 1 product) Enter all the images path seperated by ',' as shown in template format (Path should be same "catalog/demo/image-name.jpg/png/jpeg)</li>
                      <li>Download,Date available,Specail price,Special Customergroupid,Special Customerpriority,Special StartDate,Special EndDate,Product Points,Field1,Field2,Field3,Field4</li>
                    


                    </ol>

                  </li>
                  <li>Save your excel sheet that you have created.</li>
               <!--    <li>Enter the modal no.</li>
                  <li>Enter the price of your products.</li>
                  <li>Enter the quantity of the product.</li>
                  <li>Enter the image path.</li>
                  <li>Enter the manufacturer name and catagory.</li>
                  <li>If you want to add more image enter path for that in Additional Image. </li>
                  <li>Enter the addtional information if you want(ex.Length,Weight,Special price,discount etc.....).</li> -->
                </ol>  
              </div>
           <!-- Upload product card ends -->
           <!-- Bulk upload starts -->
              <div class="card-panel hoverable "><h5>How to upload the excel sheet of your products</h5>
            <p><b>A standard format is to be followed while uploading Products using Bulk Upload functionality.</b></p>
                <ol>
                  <li>Click on “File” button in the upload product menu.</li>
                 <!--  <span>(Ensure Product Images are uploaded in your backend system and the same path is given in the Bulk

                    upload file before you start the uploading process.)</span> -->
                    <li>Select the path where you have saved your product list which you created using the above method.</li>
                    <li>Click on open or enter in the dialogue box.</li>
                    <li>Wait for your file to get uploaded.</li>
                    <li>Click on submit once your file is uploaded.</li>
                  </ol>
                </div>
             
          <!-- Bulk upload ends -->
          <!-- Images Upload -->
                 <div class="card-panel hoverable ">How to upload images
                
                  <ol>

                    <li>Click on "UPLOAD IMAGES" button to select images.</li>
                    <li>Open the folder where all the images are stored.</li>
                    <li>Select all the images you want to upload.</li>
                    <span><b>Note:-Image name and the name of the image in excel file path sould be same(ex. Path :- catalog/demo/apple.jpg AND Image Name = apple.jpg)</b></span>
                    <li>After selecting all the images click on open.</li>
                    <li>Now click on submit.</li>
                    <span><b>wait for some time you will get popup showing "Images are uploaded".Now you have successfully uploaded images</b>(For uploading products click on 'Upload Product')</span>
                  </ol>
                </div>
                <!-- Upload images -->
             
         
          </div><!-- Main page card ends -->
    </div><!-- Upload prod cont ends -->





    </div><!-- side nav row ends -->
    </div><!-- Page div ends -->
    <?php include "php/pages/footer.php" ?>
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/dashboard.js"></script>
    <script type="text/javascript">
      $('document').ready(function(){
        $('#upload_product_cont').hide();
        $('#upload_product_nav').click(function(){
          $('#help_cont').hide();
          $('#upload_product_cont').show();
        });
        $('#help_nav').click(function(){
          $('#help_cont').show();
          $('#upload_product_cont').hide();
        });

      });
    </script>

  </body>
  </html>
