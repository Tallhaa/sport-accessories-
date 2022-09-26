<?php
include 'config.php';

$ID  = $_GET['id'];

mysqli_query($con,"DELETE FROM `tblproduct` WHERE id = $ID");
header('location: index.php');

?>