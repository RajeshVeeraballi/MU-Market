<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';

    if(isset($_POST['email']) && isset($_POST['reset_password_code']) && isset($_POST['new_password'])){
		$email = $_POST['email'];
		$reset_password_code = $_POST['reset_password_code'];
		
		$sql = "SELECT * FROM user_info where email_id = '$email' AND reset_password_code='$reset_password_code'";
		$check = $conn -> query($sql);
		if ($check -> num_rows > 0) {
			$password = $_POST['new_password'];
			
				$passwordErr = '';
		
		if (strlen($password ) <= '8' || strlen($password) > '36') {
			$passwordErr = "Your Password Must Contain At Least 8 Characters and max 36 Characters!";
		}
		elseif(!preg_match("#[0-9]+#",$password)) {
			$passwordErr = "Your Password Must Contain At Least 1 Number!";
		}
		elseif(!preg_match("#[A-Z]+#",$password)) {
			$passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
		}
		elseif(!preg_match("#[a-z]+#",$password)) {
			$passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
		}
		elseif(!preg_match("#[\W]+#",$password)) {
			$passwordErr = "Your Password Must Contain At Least 1 Special Characters!";
		}
		
		if($passwordErr){
			$_SESSION["session_msg"] = $passwordErr;
			$_SESSION["type"] = 'danger';
		  header('Location: ../resetPassword.php?email='.$email);
		}
			 else {
				$conn -> query("UPDATE user_info set password='$password', reset_password_code='' WHERE email_id='$email'");
				$_SESSION["session_msg"] = "Your password has been reset. Login with your new password.";
				$_SESSION["type"] = 'success';
				header('Location: ../Login.php');
			}
				
		}
		else {
		  $_SESSION["session_msg"] = "Invalid Verification Code";
		  $_SESSION["type"] = 'danger';        
		  header('Location: ../resetPassword.php?email='.$email);
         }
    } else {
		$_SESSION["session_msg"] = "Invalid Input Data.";
		$_SESSION["type"] = 'danger'; 
		header('Location: ../forgotpassword.php');
	}
?>
