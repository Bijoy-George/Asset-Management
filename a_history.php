<?php 

require_once("conf.php");

$id=$_POST['id'];

$select= "SELECT * from am_status WHERE asset_id=".$id;

$query = mysqli_query($conn,$select);


?>


<div class="table">

    <table id="hisTable">

        <thead class="text-center">

            <th> Sr no </th>
            <th> User Name</th>
            <th> User ID</th>

            <th>Time</th>



        </thead>
        <tbody class="text-center">
            <?php $i = 0; while($res=mysqli_fetch_assoc($query)){   ?>




            <tr>

                <td>
                    <?php echo ++$i ; ?>
                </td>

                <td>
                    <?php echo $res['user_name'];?>
                </td>

                <td>
                    <?php echo $res['user_id']; ?>
                </td>
                <td>
                    <?php echo $res['date_time']; ?>
                </td>



            </tr>

            <?php } ?>

        </tbody>
    </table>
</div>