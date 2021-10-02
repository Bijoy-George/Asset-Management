<?php 
require_once("conf.php");


$id = $_GET['id'];


$delete= "DELETE FROM am_products WHERE `id`=$id"; 
$query = mysqli_query($conn,$select);

$res = mysqli_fetch_assoc($query);
mysqli_query($conn,$delete);



header("Location:admin.php");

?>
