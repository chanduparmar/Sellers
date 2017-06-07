<?php
session_start();
require_once "php/seller.php";
$seller = new Seller();
$sellerInfo = $seller->getSellerInfo();
$totalSeller = count($sellerInfo);
$fileInfo = $seller->getSellerFiles();
$totalFiles = count($fileInfo);
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
	<link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body  style="background-color:#1F1A17;" >
	<nav>
		<div class="nav-wrapper card-color">
			<a href="index.php">  <img class="responsive-img" src="../images/logo2.png" style="max-width: 65px;
				max-height: 56px;
				margin-bottom: 8px;"></a>
				<a href="#" data-activates="mobile-demo" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
				<!-- <p class="center-align">Sell On  Elegends</p> -->
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<?php if(isset($_SESSION['username'])){ ?>
						<li><?php echo "".$_SESSION['username']; ?></li>

						<li><a href="php/logout.php">Logout</a></li>
						<?php } else {  echo "<script>alert('Login please!');</script>";
						echo "<script>window.location='index.php'</script>"; }?>
					</ul><div class="row">
					<ul class="side-nav hide-on-large-only" id="mobile-demo" style="   min-height: 30em; " >
						<?php if(isset($_SESSION['username'])){ ?>
							<li class="li-color"><a id="dashboard">Dashboard</a></li>
							<li class="li-color"><a id="seller">Sellers</a></li>
							<li class="li-color"><a  id="upload_product">Upload Product</a></li>
							<li class="li-color"><a  id="upload_images">Upload Images</a></li>
							<li class="li-color"><a  id="seller_upload">Upload Images</a></li>
							<li class="li-color"><a href="php/logout.php">Logout</a></li>
						</div>
						<?php }else{ ?>
							<li><a href="#modal1" class="modal-trigger">Login</a></li>
							<?php } ?>
						</ul>
					</div>
				</nav>

				<div class="row col s12 m12 l12">
					<div class="col s12 m12 l2 side-nav fixed hide-on-med-and-down" >
						<ul >
							<li ><a id="dashboard_nav">Dashboard</a></li>
							<li ><a id="seller_nav">Sellers</a></li>
							<li ><a id="upload_product_nav" >Upload Product</a></li>
							<li ><a id="upload_images_nav" >Upload Images</a></li>
							<li ><a id="seller_upload_nav" >Seller's Uploaded Files</a></li>

						</ul>
					</div>


   <!--  <div class="dashboard_cont">
    	<div class="card-panel ">
    		
    	</div>
    </div> -->
    <div class="col s12 m12 l10" id="dashboard_cont">
    	<div class="card-panel col s12 m12 l12">
    	<h5 class="center-align">Welcome <?=$_SESSION['username']?> </h5>
    	<div class="card-panel hoverable col s12 m12 l6">
    	<div class="card-content center-align">
    		<h3>Total Sellers</h3>
    		<h4><?=$totalSeller?></h4>
    		</div>
    	</div>
    	<div class="card-panel hoverable col s12 m12 l6">
    	<div class="card-content center-align">
    		<h3>Total Pending Files</h3>
    		<h4><?=$totalFiles?></h4>
    		</div>
    	</div>
    	</div>
    </div>
    <div class="col s12 m12 l10 "  id="upload_prod_cont"  style="  border: solid 1px;">
    	<div class="card-panel hoverable col s12 m12 l12">
  
                    <form action="../upload-product-admin.php" method="post" enctype="multipart/form-data">
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
    <div class="col s12 m12 l10" id="upload_images_cont">
    	<div class="card-panel col s12 m12 l12">
    	 <h5>Upload Images</h5>
          <form action="../image-upload.php" method="post" enctype="multipart/form-data">
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
    </div>
    <div class="col s12 m12 l10" id="seller_upload_cont">
    	<div class="card-panel col s12 m12 l12">
    		<table class="responsive-table bordered highlight centered ">
    			<thead>
    				<tr>

    					<th>Seller ID</th>
    					<th>File Name</th>
    					<th>Status</th>
    					<th>Date Added</th>
    					<th>File Format</th>
    					<th>Approve</th>
    					<th>Reject</th>
    				</tr>
    			</thead>
    			<tbody>
    				<?php foreach ($fileInfo as $fileKey => $fileVal) {	?>
    					<tr>
    						<td><?=$fileVal['seller_id']?></td>
    						<td><?=$fileVal['file_name']?></td>
    					<?php	if($fileVal['status'] == 0 ){?>
    							<td>Pending</td>
    						<?php } ?>
    						<td><?=$fileVal['date_added']?></td>
    						<?php $formatName = $seller->getFileFormatName($fileVal['file_format_id']); ?>
    						<td><?=$formatName['format_name']?></td>
    						<td>  <a class="btn waves-effect waves-light" href="../upload-product-excel.php?fileid=<?=$fileVal['id']?>&formatid=<?=$fileVal['file_format_id']?>&filepath=<?=$fileVal['path']?>&sellerid=<?=$fileVal['seller_id']?>" name="approve">Accept
    <i class="material-icons right">send</i>
  </a></td>
  <td>  <a class="btn waves-effect waves-light" href="deleteFile.php?fileId=<?=$fileVal['id']?>" name="approve">Reject
    <i class="material-icons right">send</i>
  </a></td>
    					</tr>
    					<?php } ?>
    				</tbody>
    			</table>
    	</div>
    </div>

    
    <div class="col s12 m12 l10 " id="sellers_cont"> 
    	<div class="card-panel col s12 m12 l12">
    		<table>
    			<thead>
    				<tr>

    					<th>Seller ID</th>
    					<th>Company Name</th>
    					<th>Email</th>
    					<th>Mobile No</th>
    					<th>Pickup Pincode</th>
    					<th>Pan No</th>
    					<th>VAT/TIN No</th>
    					<th>More Info</th>
    					
    				</tr>
    			</thead>
    			<tbody>
    				<?php foreach ($sellerInfo as $key => $value) {	?>
    					<tr>
    						<td><?=$value['id']?></td>
    						<td><?=$value['company_name']?></td>
    						<td><?=$value['email']?></td>
    						<td><?=$value['mobile_no']?></td>
    						<td><?=$value['pickup_pincode']?></td>
    						<td><?=$value['pan_no']?></td>
    						<td><?=$value['vattin_no']?></td>
    						<td><a href="php/showInfo.php?sellerEmail=<?=$value['email']?>&sellerId=<?=$value['id']?>">Get access</a></td>
    					</tr>
    					<?php } ?>
    				</tbody>
    			</table>
    		</div>
    	</div>


    	<!-- Fotter Start -->
    	<?php/* include "../php/pages/footer.php"*/ ?>
    	<!-- End footer -->
    	<!--Import jQuery before materialize.js-->
    	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    	<script type="text/javascript" src="js/materialize.min.js"></script>
    	<script type="text/javascript" src="../js/jquery.tabledit.min.js"></script>
    	<script type="text/javascript">
    	$('document').ready(function(){
    		$(".button-collapse").sideNav();

    		$("#sellers_cont").hide();
    		$("#upload_images_cont").hide();
    		$("#upload_prod_cont").hide();
    		
    		$("#seller_upload_cont").hide();

    		$('#seller,#seller_nav').click(function(){
    			$('#dashboard_cont,#upload_images_cont,#seller_upload_cont,#upload_prod_cont').hide();
    			$('#sellers_cont').show();
    		});
    		$('#upload_images,#upload_images_nav').click(function(){
    			$('#dashboard_cont,#sellers_cont,#seller_upload_cont,#upload_prod_cont').hide();
    			$('#upload_images_cont').show();
    		});
    		$('#upload_product,#upload_product_nav').click(function(){
    			$('#dashboard_cont,#upload_images_cont,#seller_upload_cont,#sellers_cont').hide();
    			$('#upload_prod_cont').show();
    		});
    		$('#dashboard,#dashboard_nav').click(function(){
    			$('#sellers_cont,#upload_images_cont,#seller_upload_cont,#upload_prod_cont').hide();
    			$('#dashboard_cont').show();
    		});
    		$('#seller_upload,#seller_upload_nav').click(function(){
    			$('#dashboard_cont,#upload_images_cont,#sellers_cont,#upload_prod_cont').hide();
    			$('#seller_upload_cont').show();
    		});
    		   $('select').material_select();
    	});
    	</script>


    </body>
    </html>
