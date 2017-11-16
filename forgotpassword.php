<!DOCTYPE html>
<html lang="en">

<?php include 'head.php'; ?>
<body>
<?php
	include 'header.php';
?>
<div class="container-fluid">
	<div id="msform">
		<fieldset>
		<h2>Reset/Forgot Password</h2>
		<br> <br>
    <form action="actions/sendForgotPasswordLink.php" method="POST">
			Enter your email address below
      <input type="text" id="txtusername" placeholder="Email" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ?>">
      <input type="submit" id="btnLogin" value="Get Verification Code">
      <a href="Login.php">Cancel</a>
    </form>
</div>
</div>
<div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
</body>
</html>
