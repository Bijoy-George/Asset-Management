<?php 
 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '' ){
require_once("conf.php");
require_once("dash_header.php");
require_once("a_sidebar.php");
$select= "SELECT * FROM am_products";
$query = mysqli_query($conn,$select);

?>
<div class="table">

    <table id="myTable">

        <thead class="text-center">

            <th> Sr no </th>
            <th> Product Name</th>
            <th>Price</th>
            <th>Number Of Items</th>
            <th>Total Stock In Cash</th>
            <th> Update or Delete</th>
            <!-- <th> Status</th> -->


        </thead>
        <tbody class="text-center">
            <?php $i = 0; while($res=mysqli_fetch_assoc($query)){   ?>




            <tr>


                <td>
                    <?php echo ++$i ; ?>
                </td>

                <td>
                    <?php echo $res['name'];?>
                </td>

                <!--  <td>
                   <?php  /*echo $res['description']; */?> 
                </td> -->
                <td>
                    <?php echo $res['price']; ?>
                </td>
                 <td>
                    <?php echo $res['no_of_product']; ?>
                </td>
                 <td>
                    <?php echo $res['total_stock_price']; ?>
                </td>
                <td>
                    <p>
                         <a href="javascript;" data-toggle="modal" class="edit-asset btn btn-warning p-2 text-white border-1 border-dark" assign="<?php echo $res['id'];?>" data-target="#assets_edit_form"><i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i>Edit</a>

                        <a href="javascript;" data-toggle="modal" class="asset-assign btn btn-warning p-2 text-white border-1 border-dark" assign="<?php echo $res['id'];?>" data-target="#assign_form"><i class="fa fa-pencil-square-o text-white" aria-hidden="true"></i>Assign To Staff</a>


                        <a href="a_delete.php?id=<?php echo $res['id'];?>" class="btn btn-danger border-1 p-2 border-dark"><i class="fa fa-trash-o text-white " aria-hidden="true"></i>Delete</a>


                    </p>
                </td>
              <!--   <td>
                    <?php echo $res['status'];?>
                </td> -->


            </tr>

            <?php } ?>

        </tbody>
    </table>
</div>






<!--- ASSIGN FORM MODAL-->
<div class="modal fade" id="assign_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Assign Assets</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">


            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="assets_edit_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edir Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">


            </div>
        </div>
    </div>
</div>
<!--- EDIT FORM MODAL-->

<div class="modal fade" id="history_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



<?php require_once("footer.php");?>

<?php    }


else {

header("Location:login.php");

}
