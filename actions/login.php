<?php
   include '../db.php';

   if (!empty($_POST['email']) && !empty($_POST['password'])) {
	
	/*if($_POST['g-recaptcha-response']==''){
		         $_SESSION["session_msg"] = "Please check the CAPTCHA";
				 $_SESSION["type"] = 'danger';
         header('Location: ../Login.php');
         exit();

	}
	else{
		*/
		
      $sql = "SELECT * FROM user_info WHERE email_id='".$_POST['email']."' AND password='".$_POST['password']."'";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         $row = $result->fetch_assoc();
      }
      if($row){
         $_SESSION['user_id'] = $row['user_id'];
         $_SESSION['email'] = $row['email_id'];
         $_SESSION['first_name'] = $row['first_name'];
         $_SESSION['last_name'] = $row['last_name'];
         $_SESSION['role'] = $row['role'];
         $_SESSION["session_msg"] = "You have been successfully logged in";
         $_SESSION["type"] = 'success';
         header('Location: ../index.php');
         exit();
      }else {
         $_SESSION["session_msg"] = "Invalid Eamil OR Password";
         $_SESSION["type"] = 'danger';
         header('Location: ../Login.php');
         exit();
      }
    }else {
      $_SESSION["session_msg"] = "Please enter Email and Password";
      $_SESSION["type"] = 'danger';
      header('Location: ../Login.php');
      exit();
   }
?>
