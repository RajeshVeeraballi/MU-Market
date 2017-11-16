<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';

    if(isset($_POST['email'])){
      if($_POST['email'] == ''){
        $_SESSION["session_msg"] = "Email is Required";
        $_SESSION["type"] = 'danger';
        header('Location: ../Register.php');
        exit;
      } if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){		  
        $_SESSION["session_msg"] = "Enter valid Email Address";
        $_SESSION["type"] = 'danger';
        header('Location: ../Register.php');
        exit;
      }
	  
	  $email = $_POST['email'];
	  $invalid_email = true;
	  $restrict_domain = "monmouth.edu";
	  $domain = strtolower(substr($email, strlen($email) - strlen($restrict_domain)));
	  if($domain == $restrict_domain) {
		  $invalid_email = false;
	  }
	  if($invalid_email) {
		  $_SESSION["session_msg"] = "Only Monmouth students can register";
		  $_SESSION["type"] = 'danger';
		  header('Location: ../Register.php');
		  exit;
	  }
		  
	  /*
	  if(!preg_match("~@monmouth.edu~",$_POST['email'])) {
		$_SESSION["session_msg"] = "Only Monmouth students can register";
		$_SESSION["type"] = 'danger';
		header('Location: ../Register.php');
		exit;
	 }	 
	 */
	  
      if($_POST['password']=='' || $_POST['password'] != $_POST['retry_password']){
          $_SESSION["session_msg"] = "Password not matched";
          $_SESSION["type"] = 'danger';
          header('Location: ../Register.php');
          exit;
      }
		
	  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["retry_password"])) {
		$password = $_POST["password"];
		$passwordErr = '';
		
		if (strlen($_POST["password"]) < '8' || strlen($_POST["password"]) > '36') {
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
			header('Location: ../Register.php');
			exit;
		}	
	}

      $sql = "INSERT INTO user_info (first_name, last_name, phone_number, email_id, password, Address, city, state, country, zip, created_at) VALUES ('".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['phone_number']."','".$_POST['email']."','".$_POST['password']."','".$_POST['address']."','".$_POST['city']."','".$_POST['state']."','".$_POST['country']."','".$_POST['zip']."','".date('Y-m-d H:i:s')."')";
      if ($conn->query($sql) === TRUE) {
        $_SESSION["session_msg"] = "You have successfully registered. Please Login";
        $_SESSION["type"] = 'success';
        header('Location: ../Login.php');
        exit;
      } else {
          $_SESSION["session_msg"] = "Failed to Register";
          $_SESSION["type"] = 'danger';
          header('Location: ../Register.php');
          exit;
      }
    }
?>
