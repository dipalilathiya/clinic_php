<?php 
include("config.php");
  if(isset($_GET['deleteid']))
  {
             $id=$_GET['deleteid'];
             $query="delete from register where id='$id'";
             $result=mysqli_query($connection,$query);
             if($result)
             {
                header("Location:doctor_form.php");
             }
             else
             {
                echo" can not delete";
             }

  }

?>