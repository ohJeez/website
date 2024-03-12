<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Your custom CSS file -->
    <link rel="stylesheet" href="../style.css">
    <style>
        .footer{
            position:absolute;
            bottom:0;

        }


    </style>

    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    





</head>
<body>
    <!-- First child -->
    <!-- Navbar -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
               <img src="../images/logo.jpg" alt="" class="logo"> 
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Second child -->
    <div class="bg-light">
        <h3 class="text-center p-2">Admin Dashboard</h3>
    </div>

    <!-- Third child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
            <div class="px-5">
            <a href="#"><img src="https://www.shutterstock.com/image-vector/black-silhouette-paw-print-isolated-600nw-1042839922.jpg" width="300" height="200" alt="" class="admin_image"></a>
            <p class="text-light text-center">Admin Name</p>
            </div>
            
            <!-- Buttons -->
            <div class="button text-center">
                <button class="my-5"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Products</a></button>
                <button><a href="index.php?insert_categories" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Categories</a></button>
                <button><a href="index.php?insert_breeds" class="nav-link text-light bg-info my-1">Insert Breeds</a></button>
                <button><a href="" class="nav-link text-light bg-info my-1">View Breeds</a></button> 
               <!-- <button><a href="" class="nav-link text-light bg-info my-1">All Orders</a></button> -->
               <!-- <button><a href="" class="nav-link text-light bg-info my-1">All Payments</a></button>-->
               <!-- <button><a href="" class="nav-link text-light bg-info my-1">List Users</a></button> -->
                <!--<button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button> -->
            </div>
        </div>

        <!-- fourth child -->
        <div class="container my-3" >
            <?php
            if(isset($_GET['insert_categories'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_breeds'])){
                include('insert_breeds.php');
            }
            
            ?>
        </div>


    <!-- last child -->
        <div class="bg-info p-3 text-center footer">
           <p>All rights reserved  @- Designed by Petra Official-2023</p>
        </div>
    </div>
    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
