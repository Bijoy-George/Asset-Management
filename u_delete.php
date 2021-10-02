<?php 
require_once("conf.php");


$id = $_GET['id'];


$delete= "DELETE FROM am_users WHERE `id`=$id"; 
mysqli_query($conn,$delete);

$update = "DELETE FROM `am_asset_staff` WHERE `user_id`=$id";
 mysqli_query($conn,$update);







header("Location:staff_list.php");

?>
