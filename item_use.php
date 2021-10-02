<?php 
require_once('conf.php');
session_start();
    
    if (isset($_SESSION['user_id']) && $_SESSION['user_id'] != '') {
       $username=$_SESSION['user_name'];
 
       $user_status="being used by ".$username;
       $userid = $_SESSION['user_id'];

$select = "SELECT  p.*, c.cat_name FROM am_products as p LEFT JOIN am_categories as c ON p.categories=c.id WHERE `user_name`=$userid";

$query = mysqli_query($conn,$select);      
?>

<?php include("header.php"); ?>

<div id="nav_bar">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-md-3">
                <div class="logo">
                    <img src="logo.png" style="width:60px; height:60px" class="img-fluid">
                    <h1>Assets Management</h1>
                </div>


            </div>
            <div class="col-md-6">
                <!-- hide it when you small screen is shown -->
                <div class="login-form text-right">


                    <button type="submit" class="submit-button"><a href="logout.php">Logout</a></button>





                </div>

            </div>



        </div>
    </div>
</div>

<div class="container-fluid">
    <?php require_once("e_sidebar.php"); ?>
    <div class="col-10">
        <div class="form-style my-4 text-center">
            <form>

                <label>Search</label>
                <input type="text" class="searchemp" name="seachbox" id='search' value='' placeholder="Enter a product or category" />




            </form>
        </div>
        <table border="1">

            <thead>


                <th>Sr No</th>
                <th>Product Name </th>
                <th>Product Description</th>
                <th>Product Image</th>
                <th>Product Category</th>
                <th>Status</th>
                <th>Add or Remove</th>


            </thead>

            <tbody>

                <?php $i=0; while($res=mysqli_fetch_assoc($query)){ 
                ?>


                <td>
                    <?php echo ++$i; ?>
                </td>
                <td>
                    <?php echo $res['name']; ?>
                </td>
                <td>
                    <?php echo $res['description']; ?>
                </td>
                <td>
                    <img src="uploads/<?php echo $res['image'];?>" style="width:100px; height=100px;">
                </td>
                <td>
                    <?php echo $res['cat_name']; ?>
                </td>

                <td>
                    <?php if ($res['status'] != $user_status && $res['status'] != 'AVAILABLE'){ 
            
            echo "USING";
            
 } elseif ($res['user_name'] == $userid) { echo "YOU ARE USING IT"; } elseif ($res['user_name'] != $userid && $res['status'] !='AVAILABLE') { echo "USING"; } else { echo $res["status"]; }                                          
            
            ?>

                </td>

                <td>

                    <?php if ($res['status'] !='AVAILABLE'){ ?>

                    <?php if ($res['user_name'] == $userid){ ?>

                    <a href="remove_product.php?id=<?php echo $res['id'];?>">Remove</a></td>

                <?php } else { ?>

                <p>Being Used</p>

                <?php  } ?>


                <?php } else {?>

                <a href="add_product.php?id=<?php echo $res['id'];?>">Add</a> </td>


                <?php } ?>





                <tr>


                    <?php } ?>

                </tr>



            </tbody>



        </table>
    </div>
</div>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
        $('#search').keyup(function() {
            var search = $(this).val();
            $.ajax({

                url: "search.php",
                data: "search=" + search,
                dataType: "HTML",
                type: "POST",
                success: function(call) {

                    $('table tbody').html(call);
                }


            });



        });



    });

</script>


</body>

</html>


<?php } 


else {
    header("Location:login.php?msg=1");
}


?>
