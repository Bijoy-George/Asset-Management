<?php

require_once("conf.php");

$a_cat  =  $_POST ['a_cat'];

$insert = "INSERT INTO `am_categories`(`id`, `cat_name`) VALUES ('','".$a_cat."')";

mysqli_query($conn,$insert);

header("Location:a_cat.php");


?>
