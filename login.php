<?php
require_once('conf.php');
require_once('header.php');
?>
<div class="reg_form">
    <!-- form that will be show on the right -->

    <h3 class=""> Login </h3>
    <form method="post" action="login_check.php">

        <?php   if (isset($_GET['msg']) && $_GET['msg']==1){ ?>
        <p> Please Enter correct login details signin</p>

        <?php   }  ?>
        <div class="form-group gap">
            <label for="usernameofEmployee">Username: </label>
            <input type="text" name="u_email" required value="" placeholder="Enter your Username" required="" class="input-box">

        </div>

        <div class="form-group gap">
            <label for="passwordofEmployee">Password :  </label>
            <input type="password" name="u_pass" value="" required placeholder="Enter your Password" class="input-box">
        </div>

        <button type="submit" class="submit-button"> Submit </button>


    </form>



</div>
