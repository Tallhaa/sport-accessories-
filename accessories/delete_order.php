<?php
include 'admin/config.php';

$ID = $_GET['id'];

mysqli_query($con,"DELETE FROM `tblorder` WHERE id = $ID");
header('location: view_cart.php');

?>