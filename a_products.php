<?php 


session_start();

if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '' ){
    
   
    

require_once("conf.php");
require_once("dash_header.php");
require_once("a_sidebar.php");



$select= "SELECT * FROM am_categories";
$query = mysqli_query($conn,$select);

    
    
?>





<!--admin dashboard should show add categories option - add product option - and add employee option plus he should have the option
to edit any particular product--->


<div class="container-fluid">
    <div class="row justify-content-center my-5">
        <div class="product_style">
            <form method="post" action="send_product.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label> Name of Product </label>
                    <input type="text" value="" name="a_product" placeholder="Type Product Name">
                </div>
                <div class="form-group">
                    <label> Product Description</label>
                    <textarea name="a_des" value="">enter your text here
        
    </textarea>

                </div>
                <div class="form-group">
                    <label>Product Image </label>
                    <input type="file" value="" name="a_img" placeholder="Type Product Name">

                    <?php 
    
    if (isset($_GET['msg']) && $_GET['msg'] == 1){
        
        echo "<p>Please upload a image file"; 
    } 
    ?>
                </div>
                <div class="form-group">
                    <label>Product Categories</label>
                    <select name="categories_id">
        <?php while($type=mysqli_fetch_assoc($query)) { ?>
        <option value="<?php echo $type['id']?>"><?php echo $type['cat_name']; ?></option>
        <?php } ?>
    </select>
                </div>

                <input type="submit" value="submit" />



            </form>
        </div>
    </div>
</div>


<?php    }



else {

header("Location:login.php");

}
