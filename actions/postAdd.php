<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';
    $config = include '../config.php';
	//var_dump($_POST);
	//exit;
    if(isset($_POST['post_add'])){
          $userId = $_SESSION['user_id'];
          $title = addslashes($_POST['title']);
          $description = addslashes($_POST['description']);
          $price = $_POST['price'];
          // $product_image = $_POST['product_image'];
          $contact = $_POST['contact'];
          $payment_online = (isset($_POST['payment_type']) && $_POST['payment_type'] == 'online_payment') ? 'online_payment' : '';
          $contact_seller = (isset($_POST['payment_type']) && $_POST['payment_type'] == 'contact_seller') ? 'contact_seller' : '';
          $target_file = '../img/';
          $image = basename( $_FILES["product_image"]["name"]);
          $file = $target_file.$image;
		  
		  if ($_POST['title'] == ''){
			  $_SESSION["session_msg"] = "Please enter product title";
				 $_SESSION["type"] = 'danger';
				 header('Location: ../PostAdd.php');
         exit;
		  } 
		  
		   elseif(!filter_var($_POST['contact'], FILTER_VALIDATE_EMAIL)){
        $_SESSION["session_msg"] = "Enter valid Email Address";
        $_SESSION["type"] = 'danger';
        header('Location: ../PostAdd.php');
        exit;
      }
	
         
		  
			  move_uploaded_file($_FILES["product_image"]["tmp_name"], $file);
          $sql = "INSERT INTO products (user_id, product_title, product_description, image, price, contact_details, payment_online, contact_seller, status) VALUES ('".$userId."','".$title."','".$description."','".$image."', '".$price."','".$contact."', '".$payment_online."', '".$contact_seller."', 0)";
          if ($conn->query($sql) === TRUE) {
            $_SESSION["session_msg"] = "Successfully sent your posted product to admin's approval. Please wait for admin's approval to see your product in products list. Thank You.";
            $_SESSION["type"] = 'success';
          } else {
              // echo "Error: " . $sql . "<br>" . $conn->error;
              $_SESSION["session_msg"] = "Failed to send your posted product to admin's approval. Please check again.";
              $_SESSION["type"] = 'danger';
          }
		  
		          header('Location: ../products.php');

    }
?>
