<!DOCTYPE html>
<html lang="en">

<head>

	<link rel = "stylesheet" href = "includes/style.css" type = "text/css" media = "screen" />
	<meta charset="utf-8">

	<title>Reset Password</title>

	<?php
	function randomString($length) {
  		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   		$charactersLength = strlen($characters);
    	$randomString = '';
    	for ($i = 0; $i < $length; $i++) {
        	$randomString .= $characters[rand(0, $charactersLength - 1)];
    	}
    	return $randomString;
	}
	?>
</head>

<body>
	<?php 
			include("includes/db_connection.php");
			include("includes/header.html");
			
			if ($_SERVER['REQUEST_METHOD'] == 'POST')  {	
				if (isset($_POST['back'])) {
					header('LOCATION: signin.php');
				}
				if(isset($_POST['reset'])) { 
					$uname = $_POST['uname'];
					$q = "select * from user where username = '$uname'";
					$r = mysqli_query($dbc, $q);
					if (mysqli_num_rows($r) == 1) {
						$row = mysqli_fetch_array($r);
						$email = $row['email'];
						//reset pasword
						$length = 8;
						$randomPsword = randomString($length);
						$update = "update user SET password = SHA('$randomPsword') WHERE username = '$uname'";
						$ur = mysqli_query($dbc, $update);
						if (!$ur)
							echo "Something Wrong";
						else {		//send psword to users email
							echo "<center>We have created a new password for you! Please check your email!</center>";
							$to = $email;
							$subject = 'New Password for Miss Vicky Shopping System';
							$message = "Hi ". $uname .", \n\nYou have been assigned a temporary password [ ". $randomPsword . " ].\nClick here to log in with your new password.\nhttp://aristotleii.monmouth.edu/~s1074436/MissVicky/signin.php\n\nThis is a system email. Please do not reply!\n\nThank You!\n Miss Vicky Shopping System";
							$headers = 'From: Miss Vicky' . "\r\n" .
    									'Reply-To: ' . "\r\n" .
    									'X-Mailer: PHP/' . phpversion();
							mail($to, $subject, $message, $headers);
						}
					
					}
					else {
						echo "<center>Your username is not existed! Please enter again!</center>";
					}
				}
		}
	?>
	
	
		<form action = "" method = "POST"><center>
			<table style = "padding: 50px 350px">
				<tr>
				<h4>Please input your username here, we will send you a new password to your email address.</h4>
				</tr>
				<tr>
					<td>Username: </td>
					<td> <input type = "text" name = "uname" value = <?php echo $uname; ?> ></td>
				</tr>
			</table><p></p>
			<table>
				<tr>
					<td>
						<input type = "submit" name = "back" value = "Back" />
					</td><td></td>
					<td>
						<input type = "submit" name = "reset" value = "Go" />
					</td>
				</tr>
			</table> 
		</form></center>	
	
</body>
</html>