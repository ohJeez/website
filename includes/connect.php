<?php


  $con=mysqli_connect('localhost','root','','haute_harbor');
  if($con)
  {
    //echo "connection successful";

   }
  else{
     die(mysqli_error($con));
  }



