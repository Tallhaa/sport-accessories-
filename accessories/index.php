<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center py-3">Accessories Booking</h1>
    <div class="container py-5">
        <div class="row mt-4">


            <?php 
            include 'admin/config.php';
            $pic = mysqli_query($con,"SELECT * FROM `tblproduct`");
            while($row = mysqli_fetch_array($pic))
            {
                ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <img src="admin/<?php echo $row['Pimage']?>" class="card-img-top img-rounded"
                            alt="ground images">

                        <h6 class="mt-2"><b>Name:</b></h6>

                        <h3 class="card-title mt-1 mb-3 text-primary"> <?php echo ucfirst($row['PName']);?>
                        </h3>
                        <h6 class="mt-2"><b>Category:</b></h6>
                        <h3 class="mt-3 mb-3 text-dark"><?php echo ucfirst($row['PCategory']);?></h3>
                        <h6 class="mb-4 text-danger">Rs: <?php echo $row['Price'];?></h6>
                        <a href="bookform.php?id=<?php echo $row['id']?>"
                            class="btn btn-lg btn-block btn-warning shadow-none w-100">Add to Cart</a>

                    </div>
                </div>
            </div>
            <?php
            }
            
            
            
            
            ?>


        </div>
    </div>
</body>

</html>