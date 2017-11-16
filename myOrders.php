<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php  include 'header.php'; ?>
    <div class="container-fluid">
        <h2>My Orders</h2>
            <div class="row  col-md-offset-1">
                <?php
                $userId = $_SESSION['user_id'];
                $totalCost = 0;
                $sql = "SELECT C.cart_id, P.* FROM cart C JOIN products P ON C.product_id = P.product_id where P.status = 1 AND C.paid = 1 AND C.user_id=".$userId;
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $productsId = '';
                    $productsTitle = '';
                    while($row = $result->fetch_assoc()) {
                        ?>
                        <div class="col-sm-5 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll; margin: 10px;">
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
                    }
                }
			
                   ?>
            </div>
        </div>
       <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>

    </body>

    <script>
        $(".alert").alert()
    </script>
