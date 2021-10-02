<?php
require_once('config.php');
$category_id = $_POST['category_id'];
$pro_name = $_POST['pro_name'];
$pro_desc = $_POST['pro_desc'];
$pro_price = $_POST['pro_price'];
$created_date_time = date('Y-m-d H:i:s');
$insert = "INSERT INTO products VALUES('','".$category_id."','".$pro_name."','".$pro_desc."','".$pro_price."','".$created_date_time."')";
mysqli_query($conn,$insert);
header('Location:products.php');
?>