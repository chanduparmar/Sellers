 <?php
 session_start();
 include "php/scripts/config.php";               
 $getSellerInfo = "SELECT * FROM `oc_sellers` WHERE `id` = '".$_SESSION['seller_id']."'";
 if(!$getCheckSellerInfo = mysqli_query($con,$getSellerInfo)){
  mysqli_error($con);
  mysqli_close($con);
  die("");
}
$getSellerDetails = mysqli_fetch_assoc($getCheckSellerInfo);
$getSellerProduct = "SELECT * FROM `oc_product` WHERE seller_id = '".$_SESSION['seller_id']."' ORDER BY `product_id` ASC  ";
if(!$getCheckProducts = mysqli_query($con,$getSellerProduct)){
 mysqli_error($con);
 mysqli_close($con);
 die("");
}
$getListProdQry = "SELECT * FROM `oc_product` WHERE seller_id = '".$_SESSION['seller_id']."' ";
if(!$checkListProdQry = mysqli_query($con,$getListProdQry)){
 mysqli_error($con);
 mysqli_close($con);
 die("");
}
?>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link type="text/css" rel="stylesheet" href="css/dashboard.css">
</head>
<body  style="background-color:#1F1A17;">
  <!-- Modal -->
  <!-- NavBar Starts here....... -->
  <nav>
    <div class="nav-wrapper card-color">
     <a href="index.php">  <img class="responsive-img" src="images/logo2.png" style="max-width: 65px;
      max-height: 56px;
      margin-bottom: 8px;"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
      <!-- <p class="center-align">Sell On  Elegends</p> -->
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <?php if(isset($_SESSION['email'])){ ?>
          <li><?php echo "".$_SESSION['email']; ?></li>
          <li><a href="help.php">Help</a></li>
          <li><a href="php/scripts/logout.php">Logout</a></li>
          <?php } else {  echo "<script>alert('Login please!');</script>";
          echo "<script>window.location='index.php'</script>"; }?>
        </ul><div class="row">
        <ul class="side-nav hide-on-large-only" id="mobile-demo" style="   min-height: 30em; " >
         <?php if(isset($_SESSION['email'])){ ?>
           <li class="li-color"><a id="dashboard">Dashboard</a></li>
           <li class="li-color"><a id="already_list">Already Listed</a></li>
           <li class="li-color"><a  id="upload_product">Upload Product</a></li>
           <li class="li-color"><a  id="upload_images">Upload Images</a></li>
           <li class="li-color"><a id="order_history">Orders</a></li>
           <li class="li-color"><a id="order_completed">Orders Completed</a></li>
           <li class="li-color"><a id="new_order">New Orders</a></li>
           <li class="li-color"><a id="returns">Returns</a></li>
           <li class="li-color"><a href="php/scripts/logout.php">Logout</a></li>
         </div>
         <?php }else{ ?>
           <li><a href="#modal1" class="modal-trigger">Login</a></li>
           <?php } ?>
         </ul>
       </div>
     </nav>
     <!-- Nav Bar ends here........ -->
     <div class="row col s12 m12 l12">
      <div class="col s12 m12 l2 side-nav fixed hide-on-med-and-down" >
       <ul >
        <li ><a id="dashboard_nav">Dashboard</a></li>
        <li ><a id="already_list_nav">Already Listed</a></li>
        <li ><a id="upload_product_nav" >Upload Product</a></li>
        <li ><a id="upload_images_nav" >Upload Images</a></li>
        <li><a id="order_history_nav">Orders</a></li>
        <li><a id="order_completed_nav">Order Completed</a></li>
        <li><a id="new_order_nav">New Orders</a></li>
        <li><a id="returns_nav">Returns</a></li>
        <li><a href="help.php">Help</a></li>
      </ul>
    </div>

    <div class="col s12 m12 l10" id="order_completed_cont"><!-- Order Completed -->
    <?php
        $getCompletedProdQry = "SELECT * FROM `oc_product`,`oc_product_description` WHERE oc_product.seller_id = '".$_SESSION['seller_id']."' AND  oc_product_description.product_id = oc_product.product_id ";
        if(!$checkCompletedProd = mysqli_query($con,$getCompletedProdQry)){
          mysqli_close($con);
          mysqli_error($con);
          die("");
        }    
        ?>
      <div class="card-panel hoverable col s12 m12 l12" >
       <table  class=" responsive-table bordered highlight centered"  >
            <thead>
              <tr>
                <th data-field="id">Order ID</th>
                <th data-field="pid">Product ID</th>
                <th data-field="pname">Product Name</th>
                <th data-field="Model">Model</th>
                <th data-field="Quantity" >Quantity</th>
                <th data-field="Price">Price</th>
                <th data-field="Status">Status</th>
              </tr>
            </thead>
            <tbody> 
              <?php
              while($getCompArry = mysqli_fetch_assoc($checkCompletedProd)){
                $getCompProd = "SELECT * FROM `oc_order_product`,`oc_order_history` WHERE  oc_order_product.product_id = '".$getCompArry['product_id']."' AND oc_order_product.order_id = oc_order_history.order_id AND oc_order_history.order_status_id = 5  ";
                if(!$checkCompProd = mysqli_query($con,$getCompProd)){
                  mysqli_close($con);
                  mysqli_error($con);
                  die("");
                }
                while($getCompData = mysqli_fetch_assoc($checkCompProd)){
                  $checkCompRetData = "SELECT * FROM `oc_return` WHERE `order_id` = '".$getCompData['order_id']."'";
                  $resultComp = mysqli_query($con,$checkCompRetData);
                  if(mysqli_num_rows($resultComp) == 0){
                   ?>
                   <tr>
                    <td><?=$getCompData['order_id']?></td>
                    <td><?=$getCompData['product_id']?></td>
                    <td><?=$getCompData['name']?></td>
                    <td><?=$getCompData['model']?></td>
                    <td><?=$getCompData['quantity']?></td>
                    <td><?=$getCompData['price']?></td>
                    <td>Completed</td>
                  </tr>
                  <?php } } } ?>
                </tbody>
              </table>
      </div>
    </div><!-- Order Completed -->



    <div class="col s12 m12 l10" id="dashboard_cont">
      <!-- DASHBOARD card title -->
      <div class="row">
        <div class="col s12 m12 l12 ">
          <div class="card-panel  hoverable ">
            <span class="dashboard "><h5 class="center-align">DASHBOARD</h5>
            </span>
            <ul type="disc" >
              <li><b>Company name :</b> <?=$getSellerDetails['company_name']?></li><br>
              <li><b>Email :</b> <?=$getSellerDetails['email']?> </li><br>
              <li><b>Moblie No :</b> <?=$getSellerDetails['mobile_no']?> </li><br>
              <li><b>VAT/TIN No :</b> <?=$getSellerDetails['vattin_no']?> </li><br>
              <li><b>Pan No :</b> <?=$getSellerDetails['pan_no']?> </li>

            </ul>
          </div>
        </div>
      </div>
      <!-- Dashboard end -->
      <div class="row">
        <div class="col s12 m12 l6">
          <div class="card-panel hoverable  ">
            <?php
            $getTotalSales = "SELECT * FROM `oc_product` WHERE seller_id = '".$_SESSION['seller_id']."' AND `status` = '1'  ";
            if(!$checkTotalSales = mysqli_query($con,$getTotalSales)){
              mysqli_error($con);
              mysqli_close($con);
              die("");
            }
            $sum = 0;
            while ($getTotalData = mysqli_fetch_assoc($checkTotalSales)) {

              $sum = $sum + $getTotalData['price'];
            }

            ?>
            <span class="saleschart "><h5 class="center-align">Total Sales</h5>
            </span>
            <h4 class="center-align">Rs.<?=$sum?>/-</h4>
          </div>
        </div>
        <div class="col s12 m12 l6">
          <div class="card-panel hoverable ">
            <?php
            $totalProducts = "";
            while($getProdForTotal = mysqli_fetch_assoc($checkListProdQry)){

              $ProdQry = "SELECT * FROM `oc_product_description` WHERE `product_id` = '".$getProdForTotal['product_id']."'";
              if(!$checkProdQry = mysqli_query($con,$ProdQry)){
                mysqli_error();
                mysqli_close();
                die("");
              }
              $totalProducts = $totalProducts + mysqli_num_rows($checkProdQry); 
            }
            ?>
            <span class="saleschart "><h5 class="center-align">Total Products</h5>
            </span>
            <h4 class="center-align"> <?=$totalProducts?></h4>
          </div>
        </div>
        <div class="col s12 m12 l6">
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ">
          <div class="card-panel hoverable ">
            <?php
            $getPendingOrdQry = "SELECT * FROM `oc_product`,`oc_product_description` WHERE oc_product.seller_id = '".$_SESSION['seller_id']."' AND oc_product_description.product_id = oc_product.product_id  ";
            if(!$checkPendingOrderQry = mysqli_query($con,$getPendingOrdQry)){
              mysqli_close($con);
              mysqli_error($con);
              die("");
            }  
            ?>
            <span class="saleschart "><h5 class="center-align" id="order_pending_dash">ORDER PENDING</h5>
            </span>
            <table  class="responsive-table bordered highlight centered "  >
              <thead>
                <tr>
                  <th data-field="id">Order ID</th>
                  <th data-field="pid">Product ID</th>
                  <th data-field="pname">Product Name</th>
                  <th data-field="Model">Model</th>
                  <th data-field="Quantity" >Quantity</th>
                  <th data-field="Price">Price</th>
                  <th data-field="Status">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while($getArrayData = mysqli_fetch_assoc($checkPendingOrderQry)){
                  $getPendingData = "SELECT * FROM `oc_order_product`,`oc_order_history` WHERE  oc_order_product.product_id = '".$getArrayData['product_id']."' AND oc_order_product.order_id = oc_order_history.order_id AND oc_order_history.order_status_id = 1  LIMIT 2 ";
                  if(!$checkPendingDataQry = mysqli_query($con,$getPendingData)){
                    mysqli_close($con);
                    mysqli_error($con);
                    die("");
                  }
                  while($getPendingArray = mysqli_fetch_assoc($checkPendingDataQry)){
                   $checkRetOrderDashQry = "SELECT * FROM `oc_return` WHERE `order_id` = '".$getPendingArray['order_id']."'";
                   $resultCheckDash = mysqli_query($con,$checkRetOrderDashQry);
                   if(mysqli_num_rows($resultCheckDash) == 0){
                    ?>
                    <tr>
                     <td><?=$getPendingArray['order_id']?></td>
                     <td><?=$getPendingArray['product_id']?></td>
                     <td><?=$getPendingArray['name']?></td>
                     <td><?=$getPendingArray['model']?></td>
                     <td><?=$getPendingArray['quantity']?></td>
                     <td><?=$getPendingArray['price']?></td>
                     <td>Pending</td>
                   </tr>
                   <?php     
                 } }
               } ?>
             </tbody>
           </table>
         </div>
       </div>
       <div class="col s12 m12 l12" id="order_complete_cont">
        <div class="card-panel hoverable ">
          <?php
          $getProdHistDash = "SELECT * FROM `oc_product`,`oc_product_description` WHERE oc_product.seller_id = '".$_SESSION['seller_id']."' AND oc_product_description.product_id = oc_product.product_id  ";
          if(!$checkGetProdHistDash = mysqli_query($con,$getProdHistDash)){
            mysqli_close($con);
            mysqli_error($con);
            die("");
          }    
          ?>
          <span class="saleschart "><h5 class="center-align" id="order_history_dash">ORDER HISTORY</h5>
          </span>
          <table class=" responsive-table bordered highlight centered  "  >
            <thead>
              <tr>
                <th data-field="order_id">Order ID</th>
                <th data-field="product_id">Product ID</th>
                <th data-field="Name">Name</th>
                <th data-field="Model ">Model</th>
                <th data-field="price">Price(Rs.)</th>
                <th data-field="Status" >Status</th>
              </tr>
            </thead>
            <tbody>
             <?php
             while($getHistArryDash = mysqli_fetch_assoc($checkGetProdHistDash)){
              $getNewOrderHistDash = "SELECT * FROM `oc_order_product`,`oc_order_history` WHERE  oc_order_product.product_id = '".$getHistArryDash['product_id']."' AND oc_order_product.order_id = oc_order_history.order_id AND oc_order_history.order_status_id != 1 LIMIT  1";
              if(!$checkNewOrderHistDash = mysqli_query($con,$getNewOrderHistDash)){
                mysqli_close($con);
                mysqli_error($con);
                die("");
              }
              while($getHistOrderDataDash = mysqli_fetch_assoc($checkNewOrderHistDash)){
               ?>
               <tr>
                <td><?=$getHistOrderDataDash['order_id']?></td>
                <td><?=$getHistOrderDataDash['product_id']?></td>
                <td><?=$getHistOrderDataDash['name']?></td>
                <td><?=$getHistOrderDataDash['model']?></td>
                <td><?=$getHistOrderDataDash['price']?></td>
                <?php switch ($getHistOrderDataDash['order_status_id']) {
                  case '2':
                  ?>
                  <td>Processing</td>
                  <?php  break;
                  case '3':
                  echo "<td>Shipped</td>";
                  break;

                  default:
                  echo "<td>Shipped</td>";
                  break;
                } ?>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col s12 m12 l10" id = "returns_cont">
    <?php 
    $getRetProd = "SELECT * FROM `oc_product`,`oc_product_description` WHERE oc_product.seller_id = '".$_SESSION['seller_id']."' AND oc_product_description.product_id = oc_product.product_id ";
    if(!$checkRetProd = mysqli_query($con,$getRetProd)){
      mysqli_close($con);
      mysqli_error($con);
      die("");
    }    
    ?>
    <div class="card-panel hoverable">
     <table class="responsive-table bordered highlight centered">
      <thead>
        <tr>
          <th data-field="order_id">Order ID</th>
          <th data-field="cust_id">Customer ID</th>
          <th data-field="prod_id">Product ID</th>
          <th data-field="fname">FName</th>
          <th data-field="lname">Lname</th>
          <th data-field="telephone">Telephone</th>
          <th data-field="prod_name">Prod Name</th>
          <th data-field="date_ord">Date Ordered</th>
        </tr>
      </thead>
      <tbody>
        <?php   while($getReturnData = mysqli_fetch_assoc($checkRetProd)){
          $getOrderRet = "SELECT * FROM `oc_order_product` WHERE `product_id` = '".$getReturnData['product_id']."'  ";
          if(!$checkOrderRet = mysqli_query($con,$getOrderRet)){
            mysqli_close($con);
            mysqli_error($con);
            die("");
          } 
          while($getOrderRetData = mysqli_fetch_assoc($checkOrderRet)){
            $getRetQry = "SELECT * FROM `oc_return` WHERE `order_id` = '".$getOrderRetData['order_id']."' ";
            if(!$checkRetQry = mysqli_query($con,$getRetQry)){
              mysqli_close($con);
              mysqli_error($con);
              die("");
            }
            while($getReturns = mysqli_fetch_assoc($checkRetQry)){
             ?>
             <tr>
              <td><?=$getReturns['order_id']?></td>
              <td><?=$getReturns['customer_id']?></td>
              <td><?=$getOrderRetData['product_id']?></td>
              <td><?=$getReturns['firstname']?></td>
              <td><?=$getReturns['lastname']?></td>
              <td><?=$getReturns['telephone']?></td>
              <td><?=$getReturns['product']?></td>
              <td><?=$getReturns['date_ordered']?></td>
            </tr>
            <?php } } } ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col s12 m12 l10" id="already_listed_cont">
      <div class="card-panel hoverable ">
       <a class="right-align" style="color: #1F1A17;" id="delete-prod" href="#"><i class="material-icons">delete</i>Delete</a>
       <a class="right-align" style="color: #1F1A17;" id="edit-prod" href="#"><i class="material-icons">mode_edit</i>Edit</a>
       <a class="right-align" style="color: #1F1A17;" id="save-prod" href="#"><i class="material-icons">lock</i>Save</a>
       <table class="responsive-table bordered highlight centered ">
        <thead >
          <tr >
            <th data-field="checkbox">Select</th>
            <th data-field="image">Image</th>
            <th data-field="id">Prod_ID</th>
            <th data-field="name">Name</th>
            <th data-field="Color">Model</th>
            <th data-field="Price">Price</th>
            <th data-field="Quantity">Quantity</th>
            <th data-field="status">Status</th>
            <th data-field="viewed">Viewed</th>
            <th data-field="stock_status">Stock Status</th>
          </tr>
        </thead>
        <tbody>
          <?php  while(($getProducts = mysqli_fetch_assoc($getCheckProducts))) { 
            $getMatchProdDes = "SELECT * FROM `oc_product_description` WHERE `product_id` = '".$getProducts['product_id']."'  ";
            if(!$getProdDesMatched = mysqli_query($con,$getMatchProdDes)){
              mysqli_close($con);
              mysqli_error($con);
              die("");
            }
            $getProdDesMatchedData = mysqli_fetch_assoc($getProdDesMatched);
            $desProdId = $getProdDesMatchedData['product_id'];
            ?>
            <?php  if($getProducts['product_id'] == $desProdId) {?>
              <tr> 
                <td ><input type="checkbox" name="checkbox[]"  class="filled-in checkdata" id="<?=$getProducts['product_id']?>" value="<?=$getProducts['product_id']?>" /><label for="<?=$getProducts['product_id']?>"></label></td>
                <td> <img src="../image/<?=$getProducts['image']?>" alt=" No Image " class=" circle" style="    height: 60px;
                  width: 60px;"></td>
                  <td ><?=$getProducts['product_id']?></td>
                  <td id="<?='name:'.$getProducts['product_id']?>" contenteditable="true"><?=$getProdDesMatchedData['name']?></td>
                  <td id="<?='model:'.$getProducts['product_id']?>" contenteditable="true"><?=$getProducts['model']?></td>
                  <td id="<?='price:'.$getProducts['product_id']?>" contenteditable="true"><?=$getProducts['price']?></td>
                  <td id="<?='quantity:'.$getProducts['product_id']?>" contenteditable="true"><?=$getProducts['quantity']?></td>
                  <?php if($getProducts['status'] == 1){ ?>
                    <td>Available</td>
                    <?php }else{ ?>
                      <td>Unavailable</td>
                      <?php } ?>
                      <td><?=$getProducts['viewed']?></td>
                      <td><?=$getProducts['stock_status_id']?></td>
                      <?php } ?>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col s12 m12 l10" id="upload_prod_cont" ><!-- Main COnt start -->
              <div class="card-panel col s12 m12 l12 ">
                <h5 class="center-align">Upload Products</h5>
                <div class="card-panel col s12 m12 l12 hoverable" style="  border: solid 1px;"><!-- Apparelas Cont -->
                 <div class="row">
                   <form action="upload-excel.php" method="post" enctype="multipart/form-data">
                     <h5>Upload Product</h5>
                     <select name='excelfile' class="col s12 m12 l4">
                       <option value="" disabled selected>Choose File Format</option>
                       <option value="1">Elegends File Format</option>
                       <option value="2">Magento File Format</option>
                       <option value="3">Row File Format</option>
                     </select>
                     <div class="file-field input-field col s12 m12 l4">
                      <div class="btn">
                        <span>Find</span>
                        <input type="file" name="excel-upload" required>
                      </div>
                      <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                      </div>
                    </div><button class="btn waves-effect waves-light" type="submit" name="excel-submit">Submit
                    <i class="material-icons right">send</i>
                  </button>
                </form>
              </div> 
            </div>  

            <div class="card-panel col s12 m12 l12">
              <ul>
                <li>If you don't know how to upload products click <a href="help.php">here</a></li>
              </ul>
              <table class="responsive-table  highlight  ">
                <thead>
                  <tr>
                    <td>Product Categories</td>
                    <td>Category ID</td>
                    <td>Sub Category</td>
                    <td>ID</td>
                    <td>Sub Category</td>
                    <td> ID</td>
                    <td>Sub Category</td>
                    <td> ID</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Apparelas</td>
                    <td>25</td>
                    <td>Women</td>
                    <td>28</td>
                    <td>Men</td>
                    <td>29</td>
                    <td>Kids</td>
                    <td>30</td>
                  </tr>
                  <tr>
                    <td>Accessories</td>
                    <td>20</td>
                    <td>Women</td>
                    <td>26</td>
                    <td>Men</td>
                    <td>27</td>
                  </tr>
                  <tr>
                    <td>Jewellry</td>
                    <td>18</td>
                  </tr>
                  <tr>
                    <td>Bags & Luggage</td>
                    <td>34</td>
                    <td>Back Pack</td>
                    <td>67</td>
                  </tr>
                  <tr>
                    <td>Electronic Accessories</td>
                    <td>24</td>
                  </tr>
                  <tr>
                    <td>Shoes</td>
                    <td>17</td>
                    <td>Women</td>
                    <td>61</td>
                    <td>Men</td>
                    <td>60</td>
                    <td>Kids</td>
                    <td>62</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div> 
        </div>
        <div class=" col s12 m12 l10" id="order_history_cont">
         <?php
         $getProdHist = "SELECT * FROM `oc_product`,`oc_product_description` WHERE oc_product.seller_id = '".$_SESSION['seller_id']."' AND oc_product_description.product_id = oc_product.product_id  ";
         if(!$checkGetProdHist = mysqli_query($con,$getProdHist)){
          mysqli_close($con);
          mysqli_error($con);
          die("");
        }    
        ?>
        <div class="card-panel hoverable">
          <span class="saleschart "><h5 class="center-align">ORDER HISTORY</h5>
          </span>
          <table class="responsive-table bordered highlight centered "  >
            <thead>
              <tr>
                <th data-field="order_id">Order ID</th>
                <th data-field="product_id">Product ID</th>
                <th data-field="Name">Name</th>
                <th data-field="Model ">Model</th>
                <th data-field="price">Price(Rs.)</th>
                <th data-field="Status" >Status</th>
              </tr>
            </thead>
            <tbody>
             <?php
             while($getHistArry = mysqli_fetch_assoc($checkGetProdHist)){
              $getNewOrderHist = "SELECT * FROM `oc_order_product`,`oc_order_history` WHERE  oc_order_product.product_id = '".$getHistArry['product_id']."' AND oc_order_product.order_id = oc_order_history.order_id AND oc_order_history.order_status_id != 1 AND oc_order_history.order_status_id !=5 ORDER BY oc_order_product.order_id DESC ";
              if(!$checkNewOrderHist = mysqli_query($con,$getNewOrderHist)){
                mysqli_close($con);
                mysqli_error($con);
                die("");
              }
              while($getHistOrderData = mysqli_fetch_assoc($checkNewOrderHist)){
               ?>
               <tr>
                <td><?=$getHistOrderData['order_id']?></td>
                <td><?=$getHistOrderData['product_id']?></td>
                <td><?=$getHistOrderData['name']?></td>
                <td><?=$getHistOrderData['model']?></td>
                <td><?=$getHistOrderData['price']?></td>
                <?php switch ($getHistOrderData['order_status_id']) {
                  case '2':
                  ?>
                  <td>Processing</td>
                  <?php  break;
                  case '3':
                  echo "<td>Shipped</td>";
                  break;
                  case '5':
                  echo "<td>Complete</td>";
                  break;
                  case '7':
                  echo "<td>Canceled</td>";
                  break;
                  case '8':
                  echo "<td>Denied</td>";
                  break;
                  case '9':
                  echo "<td>Canceled Reversal</td>";
                  break;
                  case '10':
                  echo "<td>Failed</td>";
                  break;
                  case '11':
                  echo "<td>Refunded</td>";
                  break;
                  case '12':
                  echo "<td>Reversed</td>";
                  break;
                  case '13':
                  echo "<td>ChargeBack</td>";
                  break;
                  case '14':
                  echo "<td>Expired</td>";
                  break;
                  case '15':
                  echo "<td>Processed</td>";
                  break;
                  case '16':
                  echo "<td>Voided</td>";
                  break;
                  default:
                  echo "<td>Shipped</td>";
                  break;
                } ?> 
                <td><select name="forma" onchange="location = this.value;">
                  <option value="" selected disabled>Change Status</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=1">Pending</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=2">Processing</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=3">Shipped</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=5">Complete</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=7">Canceled</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=8">Denied</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=9">Canceled Reversal</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=10">Failed</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=11">Refunded</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=12">Reversed</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=13">ChargeBack</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=14">Expired</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=15">Processed</option>
                  <option value="php/scripts/changeShipStatus.php?orderID=<?=$getHistOrderData['order_id']?>&newID=16">Voided</option>
                </select>
              </tr>
              <?php } } ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col s12 112 l10" id="upload_images_cont">
        <div class="card-panel hoverable col s12 m12 l12">
          <h5>Upload Images</h5>
          <form action="image-upload.php" method="post" enctype="multipart/form-data">
            <div class="file-field input-field">
              <div class="btn" id="img-file-div">
                <span>Upload Images</span>
                <input type="file" id="img-file" name="img-file[]" multiple required>
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload images">
              </div>
            </div>
            <button class="btn waves-effect waves-light" id="img_submit" type="submit" name="img_submit">Submit
              <i class="material-icons right">send</i>
            </button>
          </form>
        </div>
        <div class="card-panel hoverable col s12 m12 l12">
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
        </div>
      </div>
      <div class="col s12 m12 l10 " id="new_order_cont">
        <?php
        $getNewOrdQry = "SELECT * FROM `oc_product`,`oc_product_description` WHERE oc_product.seller_id = '".$_SESSION['seller_id']."' AND  oc_product_description.product_id = oc_product.product_id ";
        if(!$getCheckNewOrdQry = mysqli_query($con,$getNewOrdQry)){
          mysqli_close($con);
          mysqli_error($con);
          die("");
        }    
        ?>
        <div class="card-panel hoverable ">
          <span class="saleschart "><h5 class="center-align">New Orders</h5>
          </span>
          <table  class=" responsive-table bordered highlight centered"  >
            <thead>
              <tr>
                <th data-field="id">Order ID</th>
                <th data-field="pid">Product ID</th>
                <th data-field="pname">Product Name</th>
                <th data-field="Model">Model</th>
                <th data-field="Quantity" >Quantity</th>
                <th data-field="Price">Price</th>
                <th data-field="Status">Status</th>
              </tr>
            </thead>
            <tbody> 
              <?php
              while($getArry = mysqli_fetch_assoc($getCheckNewOrdQry)){
                $getNewOrder = "SELECT * FROM `oc_order_product`,`oc_order_history` WHERE  oc_order_product.product_id = '".$getArry['product_id']."' AND oc_order_product.order_id = oc_order_history.order_id AND oc_order_history.order_status_id = 1  ";
                if(!$checkNewOrder = mysqli_query($con,$getNewOrder)){
                  mysqli_close($con);
                  mysqli_error($con);
                  die("");
                }
                while($getOrderData = mysqli_fetch_assoc($checkNewOrder)){
                  $checkRetOrderQry = "SELECT * FROM `oc_return` WHERE `order_id` = '".$getOrderData['order_id']."'";
                  $resultCheck = mysqli_query($con,$checkRetOrderQry);
                  if(mysqli_num_rows($resultCheck) == 0){
                   ?>
                   <tr>
                    <td><?=$getOrderData['order_id']?></td>
                    <td><?=$getOrderData['product_id']?></td>
                    <td><?=$getOrderData['name']?></td>
                    <td><?=$getOrderData['model']?></td>
                    <td><?=$getOrderData['quantity']?></td>
                    <td><?=$getOrderData['price']?></td>
                    <td><button class="btn waves-effect waves-light mybtn" id="shipBtn" type="submit" value="<?=$getOrderData['order_id']?>" name="action"><span id="<?=$getOrderData['order_id']?>">Pending</span>
                    </button></td>
                  </tr>
                  <?php } } } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Fotter Start -->
        <?php include "php/pages/footer.php" ?>
        <!-- End footer -->
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/jquery.tabledit.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="js/dashboard.js"></script>
      </body>
      </html>
