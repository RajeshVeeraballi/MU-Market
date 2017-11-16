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
      }
      $sql = "UPDATE user_info SET first_name='".$_POST['first_name']."', last_name='".$_POST['last_name']."', phone_number='".$_POST['phone_number']."', email_id='".$_POST['email']."', Address='".$_POST['address']."', city='".$_POST['city']."', state='".$_POST['state']."', country='".$_POST['country']."', zip='".$_POST['zip']."' WHERE user_id=".$_SESSION['user_id'];
      
	  if ($conn->query($sql) === TRUE) {
		
		$_SESSION['email'] = $_POST['email'];
         $_SESSION['first_name'] = $_POST['first_name'];
         $_SESSION['last_name'] = $_POST['last_name'];
		
        $_SESSION["session_msg"] = "You have successfully updated";
        $_SESSION["type"] = 'success';
        header('Location: ../index.php');
        exit;
      } else {
          $_SESSION["session_msg"] = "Failed to Update";
          $_SESSION["type"] = 'danger';
          header('Location: ../EditProfile.php');
          exit;
      }
    }
?>
