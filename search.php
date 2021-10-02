<?php

require_once("conf.php");




        
$search = $_POST['search'];
$select = "SELECT  p.*, c.cat_name FROM am_products as p LEFT JOIN am_categories as c ON p.categories=c.id WHERE `name` LIKE '%".$search."%' OR `cat_name` LIKE '%".$search."%' ";

$query = mysqli_query($conn,$select);

session_start();

$username=$_SESSION['user_name']."<br>";
$user_status="being used by ".$username."<br>";

?>



    <?php $i=0; while($res=mysqli_fetch_assoc($query)){ 
    
  
    
?>
    <tr>
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
            
            } 
            
          elseif ($res['status'] == $user_status) {
              
              echo "YOU ARE USING IT";
          }
        
        else {
            
            echo $res["status"];
        }                                                   
            
            ?>

        </td>

        <td>

            <?php if ($res['status'] !='AVAILABLE'){ ?>

            <?php if ($res['status'] == $user_status){ ?>

            <a href="remove_product.php?id=<?php echo $res['id'];?>">Remove</a></td>

        <?php } else { ?>

        <p>Being Used</p>
        </td>

        <?php  } ?>


        <?php } else {?>

        <a href="add_product.php?id=<?php echo $res['id'];?>">Add</a> </td>


        <?php } ?>





    </tr>


    <?php } ?>
