<?php
    include '../db.php';
    if(!isset($_GET['tx'])){
        $_SESSION["session_msg"] = "Your PayPal transaction has been canceled.";
        $_SESSION["type"] = 'danger';
        header('Location: ../Cart.php');
    }
    //Get payment information from PayPal
    $item_number = $_GET['item_number'];
	$txn_id = $_GET['tx'];
    $payment_gross = $_GET['amt'];
    $currency_code = $_GET['cc'];
    $payment_status = $_GET['st'];

    $sql = "SELECT sum(P.price) as price FROM cart C JOIN products P ON C.product_id = P.product_id where C.paid = 0 AND C.user_id=".$_SESSION['user_id']." AND C.product_id IN (".$item_number.")";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $productPrice = $row['price'];
        }
    }
	
    if(!empty($txn_id) && $payment_gross == $productPrice){
    	//Check if payment data exists with the same TXN ID.
        $prevPaymentResult = $conn->query("SELECT payment_id FROM payments WHERE txn_id = '".$txn_id."'");

        if($prevPaymentResult->num_rows > 0){
            $paymentRow = $prevPaymentResult->fetch_assoc();
            $last_insert_id = $paymentRow['payment_id'];
        }else{
            //Insert tansaction data into the database
            $insert = $conn->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status) VALUES('".$item_number."','".$txn_id."','".$payment_gross."','".$currency_code."','".$payment_status."')");
            $last_insert_id = $db->insert_id;
        }
		
		$updateSql = "UPDATE `cart` SET `paid` = '1' WHERE product_id IN (".$item_number.") AND user_id = ".$_SESSION['user_id'];
        $conn->query($updateSql);
        $_SESSION["session_msg"] = "Your payment has been successful.";
        $_SESSION["type"] = 'success';
        $msg = "Your Payment is successful. Thank you for shopping with MU Market Place";
        mail($_SESSION['email'],"Payment Successful",$msg, "From: mumarket@monmouth.edu");
    } else{
        $_SESSION["session_msg"] = "Your payment has failed.";
        $_SESSION["type"] = 'danger';
        $msg = "Your Payment is declined. Don't worry try once more";
        mail($_SESSION['email'],"Payment Failed",$msg, "From: mumarket@monmouth.edu");
    }
    header('Location: ../Cart.php');
?>
