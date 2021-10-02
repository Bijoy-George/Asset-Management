<?php 
require_once('conf.php');
session_start();

$id=$_GET['id'];
$userid=$_SESSION['user_id'];
$username=$_SESSION['user_name']." given back";
$statusselect="SELECT `status` FROM am_products  WHERE `id`=$id";

$query=mysqli_query($conn,$statusselect);
$res=mysqli_fetch_assoc($query);
$status=$res['status'];

$assetid=$_GET['id'];
$date = date("Y-m-d H:i:s");

if ($status != "AVAILABLE"){
    
   
 $update = "UPDATE `am_products` set `status`='AVAILABLE' WHERE `id`=$id";
    
  
mysqli_query($conn,$update);

    $update2 = "UPDATE `am_products` set `user_name`=0 WHERE `id`=$id";

mysqli_query($conn,$update2);
    
    
$insert="INSERT INTO am_status (`userid`,`assetid`,`status`,`date`) VALUES ('".$userid."','".$assetid."','".$username."','".$date."')";

mysqli_query($conn,$insert);


header("Location:employee.php");
    
    
}




?>
