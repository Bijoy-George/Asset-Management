<?php

require_once("conf.php");
$id=$_POST['id'];
$a_product=$_POST['a_product'];
$a_price=$_POST['e_price'];
$a_number=$_POST['e_number'];
$total_stock = $a_price * $a_number;
// $a_img= $_FILES['updt_file'];
$updt_date=date("Y-m-d H:i:s");
// $old_image=$_POST['img-id'];
// $updt_cat=$_POST['categories_id'];


// $firstname = $old_image;


// $final_name = $new_name.'.'.$ext;

    
    
    // $src= $a_img['tmp_name'];
    
    // $dest = "uploads/".$final_name;
    // move_uploaded_file($src,$dest);
    

    
    
$update="UPDATE `am_products` SET `name`='".$a_product."',`price`='".$a_price."',`date`='".$updt_date."',`no_of_product`='".$a_number."',`total_stock_price`='".$total_stock."' WHERE `id`='".$id."'";
    
    mysqli_query($conn,$update);
    header("Location:admin.php");
    
?>
