<?php
include("../includes/connect.php");

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_breeds = $_POST['product_breeds'];
    $product_price = $_POST['product_price'];
    $product_contact = $_POST['product_contact'];
    $status = 'true';

    // Accessing images
    $product_image1_name = $_FILES['product_image1']['name'];
    $product_image2_name = $_FILES['product_image2']['name'];
    $product_image3_name = $_FILES['product_image3']['name'];

    // Accessing image tmp names
    $product_image1_tmp = $_FILES['product_image1']['tmp_name'];
    $product_image2_tmp = $_FILES['product_image2']['tmp_name'];
    $product_image3_tmp = $_FILES['product_image3']['tmp_name'];

    // Checking empty condition
    if ($product_title == '' || $description == '' || $product_keywords == '' ||
        $product_category == '' ||  $product_breeds == '' || $product_price == '' ||
        $product_contact ==  '' ||
        $product_image1_name == '' || $product_image2_name == '' || $product_image3_name == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        // Move uploaded files to destination directory
       // Move uploaded files to destination directory
        $upload_path = "C:/xampp/htdocs/hari/product_images/";

        move_uploaded_file($product_image1_tmp, $upload_path . $product_image1_name);
        move_uploaded_file($product_image2_tmp, $upload_path . $product_image2_name);
        move_uploaded_file($product_image3_tmp, $upload_path . $product_image3_name);


        // Insert query
        $insert_products = "INSERT INTO `products` (product_title, product_description,
        product_keywords, category_id, breed_id, product_image1, product_image2, product_image3,
        product_price, date, status, contact) VALUES ('$product_title', '$description', '$product_keywords',
        '$product_category', '$product_breeds', '$product_image1_name', '$product_image2_name',
        '$product_image3_name', '$product_price', NOW(), '$status', '$product_contact')";

        $result_query = mysqli_query($con,$insert_products);

        if ($result_query) {
            echo "<script>alert('Successfully inserted the products')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Font Awesome link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <!--  CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Products </h1>
        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">
            <!-- title -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product title</label>
                <input type="text" name="product_title" id="product_title"
                class="form-control" placeholder="Enter the product title" autocomplete="off"
                required="required">
            </div>
            <!-- description -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description"
                class="form-control" placeholder="Enter the product description" autocomplete="off">
            </div>
            <!-- keywords -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="product_keyword" class="form-label">Product Keywords</label>
                <input type="text" name="product_keywords" id="product_keywords"
                class="form-control" placeholder="Enter the product keywords" autocomplete="off">
            </div>
            <!-- Categories -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <select name="product_category" id="" class="form-select">
                    <option value="">Select a Category</option>
                    <?php
                        $select_query="Select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                            

                        }

                    ?> 
                    
                </select>
            </div>
            <!-- Breeds -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <select name="product_breeds" id="" class="form-select">
                    <option value="">Select a Breed</option>
                    <?php
                        $select_query="Select * from `breeds`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $breed_title=$row['breed_title'];
                            $breed_id=$row['breed_id'];
                            echo "<option value='$breed_id'>$breed_title</option>";

                        }

                    ?>

                </select>
            </div>

            <!-- image 1 -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product Image 1</label>
                <input type="file" name="product_image1" id="product_image1"
                class="form-control">
            </div>

            <!-- image 2 -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product Image 2</label>
                <input type="file" name="product_image2" id="product_image2"
                class="form-control">
            </div>

            <!-- image 3 -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product Image 3</label>
                <input type="file" name="product_image3" id="product_image3"
                class="form-control">
            </div>

            <!-- Price -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="product_price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="product_keywords"
                class="form-control" placeholder="Enter the product price" autocomplete="off">
            </div>
            <!-- contact-->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <label for="product_contact" class="form-label">Contact</label>
                <input type="text" name="product_contact" id="product_keywords"
                class="form-control" placeholder="Enter Contact Information" autocomplete="off"
                required="required">
            </div>

            <!-- submit -->
            <div class="form-outline outline mb-4 w-50 m-auto">
                <input type="submit" name="insert_product"
                class="btn btn-info mb-3 px-3" value="Insert Products">
            </div>
        </form>
    </div>
    
    <script>
        function validateForm() {
            // Get form inputs
            var productTitle = document.getElementById("product_title").value;
            var description = document.getElementById("description").value;
            var productKeywords = document.getElementById("product_keywords").value;
            var productCategory = document.getElementById("product_category").value;
            var productBreeds = document.getElementById("product_breeds").value;
            var productImage1 = document.getElementById("product_image1").value;
            var productImage2 = document.getElementById("product_image2").value;
            var productImage3 = document.getElementById("product_image3").value;
            var productPrice = document.getElementById("product_price").value;
            var productContact = document.getElementById("product_contact").value;

            // Check if any field is empty
            if (productTitle === '' || description === '' || productKeywords === '' ||
                productCategory === '' || productBreeds === '' || productPrice === '' ||
                productContact === '' || productImage1 === '' || productImage2 === '' || productImage3 === '') {
                alert('Please fill all the available fields');
                return false;
            }

            // Check if file inputs have valid extensions
            var validExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            var extension1 = productImage1.split('.').pop().toLowerCase();
            var extension2 = productImage2.split('.').pop().toLowerCase();
            var extension3 = productImage3.split('.').pop().toLowerCase();

            if (!validExtensions.includes(extension1) || !validExtensions.includes(extension2) || !validExtensions.includes(extension3)) {
                alert('Please upload valid image files (jpg, jpeg, png, gif)');
                return false;
            }

            return true; // Form is valid
        }
    </script>
</body>
</html>