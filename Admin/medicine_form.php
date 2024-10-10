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
<STyle>
   

    .w1 {
        width: 560px;
        height: 750px ;
        background-color: #d4dff1;
        margin: auto;
        border-radius: 20PX;
        margin-top: 20px;
        border: none;
        box-shadow: 0px 1px 10px 0px black;
    }
    .w2 {
        width: 400px;
        /* border: 1px solid black; */
        height: 730px;
        margin-bottom: 10px;
        background-color: #d4dff1;
        margin: auto;
        border: 1px solid #d4dff1;
    }
    .w3 {

        /* border: 1px solid black; */
        width: 100%;
        border: none;
        margin-top: 5px;
        height: 60px;
    }

    .w3 input {
        width: 100%;
        border: none;
        margin-top: 5px;
        padding: 10px 20px;
    }

    .w4 input {

        /* border: 1px solid black; */
        width: 300px;
        border: none;
        margin-top: 10px;
        height: 50px;
        background-color: #9bacc7;
        color: white;
        font-size: 16px;
        margin: auto;
    }
</STyle>

<body>
      
                 
            <?php 
           include("admin_menu.php");

            
            if (isset($_POST['submit'])) {
                $img = $_FILES['img']['name'];
                $tmp_name = $_FILES['img']['tmp_name'];

                $name = $_POST['name'];
                $quantity = $_POST['quantity'];
                $tabs = $_POST['tabs'];
                $ex_date = $_POST['ex_date'];
                $buy_date = $_POST['buy_date'];
                $m_code = $_POST['m_code'];
                $mrp = $_POST['mrp'];
                $price = $_POST['price'];
                $s_name = $_POST['s_name'];

                move_uploaded_file($tmp_name, "img/$img");
                $query = "insert into medicine (Name,Quantity,Tabs,Ex_Date,Buy_Date,M_Code,Mrp,Price,S_Name,Img)values('$name','$quantity','$tabs','$ex_date','$buy_date','$m_code','$mrp','$price','$s_name','$img')";
                $result = mysqli_query($connection, $query);
                if ($result) {
                   header("Location:medicine_form.php");
                } else {
                    echo "Not submit";

                }

            }
            ?>
             
            <div class="w1">
                <form method="post" enctype="multipart/form-data">
                    <div class="w2">
                        <div class="w3">
                            <p>Name</p>
                            <input type="text" name="name">
                        </div>
                        <div class="w3">
                            <p>Quantity</p>
                            <input type="text" name="quantity">
                        </div>
                        <div class="w3">
                            <p>Tabs</p>
                            <input type="text" name="tabs">
                        </div>
                        <div class="w3">
                            <p>Ex Date</p>
                            <input type="date" name="ex_date">
                        </div>
                        <div class="w3">
                            <p>Buy Date</p>
                            <input type="date" name="buy_date">
                        </div>
                        <div class="w3">
                            <p>Medicine code</p>
                            <input type="text" name="m_code">
                        </div>
                        <div class="w3">
                            <p>MRP</p>
                            <input type="text" name="mrp">
                        </div>
                        <div class="w3">
                            <p>Price</p>
                            <input type="text" name="price">
                        </div>
                        <div class="w3">
                            <p>Supplier Name</p>
                            <input type="text" name="s_name">
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
            
            $query = "select * from medicine";
            $result = mysqli_query($connection, $query);
            ?>
                <table border="1"  cellspacing="0" style = "width:800px;height:200px;text-align:center;margin-left:-90px;margin-top:50px; background-color:#d4dff1;border:none;  box-shadow: 0px 0px 10px 0px black;">
          
                 <tr>
                    <th>Id</th>
                      <th>Name</th>
                      <th> Quantity</th>
                      <th>Ex_Date</th>
                      <th>Buy_Date</th>

                      <th>Mrp</th>
                      <th>Price</th>
                      <th>S_Name</th>
                      <th>Img</th>
                      <th>Delete</th>
                      <th>update</th>
                 </tr>
       <?php
            while ($row = mysqli_fetch_array($result)) {
                $id=$row['Id'];
                $name = $row['Name'];
                $quantity = $row['Quantity'];
              
                $ex_date = $row['Ex_Date'];
                $buy_date = $row['Buy_Date'];
                $mrp = $row['Mrp'];
                $price = $row['Price'];
                $s_name = $row['S_Name'];
                $img = $row['Img'];
                   
                 echo '<tr>
                     <td>'.$id.'</td>
                    <td>'.$name.'</td>
                    <td>'.$quantity.'</td>
                    <td>'.$ex_date.'</td>
                    <td>'.$buy_date.'</td>
                    <td>'.$mrp.'</td>
                    <td>'.$price.'</td>
                    <td>'.$s_name.'</td>
                    <td><img src="img/'.$img.'" alt="Not Found" width="50px" height="50px"></img></td>
                    <td><button><a href="delete.php?deleteid='.$id.'">Delete</a></button></td>
                    <td><button><a href="update.php?updateid='.$id.'">update</a></button></td>
                 </tr>';
    
             }?>
       
 </table>
   
            </div>
    
         
               
</body>
</html>