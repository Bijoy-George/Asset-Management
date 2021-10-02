<?php
require_once("conf.php");

$emp_name=$_POST['emp_name'];
$emp_id=$_POST['emp_id'];


function generateRandomString($length = 3) {
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    

}
    

$str = generateRandomString();
$name = substr($emp_name,0,3);
$toUpper =strtoupper($name);
$employee_id="$toUpper"."$str";

$query = "SELECT name FROM am_users WHERE name='".$emp_name."'";

    $result=mysqli_query($conn,$query);
   if (mysqli_num_rows($result) != 0)
	{
		echo "Username already exists";
	}

    else
   {
		$insert = "INSERT INTO am_users (id,name,userid,role) VALUES ('','".$emp_name."','".$employee_id."','2')";


		mysqli_query($conn,$insert);


		header("Location:staff_list.php"); 


   }


    
        





?>
