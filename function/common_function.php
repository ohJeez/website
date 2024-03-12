<?php

// including connect file
include('./includes/connect.php');



//getting products
function getproducts(){
    global $con;

    // Condition to check if category and breed are not set
    if (!isset($_GET['category']) && !isset($_GET['breed'])) {
        $select_query = "SELECT * FROM `products` ORDER BY RAND() LIMIT 0,9";
        $result_query = mysqli_query($con, $select_query);

        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            
            $breed_id = $row['breed_id'];

            // Update the image path based on your given path
            $image_path = 'product_images/' . $product_image1;

            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='$image_path' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <h9 class='card-title'>$category_id</h9>
                            <p class='card-text'>$product_description</p>
                            <p class='card-text'>$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                            
                            <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                  </div>";

                  
        }
    }
}


// getting all products
function get_all_products(){
    global $con;
    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['breed'])){
    $select_query="select * from `products` order by rand() ";
    $result_query=mysqli_query($con, $select_query);
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $product_contact=$row['contact'];
        $category_id=$row['category_id'];
        
        $breed_id=$row['breed_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
        <img src='product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>$product_contact</p>
           
            <p class='card-text'>" . "Price: $" . $product_price . "</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
            <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
     </div>
  </div>";
    }
   }
  } 

}
     
    
//getting unique categories
function getunique_cat(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
        
    $select_query="select * from `products` where category_id=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        
        $breed_id=$row['breed_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
        <img src='product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            
            <p class='card-text'>" . "Price: $" . $product_price . "</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
            <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
     </div>
  </div>";
    }
   }
  } 

//   getting category title

  function get_category_title($category_id) {
    global $connection;
    $query = "SELECT * FROM categories WHERE category_id = {$category_id}";
    $get_category_title = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($get_category_title)) {
        $category_title = $row['category_title'];
    }

    return $category_title;
}

//getting unique breeds
function getunique_breeds(){
    global $con;
    //condition to check isset or not
    if(isset($_GET['breed'])){
        $breed_id=$_GET['breed'];
    $select_query="select * from `products` where breed_id=$breed_id";
    $result_query=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>There is no items currently available for this breed</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        
        $breed_id=$row['breed_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
        <img src='product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            
           
            <p class='card-text'>" . "Price: $" . $product_price . "</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
            <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
     </div>
  </div>";
    }       

   }
  } 


function getbreeds(){
    global $con;
    $select_breeds="select * from `breeds`";
    $result_breeds=mysqli_query($con,$select_breeds); 
    while($row_data=mysqli_fetch_assoc($result_breeds)){
    $breed_title=$row_data['breed_title'];
    $breed_id=$row_data['breed_id'];
    echo "<li class='nav-item'>
    <a href='index.php?breed=$breed_id' class='nav-link text-light'>$breed_title</a>
    </li>";
    }
 }





// for displaying categories
function getcategories(){
    global $con;
    $select_categories="select * from `categories`";
    $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo "<li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
    </li>";

    }
}

// searching products
function search_product(){
    global $con;
    if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
    $search_query="select * from `products` where product_keywords like '%$search_data_value%'";
    $result_query=mysqli_query($con,$search_query);
    $num_rows=mysqli_num_rows($result_query);
    if($num_rows==0){
        echo "<h2 class='text-center text-danger'>No results match</h2>";
    }
    while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1'];
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
       
        $breed_id=$row['breed_id'];
        echo "<div class='col-md-4 mb-2'>
        <div class='card'>
        <img src='/hari/product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            
           
            <p class='card-text'>" . "Price: $" . $product_price . "</p>
            <a href='#' class='btn btn-primary'>Add to cart</a>
            <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
     </div>
  </div>";
    }

}}
// view details
function view_details(){
    global $con;

    // condition to check isset or not
    if(isset($_GET['product_id'])){
        if(!isset($_GET['category'])){
            if(!isset($_GET['breed'])){
                $product_id=$_GET['product_id'];
                $select_query="select * from `products` where product_id=$product_id";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $product_id=$row['product_id'];
                    $product_title=$row['product_title'];
                    $product_description=$row['product_description'];
                    $product_image1=$row['product_image1'];
                    $product_image2=$row['product_image2'];
                    $product_image3=$row['product_image3'];
                    $product_price=$row['product_price'];

                    $category_id=$row['category_id'];
                    
                    $breed_id=$row['breed_id'];

                    // Output the card for the main product
                    echo "<div class='col-md-4 mb-2'>
                            <div class='card'>
                            <img src='product_images/$product_image1' class='card-img-top' alt='$product_title'>

                                <div class='card-body'>
                                    <h5 class='card-title'>$product_title</h5>
                                    <p class='card-text'>$product_description</p>
                                    
                                    
                                    <p class='card-text'>" . "Price: $" . $product_price . "</p>

                                    <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
                                    <a href='index.php' class='btn btn-secondary'>Go Home</a>
                                </div>
                            </div>
                          </div>";

                    // Output the related products
                    echo "<div class='col-md-8'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h4 class='text-center text-info mb-5'>Related Images</h4>
                                </div>
                            </div>
                            <div class='col-md-6','row-px-1 px-0 py-3'>
                                <img src='product_images/$product_image2' class='card-img-top' alt='$product_title'>

                            </div> <br>
                            <div class='col-md-7','row'>
                            <img src='product_images/$product_image3' class='card-img-top' alt='$product_title'>                        
                            </div>
                        </div>";
                }
            }
        }
    }
}
// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip; 



// cart function
function cart(){
if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add=getIPAddress();
    $get_product_id=$_GET['add_to_cart'];

    $select_query="Select * from`cart_details` where ip_address='$get_ip_add' and
    product_id=$get_product_id";
    $result_query=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($result_query);
    if($num_rows>0){
        echo "<script>alert('This item is already present inside cart')
        </script>";
        echo "<script>window.open('index.php,'_self')</script>";
    
    }  else{
        $insert_query="insert into `cart_details`
        (product_id,ip_address,quantity) values($get_product_id,'$get_ip_add',0)";
        $result_query=mysqli_query($con,$insert_query);
        echo "<script>alert('Item is added to cart')</script>";
        echo "<script>window.open('index.php,'_self')</script>";

    }
}

}

// function to get cart item numbers
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add=getIPAddress();
        $select_query="Select * from`cart_details` where ip_address='$get_ip_add'";       
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        
        
        }  else{
        global $con;
        $get_ip_add=getIPAddress();
        $select_query="Select * from`cart_details` where ip_address='$get_ip_add'";       
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
    
        }
        echo $count_cart_items;
    }

    function getreviews(){
        global $con;
    
        //to get the username and review from the user_review table
        if (!isset($_GET['user_review'])) {
            $select_query = "SELECT * FROM `user_review` ORDER BY RAND() LIMIT 0,9";
            $result_query = mysqli_query($con, $select_query);
    
            // Check if there are any reviews
            if (mysqli_num_rows($result_query) > 0) {
                // Loop through the results and display each review
                while ($row = mysqli_fetch_assoc($result_query)) {
                    $user_name = $row['username'];
                    $user_review = $row['review'];
    
                    // Display the review
                    echo "<div class='card'>";
                    echo "<h4>$user_name</h4>";
                    echo "<p>$user_review</p>";
                    echo "</div>";
                }
            } else {
                echo "No reviews found.";
            }
        }
    }
    
?>
<!--
    echo "<div class='col-md-4 mb-2'>
        <div class='card'>
        <img src='product_images/$product_image1' class='card-img-top' alt='$product_title'>
        <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>$product_contact</p>
           
            <p class='card-text'>" . "Price: $" . $product_price . "</p>
            <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add to cart</a>
            <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
        </div>
     </div>
  </div>";
-->