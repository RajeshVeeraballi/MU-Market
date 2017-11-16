<?php
    // error_reporting(E_ALL);
    // ini_set('display_errors',1);
    include '../db.php';
    $config = include '../config.php';
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    }
    return $rows;
?>
