<?php 


 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    


if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '' ){
    
   
    

require_once("conf.php");
require_once("dash_header.php");
require_once("a_sidebar.php");



$select= "SELECT am_users.id as user_id,
    am_users.name as username,am_asset_staff.number_assign_product,am_asset_staff.no_of_product_sell,am_asset_staff.cash_received,am_asset_staff.assign_asset_total_amount,am_asset_staff.sell_product_total,am_asset_staff.buyer_name,am_asset_staff.selling_date,
    am_asset_staff.asset_id,am_products.name as product_name,am_products.price,am_asset_staff.id as product_id
FROM
    am_asset_staff
LEFT JOIN am_users ON 
    am_users.id = am_asset_staff.user_id LEFT JOIN
    am_products ON 
    am_products.id = am_asset_staff.asset_id";

    $query = mysqli_query($conn,$select);

?>

<div class="table">

    <table id="uTable">
        <thead class="text-center">

            <th> Sr no </th>
            <th> Staff Name</th>
            <th>Assign Asset Name</th>
            <th>Asset Price</th>
            <th>No Of Products In Hand</th>
            <th>Cash in Hand Total Stock</th>
            <th>No Of Products Sell</th>
            <th>Seling Date</th>
            <th>Buyer Name</th>
            <th>Toal Cash Received</th>
            <th>Balance Cash</th>
            <!-- <th> User's ID</th> -->

            <th>Sell</th>

        </thead>
        <tbody class="text-center">
            <?php $i = 0; while($res=mysqli_fetch_assoc($query)){
                $selling_date = $res['selling_date'];
            ?>
            <tr>
                <td>
                    <?php echo ++$i; ?>
                </td>
                <td>
                    <?php echo $res['username']; ?>
                </td>
                 <td>
                    <?php echo $res['product_name']; ?>
                </td>
                 <td>
                    <?php echo $res['price']; ?>
                </td>
                <td>
                    <?php echo $res['number_assign_product']; ?>
                </td>
                 <td>
                    <?php echo $res['assign_asset_total_amount']; ?>
                </td>
                 <td>
                    <?php echo $res['no_of_product_sell']; ?>
                </td>
                <td style="font-size: 10px;font-weight: bold;" >
                    <?php 
                    if($selling_date)
                    {
                    echo date('d-m-Y', strtotime($selling_date));
                    }
                    ?>
                    
                </td>
                <td>
                    <?php echo $res['buyer_name']; ?>
                </td>
                <td>
                    <?php echo $res['cash_received']; ?>
                </td>
                <td>
                    <?php echo $res['sell_product_total'] - $res['cash_received']; ?>
                </td>

                <td>
                    <p>
                        <a href="javascript;" data-toggle="modal" class="asset_sell btn btn-warning p-2 text-white border-1 border-dark" assign="<?php echo $res['user_id'];?>" product-name ="<?php echo $res['product_name'];?>" asset_id = "<?php echo $res['asset_id'];?>" price ="<?php echo $res['price'];?>" number-assign-product = "<?php echo $res['number_assign_product'];?>"  data-target="#asset_sell"><i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i>Sell To Persons</a>
                        <!-- <?php if($res['name'] !== "admin"){ ?>
                        <a href="u_delete.php?id=<?php echo $res['id'];?>"><i class="fa fa-trash-o text-danger m-1" aria-hidden="true"></i></a> -->
                    </p>
                    <?php } ?>
                </td>



            </tr>

            <?php } ?>

        </tbody>
    </table>
</div>

<!-- USER HISTORY MODAL-->

<div class="modal fade" id="u_history_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Users History</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="asset_sell" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sell Assets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">


            </div>
        </div>
    </div>
</div>

<?php include("footer.php");?>

<?php    }


else {

header("Location:login.php");

}
