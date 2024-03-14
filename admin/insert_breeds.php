<?php  
    include('../includes/connect.php');
    if(isset($_POST['insert_breeds'])) {
        $breed_id = $_POST["breed_id"]; 
        $breed_title = $_POST['breed_title'];

        // Check if the breed already exists
        $select_query = "SELECT * FROM `breeds` WHERE breed_title='$breed_title'";
        $result_select = mysqli_query($con, $select_query);
        $number = mysqli_num_rows($result_select);

        if($number > 0) {
            echo "<script>alert('This breed is already present in the database')</script>";
        }else {
                // Insert the breed into the database
                $insert_query = "INSERT INTO `breeds` (breed_id, breed_title) VALUES ('$breed_id', '$breed_title')";
                $result = mysqli_query($con, $insert_query);
                if($result) {
                    echo "<script>alert('Breed has been inserted successfully')</script>";
                } else {
                    echo "<script>alert('Failed to insert breed')</script>";
                }
            }
        }
?>


<h2 class="text-center">Insert Breeds</h2>
<form action="" method="post" class="mb-2 w-50 m-auto">
<div class="input-group mb-3 w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="breed_id" placeholder="Enter Breed ID as 'catagorynamebreed' first letter of each word as capital" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group mb-3 w-90 mb-2">
        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="breed_title" placeholder="Insert Breed" aria-label="Username" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class="bg-info border-0 p-2 my-2" name="insert_breeds" value="Insert Breed" aria-label="Username" aria-describedby="basic-addon1"> 
    </div>
</form>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Add event listener to the form submission
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();
        
        // Get form data
        var formData = new FormData(this);
        
        // Check if breed title is empty
        var breedTitle = formData.get('breed_title');
        if (!breedTitle.trim()) {
            alert('Please enter a breed title');
            return;
        }

        // Rest of the form validation logic...

        // If all validations pass, submit the form
        this.submit();
    });
});
    </script>
