<?php
	error_reporting(0);
    include 'db.php';
    $cartItemCount = 0;
    if(!isset($_SESSION['email'])){
        $cartItemCount = 0;
    }else{
        $sql = "SELECT * FROM cart WHERE paid = 0 AND user_id=".$_SESSION['user_id'];
        $result = $conn->query($sql);
        $cartItemCount = $result->num_rows;
    }
?>

<header>
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> MU Market Place </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <!-- <li><a href="PostAdd.Html">Sell</a></li> -->
                    <li><a href="RequestProduct.php">Request</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <!-- <li id="liLogin"><a href="EditProfile.Html">Profile</a></li> -->
                    <?php if(isset($_SESSION['email']) && $_SESSION['email'] != ''){ ?>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle " id="ahrefLogin"
                             data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false"> <b class=" icon-angle-down"></b>
                             <span class="glyphicon glyphicon-user" aria-hidden="true"></span> &nbsp;
                             <?php echo $_SESSION['first_name']?>
                             <span class="caret"></span>
                         </a>
                        <ul class="dropdown-menu"  id="ListLogin">
                            <li id="liLogin"><a href="EditProfile.php">My Profile</a></li>
                            <li id="liLogin"><a href="myAds.php">My Ads</a></li>
                            <li id="liLogin"><a href="myOrders.php">My Orders</a></li>
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
                            <li id="liLogin"><a href="adminPostAds.php">Post Ads</a></li>
                            <li id="liLogin"><a href="adminRequestAds.php">Request Ads</a></li>
                            <?php } ?>
                            <li id="liLogin"><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                    <?php }else{ ?>
                    <li id="liLogin"><a href="Login.php">Login</a></li>
                    <?php }?>

                    <?php if(isset($_SESSION['email']) && $_SESSION['email'] != ''){ ?>
                    <li><a href="Cart.php"><i class="fa fa-shopping-cart"  style="color:#fff;font-size:34px;"aria-hidden="true"></i><?php echo ($cartItemCount>0)? '('.$cartItemCount.')':''; ?></a></li>
                    <?php } ?>
                </ul>
                </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
<?php
    if(isset($_SESSION["session_msg"]) && $_SESSION["session_msg"] !='') {
        $type = isset($_SESSION['type']) ? $_SESSION['type'] : 'info';
?>
        <br>
        <div class=<?php echo "'alert alert-".$type."'";?> >
          <span class='text-center'> <?php echo $_SESSION['session_msg']; ?> </span>
        </div>
<?php
        $_SESSION["type"] = '';
        $_SESSION["session_msg"]='';
    }
?>
