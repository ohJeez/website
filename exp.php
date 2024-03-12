<?php
// Include the database connection file
$con=mysqli_connect('localhost','root','','haute_harbor');
  if($con)
  {
    //echo "connection successful";

   }
  else{
     die(mysqli_error($con));
  }

// Check if form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect data from the form
    
    $seats = $_POST['user_name'];
    $ac = $_POST['user_review'];
    

    // SQL query to insert data into the 'menu' table
    $sql_insert = "INSERT INTO user_review (username,review) VALUES ('$seats', '$ac')";

    // Perform the insertion
    if ($con->query($sql_insert) === TRUE) {
        echo "<script>alert('review added succesfully.');</script>";
    echo "<script>window.location.href='user_review.php';</script>";
        exit();
    } else {
        // Handle errors if the insertion fails
        echo "Error: " . $sql_insert . "<br>" . $con->error;
    }
}

// Close the database connection
$con->close();
?>