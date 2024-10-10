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
     .in2 a{
        text-decoration: none;
     }
     .in1 a{ 
        text-decoration: none;         
     }
    
</style>
<body>
               <?php
                   include ("admin_menu.php");
               ?>
 
            <?php
               
                $doctorCountQuery = "SELECT COUNT(*) FROM register";
                $doctorCount = mysqli_fetch_array(mysqli_query($connection, $doctorCountQuery))['COUNT(*)'];
              
                $medicineCountQuery = "SELECT COUNT(*) FROM medicine";
                $medicineCount = mysqli_fetch_array(mysqli_query($connection, $medicineCountQuery))['COUNT(*)'];
                $appointmentCountQuery = "SELECT COUNT(*) FROM appointment";
                $appointmentCount = mysqli_fetch_array(mysqli_query($connection, $appointmentCountQuery))['COUNT(*)'];
                
                $contactCountQuery = "SELECT COUNT(*) FROM contact";
                $contactCount = mysqli_fetch_array(mysqli_query($connection, $contactCountQuery))['COUNT(*)']; 
            ?>
            <div class="bo2">
                <h3> Dashboard</h3>
                <div class="item">
                 <div class="item1">
                        <div class="in1">
                          
                        <a href="doctor_form.php"><h4>DOCTORS</h4></a>
                        </div>
                        <div class="in2">
                             <div class="in22"><a href="doctor_form.php"><h1><?php   print_r($doctorCount);?></h1></a></div>
                             <div class="in22"><h1><span class="material-symbols-outlined">
                                </span></h1></div>  
                        </div>
                        <div class="in3">

                           <div class="in33"><h4>0.12%</h4></div>
                           <div class="in33"><p>Since last year</p></div>
                        </div>

                 </div>
                 <!-- -------------------------- -->
                 <div class="item1">
                    <div class="in1">
                    <a href="medicine_form.php"> <h4>MEDICINES</h4></a>
                    </div>
                    <div class="in2">
                         <div class="in22"><a href="medicine_form.php"><h1><?php   print_r($medicineCount);?></a></div>
                         <div class="in22"><h1><i class="fa-regular fa-user"></i></h1></div>  
                    </div>
                    <div class="in3">

                       <div class="in33"><h4>0.47%</h4></div>
                       <div class="in33"><p>Since last month</p></div>
                    </div>
                 </div>

                 <!-- -------------------------- -->

                 <div class="item1">
                    <div class="in1">
                    <a href="appointment_show.php"><h4>APPOINTMENT</h4></a>
                    </div>
                    <div class="in2">
                         <div class="in22"><a href="appointment_show.php"><h1><?php   print_r($appointmentCount);?></h1></a></div>
                         <div class="in22"><h1><i class="fa-sharp fa-regular fa-address-book"></i></h1></div>  
                    </div>
                    <div class="in3">

                       <div class="in33"><h4>64.00%</h4></div>
                       <div class="in33"><p>(30 days)</p></div>
                    </div>
                 </div>

                 <!--  -->   
            </div>
             
            <!-- ===== -->
            <div class="item">
                 <div class="item1">
                        <div class="in1">
                        <a href="order.php"> <h4>ORDERE</h4></a>
                        </div>
                        <div class="in2">
                             <div class="in22"><a href="order.php"><h1><?php   print_r($medicineCount);?></h1></a></div>
                             <div class="in22"><h1><span class="material-symbols-outlined">
                                </span></h1></div>  
                        </div>
                        <div class="in3">
                           <div class="in33"><h4>0.12%</h4></div>
                           <div class="in33"><p>Since last year</p></div>
                        </div>

                 </div>
                 <!-- -------------------------- -->
                 <div class="item1">
                    <div class="in1">
                    <a href="contactus_show.php"><h4>CONTACT</h4></a>
                    </div>
                    <div class="in2">
                         <div class="in22"><a href="contactus_show.php"><h1><?php   print_r($contactCount);?></h1></a></div>
                         <div class="in22"><h1><i class="fa-regular fa-user"></i></h1></div>  
                    </div>
                    <div class="in3">

                       <div class="in33"><h4>0.47%</h4></div>
                       <div class="in33"><p>(30 days)</p></div>
                    </div>
                 </div>

                 <!-- -------------------------- -->
                
            </div>
            <!-- ----------- ----------------------------------------- -->
        
</body>
</html>
