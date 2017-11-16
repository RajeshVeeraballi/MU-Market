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
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container">
        
        <div id="NewProduct">
			<fieldset>
                <form action="actions/requestProduct.php" method="POST">
    				<h2>Request For Product</h2>
        			<br>
    				<label>Title</label>
    				<input type="text" id="txtFirstname" name="title">
    				<label>Description</label>
    				<input type="text"  id="txtLastname" name="description">
    				<label>Requester Email</label>
    				<input type="text"  id="txtAddress" name="contact">
                    <input type="submit" id="btnLogin" value="Post" name='request_product'>
                </form>
			</fieldset>
		</div>
    </div>
    <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
</body>

<script>
    $(".alert").alert()
</script>