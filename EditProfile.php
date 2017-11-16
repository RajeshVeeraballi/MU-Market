<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>
<?php include 'header.php'; ?>
<div class="container-fluid">
	<div id="msform">
		<?php
			$sql = "SELECT * FROM user_info WHERE user_id=".$_SESSION['user_id'];

			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc();
			}
		?>
		<fieldset>
		<h2>My Profile</h2>
		<form action="actions/updateProfile.php" method="post">
			<input type="text" id="txtFirstname" placeholder="Firstname"  name="first_name" value="<?php echo $row['first_name']?> ">
			<input type="text"  id="txtLastname" placeholder="Lastname" name="last_name" value="<?php echo $row['last_name']?>">
			<input type="text"  id="txtLastname" placeholder="Phone Number" name="phone_number" value="<?php echo $row['phone_number']?>">
			<input type="text"  id="txtAddress" placeholder="Address" name="address" value="<?php echo $row['Address']?>">
			<input type="text"  id="txtEmail" placeholder="Email" name="email" value="<?php echo $row['email_id']?>">
			<!-- <input type="password"  id="txtpassword" placeholder="Password" name="password">
			<input type="password"  id="txtRetypepassword" placeholder="Retype Password" name="retry_password"> -->
			<!-- <a href="Login.html"><input type="button" id="btnLogin" value="Register" ></a> -->
			<input type="text"  id="txtEmail" placeholder="City" name="city" value="<?php echo $row['city']?>">
			<input type="text"  id="txtEmail" placeholder="State" name="state" value="<?php echo $row['state']?>">
			<input type="text"  id="txtEmail" placeholder="Country" name="country" value="<?php echo $row['country']?>">
			<input type="text"  id="txtEmail" placeholder="Zip Code" name="zip" value="<?php echo $row['zip']?>">
			<input type="submit" value="Update">
		</form>
		</fieldset>
	</div>
	
</div>
   <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
</body>
</html>
