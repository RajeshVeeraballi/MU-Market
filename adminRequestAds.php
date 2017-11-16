<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>

<body>
    <?php include 'header.php'; ?>
    <div class="container-fluid">
        <h2>Request Ads Moderation</h2>
        <div>
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#pending" aria-controls="pending" role="tab" data-toggle="tab">Pending Ads</a></li>
            <li role="presentation"><a href="#approved" aria-controls="approved" role="tab" data-toggle="tab">Approved Ads</a></li>
            <li role="presentation"><a href="#rejected" aria-controls="rejected" role="tab" data-toggle="tab">Rejected Ads</a></li>
          </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane" id="approved">
                    <?php
                        $sql = "SELECT * FROM request_product WHERE status = 1";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                            <div class="col-sm-5 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll; margin: 10px;">
                                <a href=<?php echo "actions/adsModeration.php?type=req_ad&status=2&request_id=".$row['request_id']; ?> class="btn btn-danger pull-right">
                                <span class="glyphicon glyphicon-remove"></span> Reject</a>
                                <div class="col-sm-6">
                                    <h3><?php echo $row['product_title']; ?></h3><br>
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
                <div role="tabpanel" class="tab-pane" id="rejected">
                    <?php
                        $sql = "SELECT * FROM request_product WHERE status = 2";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                            <div class="col-sm-5 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll; margin: 10px;">
                                <a href=<?php echo "actions/adsModeration.php?type=req_ad&status=1&request_id=".$row['request_id']; ?> class="btn btn-success pull-right" style='margin-right: 1%'>
                                <span class="glyphicon glyphicon-ok"></span> Approve</a>
                                <div class="col-sm-6 pull-left">
                                    <img class="featurette-image img-responsive col-sm-10" alt="500x500" src=<?php echo 'img/'.$row['image']; ?> data-holder-rendered="true">
                                </div>
                                <div class="col-sm-6">
                                    <h3><?php echo $row['product_title']; ?></h3><br>
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
                <div role="tabpanel" class="tab-pane active" id="pending">
                    <?php
                        $sql = "SELECT * FROM request_product WHERE status = 0";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { ?>
                            <div class="col-sm-5 well well-sm" style="min-height: 200px; max-height: 200px; overflow-y:scroll; margin: 10px;">
                                <a href=<?php echo "actions/adsModeration.php?type=req_ad&status=2&request_id=".$row['request_id']; ?> class="btn btn-danger pull-right">
                                <span class="glyphicon glyphicon-remove"></span> Reject</a>
                                <a href=<?php echo "actions/adsModeration.php?type=req_ad&status=1&request_id=".$row['request_id']; ?> class="btn btn-success pull-right" style='margin-right: 1%'>
                                <span class="glyphicon glyphicon-ok"></span> Approve</a>
                                <div class="col-sm-6 pull-left">
                                    <img class="featurette-image img-responsive col-sm-10" alt="500x500" src=<?php echo 'img/'.$row['image']; ?> data-holder-rendered="true">
                                </div>
                                <div class="col-sm-6">
                                    <h3><?php echo $row['product_title']; ?></h3><br>
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
