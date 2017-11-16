<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';

    if(isset($_POST['request_product'])){
          $title = addslashes($_POST['title']);
          $userId = $_SESSION['user_id'];
          $description = addslashes($_POST['description']);
          $contact = $_POST['contact'];
		  
		  if(!filter_var($_POST['contact'], FILTER_VALIDATE_EMAIL)){
        $_SESSION["session_msg"] = "Enter valid Email Address";
        $_SESSION["type"] = 'danger';
        header('Location: ../PostRequestProduct.php');
        exit;
      }
	  else{
          $sql = "INSERT INTO request_product (user_id, product_title, product_description, contact_details,status) VALUES ('".$userId."','".$title."','".$description."', '".$contact."', 0)";
		  
          if ($conn->query($sql) === TRUE) {
            $_SESSION["session_msg"] = "Successfully sent your post for requested product to admin's approval. Please wait for admin's approval to see your request in request products list. Thank You.";
            $_SESSION["type"] = 'success';
          } else {
              // echo "Error: " . $sql . "<br>" . $conn->error;
              $_SESSION["session_msg"] = "Failed to send your post for requested product to admin's approval. Please check again.";
              $_SESSION["type"] = 'danger';
          }
		 }
        header('Location: ../RequestProduct.php');
    }
?>
