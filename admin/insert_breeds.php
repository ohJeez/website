<?php  
   include('../includes/connect.php');
   if(isset($_POST['insert_breeds']))
  {
      $breed_title=$_POST['breed_title'];

      $select_query="select * from `breeds` where breed_title='$breed_title' ";
      $result_select=mysqli_query($con,$select_query);
      $number=mysqli_num_rows($result_select);
      if($number>0){
         echo "<script>alert('This breed is already present inside the database')</script>";

      }
      else
    {

      
      $insert_query="insert into  `breeds` (breed_title) values ('$breed_title')";
      $result=mysqli_query($con,$insert_query);
      if($result){
         echo "<script>alert('breed has been inserted successfully')</script>";
      }

    } 

   }



?>



<h2 class="text-center">Insert Breeds</h2>
<form action="" method="post" class="mb-2 w-50 m-auto">
   <div class="input-group mb-3 w-90 mb-2">
      <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
      <input type="text" class="form-control" name="breed_title" placeholder="Insert Breeds" aria-label="Username" aria-describedby="basic-addon1">
   </div>

   <div class="input-group w-10 mb-2 m-auto">
       <input type="submit" class="bg-info border-0 p-2 my-2" name="insert_breeds" value="Insert Breeds" aria-label="Username" aria-describedby="basic-addon1" > 
      
   
   </div>
</form>