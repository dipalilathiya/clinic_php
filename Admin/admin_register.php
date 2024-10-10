
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
         .item1{
             width: 400px;
             height: 400px;
             background-color: #DaDFF1;
             margin: auto;
             border-radius: 20px;
             box-shadow: 0px 0px 10px black;
             margin-top: 40px;
         } 
         .item2{
             width: 300px;
             height: 390px;
             border: 1px solid #DaDFF1;
             background-color: #DaDFF1;
             margin: auto;
             /* border-radius: 20px; */
             /* box-shadow: 0px 0px 10px black; */
         } 
         .item2 input{
            padding: 5px 10px;
         }
         h2{
            text-align: center;
            width: 250px;
            height: 30px;
            margin: auto;
            background-color: #DaDFF1;
            color: darkblue;
            border-radius: 20px;
         }

</style>
<body>
<?php
include ("config.php");
if (isset($_POST['submit'])) {

 
    $email = $_POST['email'];
    $password = $_POST['password'];

  
    $query="select * from Aregister where Email='$email'";
    $result=mysqli_query($connection,$query);

    if(mysqli_num_rows($result)== 0){
    $query = "insert into Aregister  (Email,Password) values ('$email' ,'$password')";
    $result = mysqli_query($connection, $query);
    header("location:login.php");
    }
    else{
        echo "already registered";
    }
}
?>
  <h2>Register Form</h2>
<div class="item1">
<form method="post" enctype="multipart/form-data">
    <div class="item2">
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