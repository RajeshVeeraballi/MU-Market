<?php
	include '../db.php';
	if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
		header('Location: ../index.php');
	}

	if(isset($_GET['type']) && $_GET['type'] == 'post_ad'){
		$deleteSql = "DELETE FROM products WHERE product_id = ".$_GET['product_id']." AND user_id = ".$_SESSION['user_id'];
		if ($conn->query($deleteSql) === TRUE) {
    		$_SESSION["session_msg"] = "Successfully Deleted";
	        $_SESSION["type"] = 'success';
		} else {
	  		// echo "Error: " . $sql . "<br>" . $conn->error;
		  	$_SESSION["session_msg"] = "Failed to Delete";
		  	$_SESSION["type"] = 'danger';
		}
		header('Location: ../myAds.php');
		exit;
	}

	if(isset($_GET['type']) && $_GET['type'] == 'req_ad'){
		$deleteSql = "DELETE FROM request_product WHERE request_id = ".$_GET['request_id']." AND user_id = ".$_SESSION['user_id'];
		if ($conn->query($deleteSql) === TRUE) {
    		$_SESSION["session_msg"] = "Successfully Deleted";
	        $_SESSION["type"] = 'success';
		} else {
	  		// echo "Error: " . $sql . "<br>" . $conn->error;
		  	$_SESSION["session_msg"] = "Failed to Deleted";
		  	$_SESSION["type"] = 'danger';
		}
		header('Location: ../myAds.php');
		exit;
	}

?>