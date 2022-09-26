<?php
include 'config.php';
if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $PNAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $PCATEGORY = $_POST['category'];
    $PIMAGE = $_FILES['image'];
    $img_loc = $_FILES['image']['tmp_name'];
    $img_name = $_FILES['image']['name'];
    $img_des = "uploadimage/".$img_name;
    move_uploaded_file($img_loc,'uploadimage/'.$img_name);
    

    if($img_name!="")
    {
        move_uploaded_file($img_loc,'uploadimage/'.$img_name);
        mysqli_query($con,"UPDATE `tblproduct` SET `PName`='$PNAME',`Price`='$PRICE',`Pimage`='$img_des',`PCategory`='$PCATEGORY' WHERE id='$ID' ");
        header('location: index.php');
    }
    else
    {
        mysqli_query($con,"UPDATE `tblproduct` SET `PName`='$PNAME',`Price`='$PRICE',`PCategory`='$PCATEGORY' WHERE id='$ID' ");
        header('location: index.php');
    }


    

}

?>