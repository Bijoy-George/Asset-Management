<?php 
$select= "SELECT * FROM am_categories";
$query = mysqli_query($conn,$select);    
?>
<div id="nav_bar">
    <div class="container-fluid p-0">
        <div class="row justify-content-between position-relative p-0 no-gutters" id="border-style">
            <div class="col-md-3">
                <div class="logo">
                    <a href="admin.php"> <img src="download.jpg" style="width:60px; height:60px" class="img-fluid"></a>
                    <h1>Store Management</h1>
                </div>


            </div>
            <div class="col-md-6">
                <!-- hide it when you small screen is shown -->
                <div class="login-form  p-2 text-right">


                    <a href="logout.php"> <button type="submit" class="submit-button">Logout</button></a>





                </div>

            </div>



        </div>
    </div>
</div>
<div class="container-fluid p-0">
    <div class="row no-gutters p-0">
        <div class="col-2 p-0 emp_style">
            <a href="admin.php">
                <h3 id="jeena" class="text-center">Dashboard</h3>
            </a>
            <ul class="emp_nav" style="
">


                <li class="side-menu ml-1 dropdown">
                    <span class="fa fa-briefcase p-2 icon-color"></span><a data-toggle="collapse" href="#assets_av" role="button" aria-controls="assets_av" class="link-menu">Assets</a>

                    <ul class="emp_nav ml-3 collapse" id="assets_av">
                        <li class="link">
                            <span class="fa fa-plus p-2 icon-color"></span><a href="#assets_form" class="link-menu" data-toggle="modal" role="button">Add</a>
                        </li>
                        <li>
                            <span class="fa fa-eye p-1 icon-color"></span> <a href="admin.php" class="link-menu">View</a>
                        </li>
                    </ul>
                </li>



                <li class="side-menu ml-1 dropdown">
                    <span class="fa fa-user-circle  p-2 icon-color"></span><a data-toggle="collapse" href="#users_av" role="button" aria-controls="users_av" class="link-menu">Staff</a>

                    <ul class="emp_nav ml-3 collapse" id="users_av">
                        <li class="link">
                            <span class="fa fa-plus p-2 icon-color"></span><a href="#users_form" class="link-menu" data-toggle="modal" role="button">Add</a>
                        </li>
                        <li>
                            <span class="fa fa-list icon-color"></span> <a href="staff_list.php" class="link-menu">Staff List</a>
                        </li>
                        <li>
                            <span class="fa fa-eye p-1 icon-color"></span> <a href="users_view.php" class="link-menu">Staff Transactions</a>
                        </li>
                         <li>
                            <span class="fa fa-calendar icon-color"></span> <a href="staff_report.php" class="link-menu">Report</a>
                        </li>
                    </ul>
                </li>

               <!--  <li class="side-menu ml-1 dropdown">
                    <span class="fa fa-bars p-2 icon-color"></span><a data-toggle="collapse" href="#cat_av" role="button" aria-controls="cat_av" class="link-menu">Categories</a>

                    <ul class="emp_nav ml-3 collapse" id="cat_av">
                         <li class="link">
                            <span class="fa fa-plus p-2 icon-color"></span><a href="#cat_form" class="link-menu" class="link-menu" data-toggle="modal" role="button">Add</a>
                        </li>
                        <li>
                            <span class="fa fa-eye p-1 icon-color"></span> <a href="a_cat.php" class="link-menu">View</a>
                        </li>
                    </ul>
                </li> -->
            </ul>


        </div>


        <!--Button trigger modal 
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

        <!-- Modal -->
        <div class="modal fade" id="cat_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="assets_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Assets</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row justify-content-center my-2">
                                <div class="product_style col-12">
                                    <form method="post" action="send_product.php" id="log" enctype="multipart/form-data">

                                        <div class="form-group">
                                            <label> Name of Asset </label>
                                            <input type="text" class="form-control" required value="" name="a_product" placeholder="Type Product Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Asset Price</label>
                                            <input type="text" class="form-control" required value="" name="a_price" id="a_price" placeholder="Type Product Price" onblur="findStockValue();">
                                        </div>
                                        <div class="form-group">
                                            <label>No of Items</label>
                                            <input type="text" class="form-control" required value="" name="a_number" id="a_number" placeholder="" onblur="findStockValue();">
                                        </div>
                                        <div class="form-group">
                                            <label>Total Stock In Cash</label>
                                            <input type="text" class="form-control" required value="" name="toal_stock_value" id="toal_stock_value" readonly>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label> Asset Categories </label>
                                            <select class="form-control" name="categories_id">
      
        <?php while($type=mysqli_fetch_assoc($query)) { ?>
        
        <option value="<?php echo $type['id']?>"><?php echo $type['cat_name']; ?></option>
        
        <?php } ?>
    </select>

                                        </div> -->
                                        <!-- <span class="fa fa-plus p-2 icon-color"></span><a data-toggle="collapse" href="#add_cat" role="button" aria-controls="add_cat" class="link-menu text-secondary">Add New Categories </a> -->
                                        <div class="form-group collapse" id='add_cat'>
                                            <label> Name of category </label>

                                            <input type="text" value="" class="form-control" name="a_cat" placeholder="Type a Category">

                                        </div>
                                        <input type="hidden" value="<?php echo 'AVAILABLE' ?>" name="status" placeholder="Type Product Name">


                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Add New Asset</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="modal fade" id="users_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Users</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="send.php">
                            <div class="form-group">
                                <label for="usernameofEmployee">Full Name :  </label>
                                <input type="text" name="emp_name" value="" placeholder="Enter your Name" required class="form-control">

                            </div>


                            <input type="hidden" name="emp_id" value="">



                            <?php if (isset($_GET['msg']) && $_GET['msg']==2) {
            ?>
                            <p> User already Exists! Please try a different id</p>

                            <?php } ?>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add New User</button>
                            </div>
                        </form>


                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="cat_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add New User</button>
                    </div>
                </div>
            </div>
        </div>
<script type="text/javascript">
    function findStockValue()
    {
        var a_price = $('#a_price').val();
        var a_number = $('#a_number').val();
        var toal_stock_value = 0;
        toal_stock_value = (a_price) * (a_number);
        $('#toal_stock_value').val(toal_stock_value);
    }

    
</script>