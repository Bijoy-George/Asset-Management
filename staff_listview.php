<?php 


 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    


if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '' ){
    
   
    

require_once("conf.php");
require_once("dash_header.php");
require_once("a_sidebar.php");



$select= "SELECT * from am_users";

    $query = mysqli_query($conn,$select);

?>

<div class="table">

    <table id="uTable">
        <thead class="text-center">

            <th> Sr no </th>
            <th> Staff Name</th>
            <th> Action</th>

        </thead>
        <tbody class="text-center">
            <?php $i = 0; while($res=mysqli_fetch_assoc($query)){

            
            ?>
            <tr>
                <td>
                    <?php echo ++$i; ?>
                </td>
                <td>
                    <?php echo $res['name']; ?>
                </td>
                <td>
                    <a href="u_delete.php?id=<?php echo $res['id'];?>" class="btn btn-danger border-1 p-2 border-dark"><i class="fa fa-trash-o text-white " aria-hidden="true"></i>Delete</a>
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
<?php include("footer.php");?>

<?php    }


else {

header("Location:login.php");

}
