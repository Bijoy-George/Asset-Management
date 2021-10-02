<?php 


require_once('conf.php');
$id = $_GET['id'];

$delete = "DELETE FROM am_categories WHERE id= $id";

mysqli_query($conn,$delete);


header("Location:a_cat.php")




?>
