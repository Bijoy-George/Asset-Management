<?php 


require_once("conf.php");
require_once("dash_header.php");
require_once("e_sidebar.php");




?>





<form method="post" action="search.php">
    <input type="text" value="" placeholder="Search a product or category">
</form>


<table>
    <thead>
        <th> Sr No</th>
        <th>Product Name </th>
        <th> Product Category</th>
        <th>Status</th>
        <th> Add/Product</th>

        <!--- if clicked on ADD , add the product and change the value to being used and  give an option to remove the product -->
        <!--- if the product is being used the entry in the status would be changed,a date and time stamp would be created and the add button would be replaced by remove  with an alert are you sure you want to remove the item-->
        <!-- if the status of the product is used and any other user joins in he would not be able to see the add or remove button -->

    </thead>
    <tbody>

        <tr>
            <td>
                <?php echo $res["id"];?>
            </td>

        </tr>

    </tbody>
</table>
