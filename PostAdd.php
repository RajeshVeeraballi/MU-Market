<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MU-University-Home</title>
    <!-- Bootstrap Core CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Custom css -->
    <link href="css/style.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        
        <div id="NewProduct">
            <fieldset>
                <form action="actions/postAdd.php" method="POST" enctype="multipart/form-data">
                    <h2>Sell Product</h2>
                    <br>
                    <label>Title</label>
                    <input type="text" id="txttitle" name='title'>
                    <label>Description</label>
                    <input type="text"  id="txtDescription" name='description'>
                    <label>Price</label>
                    <input type="text"  id="txtPrice" name='price'>
					<label id="lblDIsplayTxt" style="color:red;font-weight:300;font-size:16px">Note: Please don't add '$' symbol.</label>
                    <label>Attach Image</label>
                    <input type="file"  id="txtFile" style="margin-left:10%" name='product_image'>
                    <label>Seller's Email</label>
                    <input type="text"  id="txtContact" name='contact'>
                    <label>Mode of payment accepted :</label>
                    <label>Online</label>
                    <input type="radio"  id="chckOnline"  value="online_payment" name='payment_type'>
                    <label>Contact Seller</label>
                    <input type="radio"  id="chckContact"  value="contact_seller" name='payment_type'>
                    <br/><br/>
                    <div id="addtocart">
                        <input type="submit" id="btnBuyNow" value="Post" name='post_add'>
                        <a href="index.php"><input type="button" value="Cancel" id="AddTocart"></a>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
   <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
	<script>
    
	
    $(document).ready(function () {
		
		$("#lblDIsplayTxt").hide();
	$("#txtPrice").keypress(function (e) {
		
            $("#lblDIsplayTxt").show();
			
  
        });
	});

</script>
</body>


