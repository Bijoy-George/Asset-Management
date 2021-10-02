<?php 

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !='') {
require_once('conf.php');
require_once("dash_header.php");
require_once("a_sidebar.php");
include("header.php"); 
require_once("a_sidebar.php");?>

<div class="col-10 p-3" id="grey">
    <h3 class="text-center"> All Assets </h3>
    <?php require_once("a_viewproduct.php"); ?>

</div>
</div>
</div>
<?php }else {
    
    header("Location:index.php?msg=2");
    
    }

?>
