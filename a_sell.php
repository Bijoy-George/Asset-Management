<?php 

require_once("conf.php");


$user_id=$_POST['user_id'];
$productName=$_POST['productName'];
$price=$_POST['price'];
$assignedNumber=$_POST['assignedNumber'];   
$asset_id=$_POST['asset_id'];   

$select="SELECT * from am_asset_staff WHERE `user_id`=$user_id and `asset_id` = $asset_id";
$query=mysqli_query($conn,$select);

$res=mysqli_fetch_assoc($query);

?>
<div id="assign_modal">
    <div class="container-fluid">
        <h5 class="text-center">
            Asset Name :
            <?php  echo $productName?>
        </h5>
        <h5 class="text-center">
            Asset Price :
            <?php  echo $price?>
        </h5>
        <h5 class="text-center">
            Number of Stock In Hand :
            <?php  echo $assignedNumber?>
        </h5>
        <div class="row justify-content-center">
            <?php 
      
      $select_user="SELECT * from am_users where `role` = 2";
      $query_user=mysqli_query($conn,$select_user);
    
          
      
      
      
      ?>

            <form method="post" action="sell_product.php">

                <div class="form-group">
                    <input type="hidden" name="user_id" value="<?php echo $res['user_id']; ?>" />
                    <input type="hidden" name="asset_user_id" value="<?php echo $res['id']; ?>" />



                </div>
                    <div class="form-group">
                    <label>Buyer Name</label>
                    <input type="text"  class="form-control" value="" name="buyer_name" id="buyer_name">
                    </div>
                     <div class="form-group">
                    <label>Number of Item Sell</label>
                    <input type="text"  class="form-control" required value="" name="number_item_sell" id="number_item_sell" placeholder="" onblur="findStockVal();">
                    <span id="val_msg" style="color: red"></span>
                    </div>
                    <input type="hidden" name="no_of_product" value="<?php echo $res['number_assign_product']?>">
                    <input type="hidden" name="product_price" value="<?php echo $price ?>">
                    <input type="hidden" name="asset_id" value="<?php echo $asset_id ?>">
                    <div class="form-group">
                    <label>Items Total Cash</label>
                    <input type="text"  class="form-control" required value="" name="items_total_cash" id="items_total_cash" placeholder="" readonly>
                    </div>
                    <div class="form-group">
                    <label>Cash Received</label>
                    <input type="text"  class="form-control" required value="" name="cash_received" id="cash_received" placeholder="">
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sell Assets</button>
                </div>
            </form>
        </div>


    </div>


</div>


</div>
<script type="text/javascript">
    function findStockVal()
    {
        var totalItem ='<?php echo $res['number_assign_product'] ;?>';
        var staff_assign_number = $('#number_item_sell').val();
        var price = '<?php echo $price ;?>';
        if(parseInt(staff_assign_number) > parseInt(totalItem))
        {
            $('#val_msg').html('The Amount of Stock Not Available');
            return false;
        }
        else
        {
            $('#val_msg').html('');
        }
        var toal_stock_value = 0;
        toal_stock_value = (price) * (staff_assign_number);
        $('#items_total_cash').val(toal_stock_value);
    }
   
</script>
