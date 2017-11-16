<!DOCTYPE html>
<html lang="en">

<head>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Reject Reason</title>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

	<?php
		include("includes/header_admin.html");
		include("includes/db.php");
		if (empty($_COOKIE['uname'])) {
			header('LOCATION: index.php');
		}
		else {
			$uname = $_COOKIE['uname'];
			if (isset($_GET['seller_id'])) {
				$seller_id = $_GET['seller_id'];
			}
			else
				echo "Wrong!";
		}
	?>
	
  <div id = "container">
  	<?php 
  	$s = "select * from seller where seller_id = '$seller_id'";
	$r = @mysqli_query($dbc, $s);
	$row = mysqli_fetch_array($r);
	
  	?>
	<p><center><h3><?php echo $row['uname'];?>'s Post Rejection</h3></center></p>
	<div id = "main">
	
	<?php 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
		if(isset($_POST['update'])) { 
			$reason = $_POST['reason'];
		}
	}
	?>
	
	<form action = "" method = "POST"><center>
			<table style = "padding: 10x 350px"><font size = "3" color = "blue">
				<tr>
					<textarea placeholder="Reject reason for this vendor" rows="4" cols="50" name="reason" value = "<?php echo $reason; ?>"></textarea>
				</tr>
			</table>
			<table>
				<tr>
					<input type = "submit" name = "update" value = "Update" />
				</tr>
			</table>
			<p>
			<?php
			
			echo "<a onClick=\"javascript: return confirm('Do you really want to reject?');\" href = 'post_reject.php?post_id=". $row['post_id'] . "&reason=" . $reason ."'>Reject</a><br>";
			echo  "<a href = 'user_info.php?user_id=". $row['user_id'] . "'>Back</a><br>
				</tr>";	
			?>
			</p>
			</font>
		</center></form>
	
	</div>       
		<div class="panel panel-default">

        <div class="panel-footer"> Copyright &copy; 2017 Monmouth University.</div>
    </div>
	<!-- /.container -->

	<!-- jQuery -->
	<script src="js/jquery.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>

</body>

</html>