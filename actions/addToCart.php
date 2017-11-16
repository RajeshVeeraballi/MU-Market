<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';

    if(!isset($_SESSION['email']) && $_SESSION['email'] == ''){
      $_SESSION["session_msg"] = "Please login to add products to cart";
      $_SESSION["type"] = 'info';
      header('Location: ../Login.php');
      exit;
    }
	
    if(isset($_GET['product_id']) && $_GET['type'] == 'add_to_cart'){
      $productId = $_GET['product_id'];
      $userId = $_SESSION['user_id'];
      $quantity = 1;
      $date = date('Y-m-d H:i:s');

      $sql = "INSERT INTO cart (user_id, product_id, quantity, date) VALUES ('".$userId."','".$productId."','".$quantity."', '".$date."')";
      if ($conn->query($sql) === TRUE) {
        $_SESSION["session_msg"] = "Successfully added to the cart";
        $_SESSION["type"] = 'success';
		header('Location: ../Cart.php');
      } else {
          // echo "Error: " . $sql . "<br>" . $conn->error;
          $_SESSION["session_msg"] = "Failed to add into cart";
          $_SESSION["type"] = 'danger';
          header('Location: ../products.php');
      }

    } elseif(isset($_GET['product_id']) && $_GET['type'] == 'buy_now'){
      $productId = $_GET['product_id'];
      $userId = $_SESSION['user_id'];
      $quantity = 1;
      $date = date('Y-m-d H:i:s');

      $sql = "INSERT INTO cart (user_id, product_id, quantity, date) VALUES ('".$userId."','".$productId."','".$quantity."', '".$date."')";
      if ($conn->query($sql) === TRUE) {
		$lastInsertedId = $conn->insert_id;  
        //$_SESSION["session_msg"] = "Successfully added to the cart";
        //$_SESSION["type"] = 'success';
		header('Location: ../buyNow.php?cart_id='.$lastInsertedId);
      } else {
          // echo "Error: " . $sql . "<br>" . $conn->error;
          $_SESSION["session_msg"] = "Failed to add into cart";
          $_SESSION["type"] = 'danger';
          header('Location: ../products.php');
      }

    }
?>
