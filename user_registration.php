<?php
  include("includes/connect.php");
  include('function/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport"contents="width=device-width,initial-scale=1.0">
    <title>User registration</title>
        <!-- Bootstrap CSS link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div  class="row d-flex align-items-center justify-content-center">
            <div  class="col-lg-12 col-xl-6">
    <form action="user_login.php" method="post" enctype="multipart/form-data"> 
        <div  class="form-outline mb-4"> 
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control"
            placeholder="Enter your Username" autocomplete="off" required="required" name="user_username"/>
        </div>
        <div  class="form-outline mb-4">  
            <label for="user_email" class="form-label">User Email</label>
            <input type="text" id="user_email" class="form-control"
            placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
        </div>
        <div  class="form-outline mb-4">  
            <label for="user_image" class="form-label">User Image</label>
            <input type="file" id="user_image" class="form-control"
            placeholder="upload your image" autocomplete="off" required="required" name="user_image"/>
        </div>
        <div  class="form-outline mb-4">  
            <label for="user_password" class="form-label">User Password</label>
            <input type="password" id="user_password" class="form-control"
            placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
        </div>
        <div  class="form-outline mb-4"> 
            <label for="conf_user_password" class="form-label">confirm Password</label>
            <input type="password" id="conf_user_password" class="form-control"
    placeholder="Enter your password" autocomplete="off" required="required" name="conf_user_password"/>

        </div>
        <div  class="form-outline mb-4"> 
            <label for="user_address" class="form-label">address</label>
            <input type="text" id="user_address" class="form-control"
            placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
        </div>
        <div  class="form-outline mb-4"> 
            <label for="user_contact" class="form-label">contact</label>
            <input type="text" id="user_contact" class="form-control"
            placeholder="Enter your number" autocomplete="off" required="required" name="user_contact"/>
        </div>
        <div class="form-outline mb-4">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
                        <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to the registration form
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent the default form submission
            
            // Get form data
            var formData = new FormData(this);
            //Validate email
            var email=formData.get('user_email');
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Invalid email address");
                return false;
            }

            // Validate password
            var password = formData.get('user_password');
            var confirmPassword = formData.get('conf_user_password');

            // Password length check
            if (password.length < 8 || password.length > 16) {
                alert('Password must be between 8 to 16 characters');
                return;
            }

            // Password format check
            var passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/;
            if (!passwordRegex.test(password)) {
                alert('Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be 8-16 characters long');
                return;
            }

            // Password confirmation check
            if (password !== confirmPassword) {
                alert('Password does not match the confirm password');
                return;
            }

            // If all validations pass, submit the form
            this.submit();
        });
    });
</script>


</body>
</html>
<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Function to validate email format
    function isValidEmail($user_email) {
    return filter_var($user_email, FILTER_VALIDATE_EMAIL);
    }
    if (!isValidEmail($user_email)) {
        echo "<script>alert('Invalid email format. Registration unsuccessful.');</script>";
        echo "<script>window.location.href='register.html';</script>";
    }
  
    // Password validation
    if (strlen($user_password) < 8 || strlen($user_password) > 16) {
        echo "<script>alert('Password must be between 8 to 16 characters')</script>";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/", $user_password)) {
        echo "<script>alert('Password must contain at least one uppercase letter, one lowercase letter, one number, one special character, and be 8-16 characters long')</script>";
    } elseif ($user_password != $conf_user_password) {
        echo "<script>alert('Password does not match the confirm password')</script>";
    } else {
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

        // Select query to check if username or email already exist
        $select_query = "SELECT * FROM user_table WHERE username='$user_username' OR user_email='$user_email'";
        $result = mysqli_query($con, $select_query);
        $rows_count = mysqli_num_rows($result);
        
        if ($rows_count > 0) {
            echo "<script>alert('Username or Email already exists')</script>";
        } else {
            // Move uploaded file
            $target_path = './user_images/' . $user_image;
            move_uploaded_file($user_image_tmp, $target_path);

            // Insert query
            $insert_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$user_username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";

            $sql_execute = mysqli_query($con, $insert_query);

            if ($sql_execute) {
                echo "<script>alert('Data Successfully')</script>";
            } else {
                die(mysqli_error($con));
            }
            
           
        }
    }
}
?>

