<div class="row">

    <div class="col-2 emp_style">

        <ul class="emp_nav text-center" style="
">

            <h3> Hello
                <?php echo $_SESSION['user_name'];?>
            </h3>
            <li class="side-menu">
                <a href="item_use.php" class="link-menu">IN USE</a>
            </li>
            <li class="side-menu">
                <a href="item_available.php" class="link-menu">AVAILABLE</a>
            </li>
            <li class="side-menu">
                <a href="item_no_available.php" class="link-menu">BEING USED BY OTHERS</a>
            </li>



        </ul>


    </div>
