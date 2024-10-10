<?php              
 include("config.php");
 
if(!isset($_SESSION['userid'])){
   header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>
<style>
    .bo1{
        border: none;
    }
    .w1 {
        width: 400px;
        height: 400px;
        background-color: #d4dff1;
        margin: auto;
        margin-top: 40px;
        border-radius: 30PX;
        border: none;
        box-shadow: 0px 1px 10px 0px black;

    }
    .w2 {
        width: 300px;
        height: 396px;
      
        background-color: #d4dff1;
        margin: auto;
        border: 1px solid #d4dff1;
    }

    .w3 {

        /* border: 1px solid black; */
        width: 100%;
        border: none;
        margin-top: 10px;
        height: 80px;
    }

    .w3 input {
        width: 100%;
        border: none;
        margin-top: 10px;
        padding: 10px;
    }
    .w4 input{
        
        /* border: 1px solid black; */
        width: 300px;
        border: none;
        margin-top: 10px;
        height: 50px;
        background-color: #9bacc7;
        color: white;
        font-size: 16px;
    }
   
</style>
<body>

            <?php
            include ("admin_menu.php");
         
            if (isset($_POST['submit'])) {
                $img = $_FILES['img']['name'];
                $tmp_name = $_FILES['img']['tmp_name'];

                $name = $_POST['name'];
                $department = $_POST['department'];
                move_uploaded_file($tmp_name, "img/$img");
                $query = "insert into register (Name,Department,Img) values ('$name','$department','$img')";
                $result = mysqli_query($connection, $query);
                if ($result) {
                    header("Location:doctor_form.php");
                } else {
                    echo "not submit";
                }
            }
            ?>
            <div class="w1">
                <form method="post" enctype="multipart/form-data">
                    <div class="w2">
                        <div class="w3">
                            <p>Name:</p>
                            <input type="text" name="name">
                        </div>
                        <div class="w3">
                            <p>Department</p>
                            <input type="text" name="department">
                        </div>
                        <div class="w3">
                            <input type="file" name="img">
                        </div>
                        <div class="w4">
                          <input type="submit" name="submit">
                        </div>
                    </div>
                </form>
                <?php
            include("doctor_show1.php")
            ?>
        </div> 
       
            <!--  -->
      

   


</body>
</html>