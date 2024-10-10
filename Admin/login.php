<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* body{ */
      /* height: 100vh;
      background-image: url(img/b2.avif);
      background-color: red;
      background-attachment: fixed;
      background-size: cover;
      background-repeat: no-repeat; */
      /* background-color:#0463fa; */
      
    /* } */
    .form{
        width: 300px;
        height: 200px;
        margin: auto;
        background-color:#d4dff1;
        box-shadow:1px 1px 10px 1px black;
        border-radius: 20px;
        margin-top: 250px;
    }
    .form1{
        width: 240px;
        height: 190px;
        margin: auto;
        border: 1px solid #d4dff1;
        background-color:#d4dff1;
    }
</style>
<body>
<?php 
   include("config.php"); 
   if(isset($_POST['submit']))
   {
      $email=$_POST['email'];
      $password=$_POST['password'];

      $query="select * from Aregister where Email='$email' and Password='$password'";
      $result=mysqli_query($connection,$query);
      $data = mysqli_fetch_assoc($result);
      if(mysqli_num_rows($result)==1)
      {
        $_SESSION['userid']=$data;
        print_r($_SESSION['userid']);
          header("Location:dashbord.php");
        //  echo"submit";
      }
      else{
         echo "Not submit";
      }
   }
?> 
<div class="form">
<form method="post">
     <div class="form1">
      <p>Email</p>
      <input type="email" name="email">
      <p>Password</p>
      <input type="password" name="password">
      <input type="submit" name="submit">
      </div>
</form>
</div>
</body>
</html>    