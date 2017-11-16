<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';

    if(isset($_POST['email'])){
		$email = $_POST['email'];
		$sql = "SELECT * FROM user_info where email_id = '$email'";
		$check = $conn -> query($sql);
		if ($check -> num_rows > 0) {
			$code = mt_rand(100000, 999999);
			$sql = "UPDATE user_info set reset_password_code='$code' WHERE email_id = '$email'";
			// ALTER TABLE user_info ADD reset_password_code varchar(6);
			$conn -> query($sql);
			mail($email, "Reset your password", "Use $code to reset your password");
			$_SESSION["session_msg"] = "Check your email address for verification code. Use it to reset your password.";
			$_SESSION["type"] = 'success';
			header('Location: ../resetPassword.php?email='.$email);
		} else {
		  // echo "Error: " . $sql . "<br>" . $conn->error;
		  $_SESSION["session_msg"] = "Invalid Email Address.";
		  $_SESSION["type"] = 'danger';        
		  header('Location: ../forgotpassword.php');

         }
    }
?>
