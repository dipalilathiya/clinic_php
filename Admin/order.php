<?php              
 include("config.php"); 
 if(!isset($_SESSION['userid'])){
   header('Location:login.php');
}
  if(isset($_GET['deleteid']))
  {
             $id=$_GET['deleteid'];
             $query="delete from orders where id='$id'";
             $result=mysqli_query($connection,$query);
             if($result)
             {
                header("Location:order.php");
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
    .h22 {
        text-align: center;
        position: absolute;
        margin-left: 900px;
        margin-top: 20px;
        /* margin: auto; */
    }
</style>
<body>
       <?php 
           include("admin_menu.php");
         
       ?>
         <h2 class="h22">Orders</h2>
         <table border="1" cellspacing="0"
                style="width:800px;height:350px;text-align:center; margin:auto;margin-right:150px;background-color:#d4dff1;  margin-top: 80px;border:none;box-shadow: 0px 1px 10px 0px black;">
                <tr>
                    <th>Id</th>
                    <th>Medicine Name</th>
                    <th>User Name</th>
                    <th>medicine_id</th>
                    <th>qty</th>
                    <th>Price</th>
                    <th>total_price</th>
                    <th>Delete</th>
                    
                </tr>
                <?php
                $query = "select orders.*, medicine.Name, uregister.Name as user_name from orders 
                  JOIN medicine ON medicine.id = orders.medicine_id
                  JOIN uregister ON uregister.Id = orders.user_id";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $name = $row['Name'];
                    $user_name = $row['user_name'];
                    $medicine_id = $row['medicine_id'];
                    $qty = $row['qty'];
                    $price = $row['price'];
                    $total_price = $row['total_price'];

                    echo '<tr>
           <td>' . $id . '</td>
           <td>' . $name . '</td>
           <td>' . $user_name . '</td>
           <td>' . $medicine_id . '</td>
           <td>' . $qty . '</td>
           <td>' . $price . '</td>
           <td>' . $total_price . '</td>
           <td><button><a href="order.php?deleteid='.$id.'">delete</a></button></td>    
         </tr>';    
                }
                ?>
  </table>
</body>
</html>