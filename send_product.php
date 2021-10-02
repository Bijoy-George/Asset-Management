<?php 


require_once("conf.php");


// $a_cat = $_POST['categories_id'];
$a_product= $_POST['a_product'];
// $a_num =$_POST['a_num'];
$a_des= $_POST['a_des'];
$a_img= $_FILES['a_img'];
$a_date = date("Y-m-d H:i:s");
$a_status = $_POST['status'];
// $a_input_cat=$_POST['a_cat'];
$a_price=$_POST['a_price'];
$a_number = $_POST['a_number'];
$total_stock_price = $a_price * $a_number; 

$firstname = $a_img['name'];


$arr_explode= explode('.',$firstname);


$ext= $arr_explode[count($arr_explode) - 1 ];



$new_name = date("YmdHis");

$final_name = $new_name.'.'.$ext;
    
    
    $src= $a_img['tmp_name'];
    
    $dest = "uploads/".$final_name;
    move_uploaded_file($src,$dest);

  $str=str_replace("'","\'",$a_des);
    $str2=str_replace('"','\"',$str);
    

    
$insert ="INSERT INTO am_products (`id`,`name`,`description`,`image`,`date`,`categories`,`status`,`price`,`no_of_product`,`total_stock_price`) VALUES ('','".$a_product."','".$str2."','".$final_name."','".$a_date."','','".$a_status."','".$a_price."','".$a_number."','".$total_stock_price."')";
    mysqli_query($conn,$insert);
    header("Location:admin.php");  
    


// else {
 
// $insert ="INSERT into am_categories (`cat_name`) VALUES ('".$a_input_cat."')";

// mysqli_query($conn,$insert);

// $select="SELECT * FROM am_categories WHERE `cat_name`='".$a_input_cat."'";

// $query=mysqli_query($conn,$select);

// $res=mysqli_fetch_assoc($query);

// $a_new_input =$res['id'];

// $insert1 ="INSERT INTO am_products (`id`,`name`,`description`,`image`,`date`,`categories`,`status`,'price') VALUES ('','".$a_product."','".$str2."','".$final_name."','".$a_date."','".$a_new_input."','".$a_status."','".$a_price."')";

// mysqli_query($conn,$insert1);
// header("Location:admin.php"); 
// }
?>
