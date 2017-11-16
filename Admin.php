<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MU-University-Admin Awiting Posts</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap Custom css -->
	<link href="css/style.css" rel="stylesheet">
  <!-- Comment from Shan -->
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<?php
	include("header_admin.html");

// 	session_start();
// 	if(!isset($_SESSION['uname'])) 
// 	 header('LOCATION: login.php');
// 	else {
// 			$uname = $_SESSION['uname'];
// 			$fname = $_SESSION['fname'];
// 		}
			
?>

		<h1>Welcome, <?php echo   $fname ?></h1>
<div id="Divfooter">
Copyright &copy; 2017 Monmouth University.
</div>

</body>
</html>
