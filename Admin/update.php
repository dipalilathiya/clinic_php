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
    .bo1 {
        border: none;
    }
    .w1 {
        width: 560px;
        height: 750px;
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
        border: 1px solid rgb(216, 216, 216);
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
<?php
include("config.php");
if (isset($_POST['submit'])) {

    $id = $_GET['updateid'];

    $name = $_POST['name'];
    $quantity = $_POST['quantity'];

    $ex_date = $_POST['ex_date'];
    $buy_date = $_POST['buy_date'];
    $mrp = $_POST['mrp'];
    $price = $_POST['price'];
    $s_name = $_POST['s_name'];

    $img = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];

    move_uploaded_file($tmp_name, "img/$img");

    $query = "update  medicine set Name='$name' ,Quantity='$quantity ' ,Ex_Date=' $ex_date', Buy_Date='$buy_date' ,Mrp='$mrp' ,Price='$price' ,S_Name='$s_name' ,Img='$img' where id='$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        header("Location:medicine_formshow.php");
    } else {
        echo " can not delete";
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
            <p>Ex Date</p>
            <input type="date" name="ex_date">
        </div>
        <div class="w3">
            <p>Buy Date</p>
            <input type="date" name="buy_date">
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
</div>
</div>
</div>
