<?php
  include '../db.php';
  $titles = [];
  $sql = "SELECT product_title FROM request_product WHERE status != 0";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $titles[] = $row['product_title'];
    }
  }

  echo json_encode($titles);
?>
