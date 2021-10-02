<?php 


require_once('conf.php');


session_start();
$user_id=$_POST['user_id'];
$asset_user_id=$_POST['asset_user_id'];
$asset_id= $_POST['asset_id'];
$buyerName = $_POST['buyer_name'];
$number_item_sell = $_POST['number_item_sell'];
$no_of_product = $_POST['no_of_product'];
$product_price = $_POST['product_price'];
$items_total_cash = $_POST['items_total_cash'];
$cash_received = $_POST['cash_received'];
if($no_of_product < $number_item_sell)
{
	echo "The Amount of Stock Not Available";die;
}
$sellProductTotalValue = $number_item_sell * $product_price;
$date = date("Y-m-d H:i:s");


if($asset_user_id){

$assetUserSelect="SELECT * FROM am_asset_staff WHERE `id`=$asset_user_id";
$assetUserQuery=mysqli_query($conn,$assetUserSelect);
$assetUserRes=mysqli_fetch_assoc($assetUserQuery);
$totalNoOfProductSell = $number_item_sell + $assetUserRes['no_of_product_sell'];
$totalCashReceived = $cash_received + $assetUserRes['cash_received'];
$totalSellProductVal = $sellProductTotalValue + $assetUserRes['sell_product_total'];
$prev_staff_stock_Val = $assetUserRes['number_assign_product'];
$prev_staff_stock_Amount = $assetUserRes['assign_asset_total_amount'];
$currentStaffStockVal = $prev_staff_stock_Val - $number_item_sell;
$currentStaffStockValAmount = $prev_staff_stock_Amount - $items_total_cash;

$updateStaff = "UPDATE `am_asset_staff` set `no_of_product_sell`= '".$totalNoOfProductSell."',`number_assign_product`= '".$currentStaffStockVal."',`assign_asset_total_amount`= '".$currentStaffStockValAmount."',`total_cash_of_product_sell` = '".$items_total_cash."' ,`sell_product_total` = '".$totalSellProductVal."' ,`cash_received` = '".$totalCashReceived."',`buyer_name` = '".$buyerName."',`selling_date` = '".$date."' WHERE `id`='".$asset_user_id."'";
mysqli_query($conn,$updateStaff);


header("Location:users_view.php");
    
    
}
    
?>
