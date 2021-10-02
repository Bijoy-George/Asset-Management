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
    am_users.name as username,am_asset_staff.number_assign_product,sum(am_asset_staff.total_stock_assign) as toal_assign ,am_asset_staff.no_of_product_sell,am_asset_staff.cash_received,sum(cash_received) as total_cash_received,am_asset_staff.assign_asset_total_amount,sum(am_asset_staff.assign_asset_total_amount) as assign_total,am_asset_staff.sell_product_total,sum(sell_product_total) as total_sell_product,am_asset_staff.buyer_name,
    am_asset_staff.asset_id,am_products.name as product_name,am_products.price,am_asset_staff.id as product_id
FROM
    am_asset_staff
LEFT JOIN am_users ON 
    am_users.id = am_asset_staff.user_id LEFT JOIN
    am_products ON 
    am_products.id = am_asset_staff.asset_id GROUP BY am_asset_staff.user_id ";

    $query = mysqli_query($conn,$select);

?>

<div class="table">

    <table id="uTable">
        <thead class="text-center">

            <th> Sr no </th>
            <th> Staff Name</th>
            <th>Total Stock Assinged In Cash</th>
            <th>Total Stock In Hand</th>
            <th>Total Stock Sell in cash</th>
            <th>Toal Cash Received</th>
            <th>Balance Cash</th>

        </thead>
        <tbody class="text-center">
            <?php $i = 0; while($res=mysqli_fetch_assoc($query)){
            ?>
            <tr>
                <td>
                    <?php echo ++$i; ?>
                </td>
                <td>
                    <?php echo $res['username']; ?>
                </td>
                 <td>
                    <?php echo $res['toal_assign']; ?>
                </td> 
                <td>
                    <?php echo $res['assign_total']; ?>
                </td> 
                <td>
                    <?php echo $res['total_sell_product']; ?>
                </td>
                <td>
                    <?php echo $res['total_cash_received']; ?>
                </td>
                <td>
                    <?php echo $res['total_sell_product'] - $res['total_cash_received']; ?>
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
