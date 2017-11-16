<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
    <?php 
		include 'header.php'; 
		$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
        $paypalID = 'merchant_mum@gmail.com'; //Business Email
	?>
    <div class="container-fluid">

      <div class="row">
	  <br/>
	  <br/>
	  <br/>
      <?php
        if(isset($_GET['product']) && $_GET['product']!=''){
          $sql = "SELECT * FROM products where product_id=".$_GET['product'];
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
      ?>
              <div class="row featurette">
                <div class="col-md-7 col-md-push-5">
                  <h2 class="featurette-heading"><?php echo $row['product_title']; ?> -
                  <span class="text-muted">$<?php echo $row['price']; ?></span></h2><br/>
                  <samp class="lead">Description:</samp><br/>
                  <p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['product_description']; ?></p><br/>
				  <samp class="lead">Contact:</samp>
				  <span class="text-muted"><?php echo $row['contact_details']; ?></span>
                </div>
                <div class="col-md-3 col-md-pull-6">
                  <img class="featurette-image img-responsive center-block" alt="500x500" src=<?php echo 'img/'.$row['image']; ?> data-holder-rendered="true">
                </div>
              </div>
			  <?php if($row['contact_seller'] != ''){ ?>
				<div class="featurette text-center">
					<span class='text-danger'>* This Seller will not accept online payment. Please contact seller.<br/></span>
				</div>
				  <!--<div id="addtocart">
				<input type="submit" id="btn" value="Please contact Seller" disabled="disabled">
				</div>-->
			  <?php } else { ?>
				  <div id="addtocart">
					<a href=<?php echo "actions/addToCart.php?type=add_to_cart&product_id=".$row['product_id']; ?>><input type="button" value="Add To cart" id="btnBuyNow"></a>
					<a href="<?php echo 'actions/addToCart.php?type=buy_now&product_id='.$row['product_id'];?>"><input type="button" value="Buy Now" id="AddTocart"></a>
				  </div>
		  <?php
			  }
            }
          } else {
          ?>
          <div class="alert alert-info">
            Product Not Available.
          </div>  
          <?php
          }
        } else{
      ?>
        <div class="alert alert-info">
          Product Not Available.
        </div>
      <?php
        }
      ?>    
    </div>
    <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
</body>
