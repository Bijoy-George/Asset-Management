<?php


require_once("conf.php");


$u_email = $_POST['e_id'];
$u_pass = $_POST['e_pass'];



$select = "SELECT * FROM am_users WHERE `userid`='".$u_email."' AND  `password`='".($u_pass)."' ";

$query=mysqli_query($conn,$select);
$res=mysqli_fetch_assoc($query); 




if ($u_pass="admin") {
    
    if($u_email =="admin"){
    

  session_start();
    
    $_SESSION['user_id'] = $res['id'];
    $_SESSION['user_name'] = $res['name'];
    
}    
    
if ($res["role"] == 1 ){
    
    header("Location:admin.php");
    
}  

    else {
        
        header("Location:employee.php");
        
    }
    

}

else {
    
    header("Location:index.php?msg=1");
    
}





?>
