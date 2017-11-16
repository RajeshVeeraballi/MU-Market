<?php
	include '../db.php';
	if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
		header('Location: ../index.php');
	}
	$product_id = $_GET['product_id'];
	$getID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `products` WHERE  product_id = '$product_id'"));
$contact_details = $getID['contact_details'];

$_SESSION['myid'] = $value->id;
	if(isset($_GET['type']) && $_GET['type'] == 'post_ad'){
		$updateSql = "UPDATE `products` SET `status` = ".$_GET['status']." WHERE product_id = ".$_GET['product_id'];
		if ($conn->query($updateSql) === TRUE) {
			if($_GET['status'] == 1){
				$_SESSION["type"] = 'success';
				$msg = "Your product is approved";
        mail($contact_details,"Product approved",$msg, "From: mumarket@monmouth.edu");
				$_SESSION["session_msg"] = "Successfully Approved";
			}else{
				$_SESSION["session_msg"] = "Successfully Rejected";
	        $_SESSION["type"] = 'success';
			$msg = "Your product is rejected";
        mail($contact_details,"Product rejected",$msg, "From: mumarket@monmouth.edu");
			}
		} else {
	  		// echo "Error: " . $sql . "<br>" . $conn->error;
			if($_GET['status'] == 1)
				$_SESSION["session_msg"] = "Failed to Reject";
			else
				$_SESSION["session_msg"] = "Failed to Reject";
		  	$_SESSION["type"] = 'danger';
		}
		header('Location: ../adminPostAds.php');
		exit;
	}


	
	
	$request_id = $_GET['request_id'];
	$getID = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `request_product` WHERE  request_id = '$request_id'"));
$contact_details = $getID['contact_details'];

$_SESSION['myid'] = $value->id;
	
	if(isset($_GET['type']) && $_GET['type'] == 'req_ad'){
		$updateSql = "UPDATE `request_product` SET `status` = ".$_GET['status']." WHERE request_id = ".$_GET['request_id'];
		if ($conn->query($updateSql) === TRUE) {
    		if($_GET['status'] == 1){
				$_SESSION["type"] = 'success';
				$msg = "Your request is approved";
        mail($contact_details,"Request approved",$msg);
				$_SESSION["session_msg"] = "Successfully Approved";
			}else{
				$_SESSION["session_msg"] = "Successfully Rejected";
	        $_SESSION["type"] = 'success';
			$msg = "Your request is rejected";
        mail($contact_details,"Request rejected",$msg);
		}} else {
	  		// echo "Error: " . $sql . "<br>" . $conn->error;
			if($_GET['status'] == 1)
				$_SESSION["session_msg"] = "Failed to Reject";
			else
				$_SESSION["session_msg"] = "Failed to Reject";
		  	$_SESSION["type"] = 'danger';
		}
		header('Location: ../adminRequestAds.php');
		exit;
	}

?>