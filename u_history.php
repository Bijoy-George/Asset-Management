<?php 

require_once("conf.php");

$id=$_POST['id'];


$select= "SELECT s.*,p.name FROM am_status as s LEFT JOIN am_products as p ON s.asset_id=p.id WHERE user_id=$id";


$query = mysqli_query($conn,$select);


?>


<div class="table">

    <table id="U_Table">

        <thead class="text-center">

            <th> Sr no </th>
            <th> Asset Name</th>
            <th>Time</th>



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

                <td>
                    <?php echo $res['date_time']; ?>
                </td>



            </tr>

            <?php } ?>

        </tbody>
    </table>
</div>
