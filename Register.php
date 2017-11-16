<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="container-fluid">
	<div id="msform">

		<fieldset>
		<h2>Register Here</h2>
		<form action="actions/register.php" method="post">
			<input type="text" id="txtFirstname" placeholder="Firstname"  name="first_name">
			<input type="text"  id="txtLastname" placeholder="Lastname" name="last_name">
			<input type="text"  id="txtLastname" placeholder="Phone Number" name="phone_number">
			<input type="text"  id="txtAddress" placeholder="Address" name="address">
			<input type="text"  id="txtEmail" placeholder="Email" name="email">
			<label id="lblDIsplayTxtReg" style="color:red;font-weight:300;font-size:11px">Please register with your Monmouth email ID</label>
			<input type="password"  id="txtpassword" placeholder="Password" name="password">
			<label id="lblDIsplayTxt" style="color:red;font-weight:300;font-size:11px">Password should be 8-36 characters and must contain atleast 1 Capital, 1 lower, 1 number and 1 special character.</label>
			<input type="password"  id="txtRetypepassword" placeholder="Retype Password" name="retry_password">
			<!-- <a href="Login.html"><input type="button" id="btnLogin" value="Register" ></a> -->
			<input type="text"  id="txtEmail" placeholder="City" name="city">
			<input type="text"  id="txtEmail" placeholder="State" name="state">
			<input type="text"  id="txtEmail" placeholder="Country" name="country">
			<input type="text"  id="txtEmail" placeholder="Zip Code" name="zip">
			<input type="submit" value="Register">
		</form>
		</fieldset>
	</div>
	
</div>
    <div class="col-lg-12">

    <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.<span class="pull-right"><a href="Helpdoc.php">Help<a/></span></div>
	
  </div>
</body>
<script>
    $(document).ready(function () {
		$("#lblDIsplayTxt").hide();
		$("#lblDIsplayTxtReg").hide();
		
	$('#txtpassword').keypress(function (e) {
            $("#lblDIsplayTxt").show();
			
  
        });
			$('#txtEmail').keypress(function (e) {
            $("#lblDIsplayTxtReg").show();
			
  
        });
	});
</script>
</html>
