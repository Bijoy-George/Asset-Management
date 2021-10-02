<?php 

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !='') {
    


require_once('conf.php');
require_once("dash_header.php");
require_once("a_sidebar.php");




?>


<?php include("header.php"); ?>
<?php require_once("a_sidebar.php");?>

<div class="col-10 p-3" id="grey">
    <h3 class="text-center"> All Transactions </h3>
    <?php require_once("a_users.php"); ?>

</div>
</div>
</div>



<?php }    else {
    
    header("Location:login.php?msg=2");
    
    }

?>

<!--admin navigation must have three menu to  add/view  categories, products and employee-->


<!-- shows numbers of categories you have, no of products you have and the number of employees you have -->
