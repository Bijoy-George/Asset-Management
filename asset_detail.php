<?php

require_once("conf.php");


$select= "SELECT p.*,c.cat_name FROM p as am_product LEFT JOIN am_categories as c ON p.categories=c.id";

$query=mysqli_query($conn,$select);

?>
