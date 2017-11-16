<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php
        include 'header.php';
        $paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
        $paypalID = 'merchant_mum@gmail.com'; //Business Email
        //$paypalID = 'buyer_mum@gmail.com';
		if(!isset($_GET['cart_id']) && $_GET['cart_id'] == ''){
			header('Location: ../products.php');
			exit;
		}
	?>
    <div class="container-fluid">
        <h2>Buy Now</h2>
        <form action="<?php echo $paypalURL; ?>" method="post">
            <!-- Identify your business so that you can collect the payments. -->
            <input type="hidden" name="business" value="<?php echo $paypalID; ?>">

            <!-- Specify a Buy Now button. -->
            <input type="hidden" name="cmd" value="_xclick">
            <div class="row  col-md-offset-1">
                <?php
                $userId = $_SESSION['user_id'];
                $totalCost = 0;
                $sql = "SELECT C.cart_id, P.* FROM cart C JOIN products P ON C.product_id = P.product_id where P.status = 1 AND C.paid = 0 AND C.user_id=".$userId." AND C.cart_id=".$_GET['cart_id'];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $productsId = '';
                    $productsTitle = '';
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-sm-5 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll; margin: 10px;">
                            <a href=<?php echo "actions/removeFromCart.php?cart_id=".$row['cart_id']; ?> class="btn btn-link pull-right" style="color: red">
                                <span class="glyphicon glyphicon-remove"></span></a>
                                <div class="col-sm-6 pull-left">
                                    <img class="featurette-image img-responsive col-sm-10" alt="500x500" src=<?php echo 'img/'.$row['image']; ?> data-holder-rendered="true">
                                </div>
                                <div class="col-sm-6">
                                    <h3><?php echo $row['product_title']; ?></h3><br>
                                    <p>$<?php echo $row['price']; ?></p><br>
                                    <p>Contact: <b><?php echo $row['contact_details']; ?></b></p>
                                </div>
                            </div>
                            <!-- Specify details about the item that buyers will purchase. -->
                            <?php
                                if(isset($row['product_id'])){
                                    if($productsId != ''){
                                        $productsId = $productsId.',';
                                    }
                                    $productsId = $productsId.$row['product_id'];
                                }
                                if(isset($row['product_title'])){
                                    if($productsTitle != ''){
                                        $productsTitle = $productsTitle.',';
                                    }
                                    $productsTitle = $productsTitle.$row['product_title'];
                                }

                            ?>
                            <input type="hidden" name="item_name" value="<?php echo $productsTitle; ?>">
                            <input type="hidden" name="item_number" value="<?php echo $productsId; ?>">
                            <input type="hidden" name="currency_code" value="USD">
                            <!-- Specify URLs -->
                            <input type='hidden' name='cancel_return' value='http://waynemarcy.net.mocha3019.mochahost.com/MUM/Cart.php'>
                            <input type='hidden' name='return' value='http://waynemarcy.net.mocha3019.mochahost.com/MUM/actions/payment.php'>
                            <?php
                            $totalCost = $totalCost+$row['price'];
                        }
                    }
                    ?>
                    <input type="hidden" name="amount" value="<?php echo $totalCost; ?>">
                    <div class="col-sm-12">
                        <?php echo "<h3 class='col-md-offset-7'>Total Price: $".$totalCost."</h3>"; ?>
                    </div>
                </div>
                <span class="col-md-offset-1">
                    <?php if($totalCost){ ?>
                        <input type="submit" id="btn" value="Proceed To Checkout">
                    <?php }else{ ?>
                        <input type="submit" id="btn" value="Please add producs to cart" disabled="disabled">
                    <?php }?>
                </span><br/><br/>
            </form>
        </div>
        <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>

    </body>

    <script>
        $(".alert").alert()
    </script>
