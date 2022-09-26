<?php
// include db connection
include 'config.php';


if(isset($_POST['upload'])){
    $PNAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $PCATEGORY = $_POST['category'];
    $PIMAGE = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    move_uploaded_file($img_loc,'uploadimage/'.$img_name);

    // inset data
    mysqli_query($con,"INSERT INTO `tblproduct`(`PName`, `Price`, `Pimage`, `PCategory`) VALUES ('$PNAME','$PRICE','$img_des','$PCATEGORY')");
    header('location: index.php');
    

}

?>