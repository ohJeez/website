<?php
  include("includes/connect.php");
  include('function/common_function.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PETRA </title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <!--  CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="container-fluid p-0">
        <!-- First child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
            <img src="https://www.shutterstock.com/image-vector/black-silhouette-paw-print-isolated-600nw-1042839922.jpg" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="user_review.php">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:100/-</a>
                        </li>
                    </ul>
                    <form class="d-flex"  action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" class='btn btn-outline-light' name="search_data_product">
                    </form>
                </div>
            </div>
        </nav>
        <!-- calling cart function -->
        <?php
        cart();
        ?>

        <!-- Second child -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Welcome guest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </ul>
        </nav>

        <!-- Third child -->
        <div class="bg-light">
            <h3 class="text-center">PETRA</h3>
            <p class="text-center">Discover the new you.Your Happiness is one Wag Away</p>
        </div>

        <!-- Fourth child -->
      
        <div class="row px-3" >
            <div class="col-md-10">
                <!-- Products -->
                <div class="row">
                    
                    
                    
                    <!-- fetching products -->
                    <?php
                    view_details();
                    getunique_cat();
                    getunique_breeds();
                    ?>
                    
                    
                </div>
                <!-- row end -->
       
    </div>
    
            </div>
            <!-- col end -->
       
             <!-- Breeds -->
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Breeds</h4></a>
                    </li>
                    <?php
                        getbreeds();
                    ?>

                
          <!-- Categories -->
                
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>

                    <?php
                        getcategories();
                    ?>
            
                   
                </ul>
            </div>
            
    
      
      </div>
      <br>
    </div>
  <!-- Review Form -->
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-lg-6">
            <form action="./user_review.php" method="post" enctype="multipart/form-data">
                <!-- Username Input -->
                <div class="mb-3">
                    <label for="user_name" class="form-label">Enter your Name</label>
                    <input type="text" id="user_name" class="form-control" autocomplete="off" required="required" name="user_name"/>
                </div>
                <!-- Review Input -->
                <div class="mb-3">
                    <label for="user_review" class="form-label">Write your review here</label>
                    <textarea class="form-control" id="user_review" name="user_review" rows="5" style="width: 100%;" required></textarea>
                </div>
                <!-- Submit Button -->
                <div class="mb-3">
                    <input type="submit" value="Submit" class="btn btn-info" name="user_register">
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<br>
        <!-- Last child -->
        <!-- include footer -->

        <?php include("./includes/footer.php")
        ?>
    </div>

    <!-- Bootstrap JS link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

<?php
if (isset($_POST['user_register'])) {
    // Get the user input
    $username = $_POST['user_name'];
    $userreview = $_POST['user_review'];

    // Prepare the SQL statement
    $insert_query = "INSERT INTO user_review (username,review) VALUES ($username, $userreview)";
    
    // Prepare the statement
    $sql_execute = mysqli_query($con, $insert_query);

    if ($sql_execute) {
        echo "<script> alert('Data Successfully') </script>";
    } 
    else {
        // Handle the error gracefully
        die(mysqli_error($con));  
    }
}
?>
