<?php include("header.php"); ?>


<div id="hero_banner">
    <div class="background-content row">
        <div class="reg_form text-center px-2 col-4">
            <!-- form that will be show on the right -->

            <h3 class="" style="
    font-size: 20px;
">Login to
                <div class="logo">
                    <img src="download.jpg" style="width:60px; height:60px" class="img-fluid">
                    <h1>Store Management</h1>
                </div>
            </h3>
            <form method="POST" action="login_check.php">

                <?php if (isset($_GET['msg']) && $_GET['msg']==1){ ?>
                <p> Please Enter correct login details signin</p>

                <?php } ?>
                <?php if (isset($_GET['msg']) && $_GET['msg']==2){ ?>
                <p> Please Login to access</p>

                <?php } ?>
                <div class="form-group col-9 mx-auto py-2">
                    <label for="usernameofEmployee">Login :</label>
                    <input type="text" name="u_email" value="" required placeholder="Enter your ID" class="input-box">
                </div>

                <div class="form-group  col-9 mx-auto py-2">
                    <label for="passwordofEmployee">Password :</label>
                    <input type="password" name="u_pass" value="" required placeholder="Enter your Password" class="input-box">

                </div>
                <button type="submit" class="submit-button"> Submit </button>

            </form>



        </div>

    </div>

</div>





</div>

</body>

</html>
