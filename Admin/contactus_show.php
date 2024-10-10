<?php              
 include("config.php");
 
if(!isset($_SESSION['userid'])){
   header('Location:login.php');
}
  if(isset($_GET['deleteid']))
  {
             $id=$_GET['deleteid'];
             $query="delete from contact where id='$id'";
             $result=mysqli_query($connection,$query);
            if($result)
             {
                header("Location:contactus_show.php");
             }
             else
             {
                echo" can not delete";
             }

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
    h2{
         position: absolute;
         margin-left: 480px;
         margin-top: 70px;
    }
</style>
<body>
      <?php 
           include("admin_menu.php")
       
      ?>
            <div class="bo2">
             <?php
                
                 $query = "select * from contact";
                 $result = mysqli_query($connection, $query);
                ?>
                <h2>Contact</h2>
                <table border="1" cellspacing="0"  style = "width:800px;height:200px;text-align:center;margin-left:160px;margin-top:150px; background-color:#d4dff1;border:none;   box-shadow: 0px 1px 10px 0px black;">
                    <tr>
                        <th>Id</th>
                        <th>Your Name</th>
                        <th>Your Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        $id = $row['Id'];
                        $name = $row['Name'];
                        $email = $row['Email'];
                        $subject = $row['Subject'];
                        $msg = $row['Message'];

                        if (mysqli_num_rows($result) > 0) {
                            echo '<tr>
                            <td>' . $id . '</td>
                                <td>' . $name . '</td>
                                <td>' . $email . '</td>
                                <td>' . $subject . '</td>
                                <td>' . $msg . '</td>
                                 <td><button><a href="contactus_show.php?deleteid='.$id.'">Delete</a></button></td>

                           </tr>';
                        } else {

                            echo "not submit";
                        }

                    }
                    ?>
                </table>
            </div>
     