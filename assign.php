<?php 

require_once("conf.php");


$id=$_POST['id'];

$select="SELECT * from am_products WHERE `id`=$id";
$query=mysqli_query($conn,$select);

$res=mysqli_fetch_assoc($query);

?>
<div id="assign_modal">
    <div class="container-fluid">
        <h5 class="text-center">
            Asset Name :
            <?php  echo $res['name']?>
        </h5>
        <h5 class="text-center">
            Asset Price :
            <?php  echo $res['price']?>
        </h5>
        <h5 class="text-center">
            Total Items In Stock :
            <?php  echo $res['no_of_product']?>
        </h5>
        <div class="row justify-content-center">
            <?php 
      
      $select_user="SELECT * from am_users where `role` = 2";
      $query_user=mysqli_query($conn,$select_user);
    
          
      
      
      
      ?>

            <form method="post" action="add_product.php">

                <div class="form-group">

                    <select class="form-control" name="users">
                    <option value="">Select Staff</option>
                <?php $i=0; while($res_user=mysqli_fetch_assoc($query_user)){?> 
             <option value="<?php echo $res_user['id'];?>"><?php echo $res_user['name'];?></option>
           <?php   } ?>
          </select>
                    <input type="hidden" name="id" value="<?php echo $res['id']; ?>" />



                </div>
                     <div class="form-group">
                    <label>Number Assigned To Staff</label>
                    <input type="text"  class="form-control" required value="" name="staff_assign_number" id="staff_assign_number" placeholder="" onblur="findStockVal();">
                    <span id="val_msg" style="color: red"></span>
                    </div>
                    <input type="hidden" name="no_of_product" value="<?php echo $res['no_of_product']?>">
                    <input type="hidden" name="product_price" value="<?php echo $res['price']?>">
                    <div class="form-group">
                    <label>Total stock in Cash Assigned To Staff </label>
                    <input type="text"  class="form-control" required value="" name="staff_stock_val" id="staff_stock_val" placeholder="" readonly>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Assign Assets</button>
                </div>
            </form>
        </div>


    </div>


</div>


</div>
<script type="text/javascript">
    function findStockVal()
    {
        var totalItem ='<?php echo $res['no_of_product'] ;?>';
        var staff_assign_number = $('#staff_assign_number').val();
        var price = '<?php echo $res['price'] ;?>';
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
        $('#staff_stock_val').val(toal_stock_value);
    }
   
</script>
