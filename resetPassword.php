<?php
if(!isset($_GET['email'])) {
	header('Location: forgotpassword.php');
	die();
}
?>
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
		<h2>Reset Password</h2>
		<br> <br>
    <form action="actions/resetPassword.php" method="POST">
			<table>
				<tr>
					<td> Email: </td>
					<td> 
						<input type="text" value="<?php echo $_GET['email']; ?>" name="email" />
					</td>
				</tr>
				<tr>
					<td> Verification Code: </td>
					<td>
						<input type="text" name="reset_password_code" />
					</td>
				</tr>
				<tr>
					<td> New Password: </td>
					<td>
						<input type="password" name="new_password" />
					</td>
				</tr>
			</table>
      <input type="submit" id="btnLogin" value="Submit">
	  <br />
	  <a href="forgotpassword.php?email=<?php echo $_GET['email']; ?>"> Resend verification code </a>
    </form>
</div>
</div>
<div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
</body>
</html>
