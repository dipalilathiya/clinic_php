<?php              
 include("config.php");
 
if(!isset($_SESSION['userid'])){
   header('Location:login.php');
}

  if(isset($_GET['deleteid']))
  {
             $id=$_GET['deleteid'];
             $query="delete from   appointment where id='$id'";
             $result=mysqli_query($connection,$query);
             if($result)
             {
                header("Location:appointment_show.php");
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
    h2{
         position: absolute;
         margin-left: 640px;
         margin-top: 50px;
    }
 </style>
<body>
    
               <?php 
              include("admin_menu.php");

                       $query="select * from appointment";
                       $result=mysqli_query($connection,$query);
                     ?>
                         <h2>Appointment</h2>
                         <table border="1" cellspacing="0"  style = "width:1000px;height:200px;text-align:center;margin-left:50px;margin-top:150px; background-color:#d4dff1;border:none; box-shadow: 1px 1px 10px 1px black; " >
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Doctor</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Problem</th>
                                <th>Delete</th>
                            </tr>
                       <?php 

                       while($row=mysqli_fetch_array($result))
                       {
                            $id=$row['Id'];
                            $name=$row['Name'];
                            $email=$row['Email'];
                            $mobile=$row['Mobile'];
                            $doctor=$row['Doctor'];
                            $time=$row['Time'];
                            $date=$row['Date'];
                            $problem=$row['Problem'];


                            echo '<tr>
                               <td>'.$id.'</td>
                               <td>'.$name.'</td>
                               <td>'.$email.'</td>
                               <td>'.$mobile.'</td>
                               <td>'.$doctor.'</td>
                               <td>'.$time.'</td>
                               <td>'.$date.'</td>
                               <td>'.$problem.'</td>
                                   <td><button><a href="appointment_show.php?deleteid='.$id.'">Delete</a></button></td>
                               
                            </tr>';
                       }
               ?>
               </table>
           
            <!--  -->
            
    </body>
    </html>