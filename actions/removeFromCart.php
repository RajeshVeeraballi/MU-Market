<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';

    if(isset($_GET['cart_id'])){
      $cartId = $_GET['cart_id'];
      $userId = $_SESSION["user_id"];
      $sql = "DELETE FROM cart WHERE cart_id=".$cartId." AND user_id=".$_SESSION['user_id'];
      if ($conn->query($sql) === TRUE) {
        $_SESSION["session_msg"] = "Successfully removed from the cart";
        $_SESSION["type"] = 'success';
      } else {
          // echo "Error: " . $sql . "<br>" . $conn->error;
          $_SESSION["session_msg"] = "Failed to remove from cart";
          $_SESSION["type"] = 'danger';
      }
      header('Location: ../Cart.php');
    }
?>
