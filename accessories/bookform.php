<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Ground</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    .card {
        flex-direction: row;
    }
    </style>

</head>

<body>

    <?php include('admin/config.php');
    $id = $_GET['id'];
    $run = mysqli_query($con,"SELECT * FROM `tblproduct` WHERE id = $id");
    $post = mysqli_fetch_array($run);
    $name = $post['PName'];
    $price = $post['Price'];
    $image = $post['Pimage'];
    ?>
    <div class="container">
        <div class="row mt-4">
            <div class="card shadow w-50 mx-auto">
                <div class="card-body">
                    <button class="align-left my-3"><a href="view_cart.php">View Cart</a></button>
                    <form action="" method="POST" class="form">
                        <fieldset class="bg-light rounded px-2">
                            <legend class="bg-white">Selected Accessory</legend>
                            <img src="admin/<?php echo $image; ?>" class="card-img-top img-rounded" alt="ground images"
                                style="float:left;width:70px;height:70px; margin-right: 20px;">
                            <h3 class="card-title mt-3 mb-3">Name: <?php echo ucfirst($name);?></h3>
                            <input type="hidden" name="Name" value="<?php echo $name; ?>">
                            <h6 class=" mb-4">Price: <?php echo $price;?></h6>
                            <input type="hidden" name="Price" value="<?php echo $price ?>">
                            <label for="">Quantity</label>
                            <input type="number" name="qty" id="" class="input-responsive" value="1" required>

                        </fieldset>
                        <hr>

                        <fieldset>
                            <legend class="bg-light px-2">Book Details</legend>
                            <div class="form-group">
                                <label for="booking_name" class="mb-2">Your Name</label>
                                <input type="text" name="customer_name" class="form-control mb-2" required>
                            </div>


                            <div class="form-group">
                                <label for="address" class="mb-2">Your Address</label>
                                <input type="text" name="address" class="form-control mb-2" required>
                            </div>
                            <div class="form-group">
                                <label for="contact" class="mb-2">Contact No.</label>
                                <input type="number" name="contact" minlength="11" maxlength="11"
                                    class="form-control mb-2" required>
                            </div>
                            <div class="form-group">
                                <label for="email" class="mb-2">Your Email</label>
                                <input name="email" type="email" class="form-control mb-2" required>
                            </div>
                            <div class="form-group">
                                <input name="cod" class="form-check-input" type="checkbox" value="Cash on Arrival"
                                    id="flexCheckDefault" checked required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    Cash on Arrival
                                </label>
                            </div>
                            <div class="form-group py-3">

                                <button name="booking" class=" btn btn-outline-primary text-center form-control"
                                    type="submit">Confirm
                                    Booking</button>
                            </div>
                        </fieldset>

                    </form>

                </div>
            </div>

        </div>
    </div>


    <?php
        // include db connection
        include 'admin/config.php';


        if(isset($_POST['booking'])){
            $NAME = $_POST['Name'];
            $PRICE = $_POST['Price'];
            $QTY = $_POST['qty'];
            $TOTAL = $PRICE * $QTY;
            $ORDER_DATE = date("Y-m-d h:i:sa");
            $STATUS = "Ordered"; //Booked Request Sent, Book Request Accepted, Book Request Canceled
            $CUSTOMER_NAME = $_POST['customer_name'];
            $CUSTOMER_ADDRESS = $_POST['address'];
            $CUSTOMER_CONTACT = $_POST['contact'];
            $CUSTOMER_EMAIL = $_POST['email'];
            
            
            $COD =$_POST['cod'];

            
            

            // inset data
            mysqli_query($con,"INSERT INTO `tblorder`(`PName`, `Price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `cod`) VALUES ('$NAME','$PRICE','$QTY','$TOTAL','$ORDER_DATE','$STATUS','$CUSTOMER_NAME','$CUSTOMER_CONTACT','$CUSTOMER_EMAIL','$CUSTOMER_ADDRESS','$COD')");
            


        }

    ?>
</body>

</html>