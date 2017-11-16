<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <h2>My Ads</h2>
        <div>
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#posted" aria-controls="posted" role="tab" data-toggle="tab">Posted Ads</a></li>
            <li role="presentation"><a href="#requested" aria-controls="requested" role="tab" data-toggle="tab">Requested Ads</a></li>
          </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="posted">
                <?php
                    $sql = "SELECT * FROM products WHERE user_id = ".$_SESSION['user_id'];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                        <div class="col-sm-5 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll; margin: 10px;">
                            <a href=<?php echo "actions/myAdsDelete.php?type=post_ad&product_id=".$row['product_id']; ?> class="btn btn-danger pull-right">
                            <span class="glyphicon glyphicon-remove"></span> Delete</a>
                            <div class="col-sm-6 pull-left">
                                <img class="featurette-image img-responsive col-sm-10" alt="500x500" src=<?php echo 'img/'.$row['image']; ?> data-holder-rendered="true">
                            </div>
                            <div class="col-sm-6">
                                <h3><?php echo $row['product_title']; ?></h3><br>
                                <p>$<?php echo $row['price']; ?></p><br>
                                <p>Contact: <b><?php echo $row['contact_details']; ?></b></p>
                            </div>
                                <p><?php echo $row['product_description']; ?></p><br>
                        </div>
                          <?php
                        }
                      } else{ ?>
                      <div class="alert alert-info">
                        <strong>Info!</strong> No Products Available.
                      </div>
                      <?php
                    }
                ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="requested">
                <?php
                    $sql = "SELECT * FROM request_product WHERE user_id = ".$_SESSION['user_id'];
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { ?>
                        <div class="col-sm-5 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll; margin: 10px;">
                            <a href=<?php echo "actions/myAdsDelete.php?type=req_ad&request_id=".$row['request_id']; ?> class="btn btn-danger pull-right">
                            <span class="glyphicon glyphicon-remove"></span> Delete</a>
                            <div class="col-sm-6 pull-left">
                                <img class="featurette-image img-responsive col-sm-10" alt="500x500" src=<?php echo 'img/'.$row['image']; ?> data-holder-rendered="true">
                            </div>
                            <div class="col-sm-6">
                                <h3><?php echo $row['product_title']; ?></h3><br>
                                <p>Contact: <b><?php echo $row['contact_details']; ?></b></p>
                            </div>
                        </div>
                        <?php
                        }
                      } else{ ?>
                      <div class="alert alert-info">
                        <strong>Info!</strong> No Products Available.
                      </div>
                      <?php
                    }
                ?>
            </div>
        </div>
        </div>
        </div>
        <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
    </body>
    <script>
        $(".alert").alert()
    </script>
