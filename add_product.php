<?php 


require_once('conf.php');


session_start();
$assetId=$_POST['id'];
$staff_assign_number = $_POST['staff_assign_number'];
$no_of_product = $_POST['no_of_product'];
$price = $_POST['product_price'];
if($no_of_product < $staff_assign_number)
{
	echo "The Amount of Stock Not Available";die;
}
$staff_stock_val = $staff_assign_number * $price;
$date = date("Y-m-d H:i:s");
$u_id=$_POST['users'];


if($u_id){

$userselect="SELECT * FROM am_users WHERE `id`=$u_id";
$userquery=mysqli_query($conn,$userselect);
$userres=mysqli_fetch_assoc($userquery);

$user_id=$userres['id'];
$user_name=$userres['name'];

$oldAseet = "SELECT * from am_asset_staff where `asset_id` =$assetId and `user_id` = $u_id";
$oldAssetQuery = mysqli_query($conn,$oldAseet);
$oldAssetData=mysqli_fetch_assoc($oldAssetQuery);
$prev_staff_stock_Val = $oldAssetData['number_assign_product'];
$prev_staff_stock_Amount = $oldAssetData['assign_asset_total_amount'];
$total_Staff_stock = $prev_staff_stock_Val + $staff_assign_number;
$total_Staff_stock_amount = $prev_staff_stock_Amount + $staff_stock_val;

if($oldAssetData)
{
	$assignAsset = "UPDATE `am_asset_staff` set `number_assign_product`= '".$total_Staff_stock."',`assign_asset_total_amount` = '".$total_Staff_stock_amount."',`total_stock_assign` = '".$total_Staff_stock_amount."',  WHERE `id`= '".$oldAssetData['id']."'";
	mysqli_query($conn,$assignAsset);
}
else
{
	$assignAsset = "INSERT into  `am_asset_staff` (asset_id,user_id,number_assign_product,assign_asset_total_amount,total_stock_assign) values ($assetId,$u_id,$total_Staff_stock,$total_Staff_stock_amount,$total_Staff_stock_amount)";
		mysqli_query($conn,$assignAsset);
}



    
$date = date("Y-m-d H:i:s");



if($assignAsset){
$finalNumberStock = $no_of_product - $staff_assign_number;
$finalStockPrice = $finalNumberStock * $price;
    
  
$update = "UPDATE `am_products` set `no_of_product`= '".$finalNumberStock."',`total_stock_price` = '".$finalStockPrice."'  WHERE `id`=$assetId";

    
mysqli_query($conn,$update);


header("Location:admin.php");
    
    
}
    
    
    }
?>
