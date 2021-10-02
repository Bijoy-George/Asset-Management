<?php 

require_once("conf.php");

$id=$_POST['id'];

$select= "SELECT * from am_products WHERE id=".$id;

$query = mysqli_query($conn,$select);

$res= mysqli_fetch_assoc($query);

$select1 = "SELECT * from am_categories";

$query1 = mysqli_query($conn,$select1);

?>




<form method="post" action="a_update.php" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $res['id'] ?>">
    <div class="form-group">
        <label> Name of Asset </label>
        <input type="text" class="form-control" required value="<?php echo $res['name'] ?>" name="a_product" placeholder="Type Product Name">
    </div>
    <div class="form-group">
        <label> Asset Price </label>
        <input type="text" min="0" id="e_price" class="form-control" value="<?php echo $res['price'] ?>" name="e_price" placeholder="" onblur="findStockValue();">
    </div> 
    <div class="form-group">
        <label> No of Items </label>
        <input type="text" min="0" class="form-control" value="<?php echo $res['no_of_product'] ?>" name="e_number" id="e_number" placeholder="" onblur="findStockValue();">
    </div>
    <div class="form-group">
        <label> Total Stock In Cash</label>
        <input type="text"   id="e_toal_stock_value" class="form-control" value="<?php echo $res['total_stock_price'] ?>" placeholder="" readonly> 
    </div>


    <!-- <div class="form-group">
        <label>Asset Image </label>
        <input type="file" value="" class="form-control" name="a_img" id="up_img">
    </div> -->
    <!-- <div class="form-group">
        <label> Asset Categories </label>
        <select class="form-control" name="categories_id">
      
        <?php while($type=mysqli_fetch_assoc($query1)) { ?>
        
        <option value="<?php echo $type['id']?>"><?php echo $type['cat_name']; ?></option>
                 
                          
        
        
        <?php } ?>
    </select>

    </div> -->
    <!-- span class="fa fa-plus p-2 icon-color"></span><a data-toggle="collapse" href="#edit_cat" role="button" aria-controls="edit_cat" class="link-menu text-secondary">Add New Categories </a>
    <div class="form-group collapse" id='edit_cat'>
        <label> Name of category </label>

        <input type="text" value="" class="form-control" name="a_cat" placeholder="Type a Category">

    </div> -->
     <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>


</form>

<script type="text/javascript">
    function findStockValue()
    {
        var e_price = $('#e_price').val();
        var e_number = $('#e_number').val();
        var e_toal_stock_value = 0;
        e_toal_stock_value = (e_price) * (e_number);
        $('#e_toal_stock_value').val(e_toal_stock_value);
    }

    
</script>
