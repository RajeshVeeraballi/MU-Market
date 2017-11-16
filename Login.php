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
		<h2>Login Here</h2>
			<form action="actions/login.php" method="POST" name="login">
				<input type="text" id="txtusername" placeholder="Email" name="email">
				<input type="password"  id="txtpassword" placeholder="Password" name="password">
			  <div class="g-recaptcha" style="margin-left:70px" data-sitekey="6LcxTR0UAAAAAIspjACpIeEZ-3qL4JXjAg9Hj0E5"></div>

				<input type="submit" id="btnLogin" value="Login"><BR/><BR/></a>
			</form>
			<a href="Register.php">Not Yet Register?  Click Here</a>
			&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <a href="forgotpassword.php">Reset/Forgot password?</a>
		</fieldset>
	</div>
</div>
    <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
</body>
</html>
