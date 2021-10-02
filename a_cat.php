<?php 


require_once("conf.php");
require_once("header.php");
require_once("a_sidebar.php");

$select = "SELECT * FROM am_categories";

$query = mysqli_query($conn,$select);

?>


<div class="col-10">
    <div class="cat-form text-center my-3">
        <form method="post" action="send_cat.php">

            <div class="form-group">

                <label> Add a category </label>

                <input type="text" value="" name="a_cat" placeholder="Type a Category">
                <button type="submit" value="submit" class="btn btn-secondary"> Submit</button>

            </div>

        </form>
    </div>

    <div class="cat-table p-3">
        <table id="catTable">
            <thead>

                <th>Sr No </th>
                <th>Category</th>
                <th>Delete or Update</th>

            </thead>
            <tbody>
                <?php $i= 0; while($res=mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td>
                        <?php echo ++$i;?>
                    </td>
                    <td>
                        <?php echo $res['cat_name'];?>
                    </td>
                    <td>
                        <a href="cat_delete.php?id=<?php echo $res[ 'id'];?>"> Delete</a>
                    </td>

                    <?php } ?>
                </tr>

            </tbody>
        </table>
    </div>
</div>
<?php require_once("footer.php"); ?>
