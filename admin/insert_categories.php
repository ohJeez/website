<?php  
   include('../includes/connect.php');
   if(isset($_POST['insert_categories']))
  {
      $category_title=$_POST['category_title'];

      $select_query="select * from `categories` where category_title='$category_title' ";
      $result_select=mysqli_query($con,$select_query);
      $number=mysqli_num_rows($result_select);
      if($number>0){
         echo "<script>alert('This category is already present inside the database')</script>";

      }
      else
    {
      // Check if category title is empty
            if(empty($breed_title)) {
                echo "<script>alert('Please enter a valid category')</script>";
            } else { 
      $insert_query="insert into  `categories` (category_title) values ('$category_title')";
      $result=mysqli_query ($con, $insert_query);
      if($result){
         echo "<script>alert('category has been inserted successfully')</script>";
      }
   }
    } 

   }



?>


<h2 class="text-center">Insert Categories</h2>

<form action="" method="post" class="mb-2 w-50 m-auto">
   <div class="input-group mb-3 w-90 mb-2">
      <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
      <input type="text" class="form-control" name="category_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
   </div>

   <div class="input-group w-10 mb-2 m-auto">
      <input type="submit" class="bg-info border-0 p-2 my-2" name="insert_categories" value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1" > 
   
   </div>
</form>