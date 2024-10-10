<?php
include("config.php");
if (isset($_POST['id'])) {
    $medicineId = $_POST['id'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $totalPrice = $price * $qty;
    $userId = $_SESSION['user']['Id'];
    $i_query = "insert into orders (medicine_id,qty,price,total_price,user_id)values('$medicineId','$qty','$price', '$totalPrice', '$userId')";
    $result= mysqli_query($connection, $i_query);
    if($result)
    {
         echo "<script>alert('Order Done')</script>";

    }else{
        
        echo "<script>alert('Order Not Done')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        h3 {
            position: absolute;
            margin-left: 650px;
            margin-top: -50px;
        }
    </style>
</body>

</html>
<?php

$id = $_GET['id'];
$query = "select * from medicine WHERE id=$id";
$result = mysqli_query($connection, $query);
?>
<h3>ORDERS</h3>
<form action="" method="POST">
    <table border="1" cellspacing="0" style="width:800px;height:350px;text-align:center; margin:auto;margin-right:150px;background-color:#d4dff1;  margin-top: 80px;border:none;box-shadow: 0px 1px 10px 0px black;">
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Img</th>
            <th>Delete</th>
            <th>Update</th>
            <th>Total</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['Id'];
            $name = $row['Name'];
            $m_code = $row['M_Code'];
            $quantity = $row['Quantity'];
            $price = $row['Price'];
            $img = $row['Img'];
            echo '<input name="id" type="hidden" value="' . $id . '">';
            echo '<input name="price" type="hidden" value="' . $price . '">';
            echo '<tr>
                    <td>' . $name . '</td>
                    <td>' . $m_code . '</td>
                    <td><input type="number" class="qty" name="qty" data-id="'.$id . '" data-price="' . $price . '"></td>
                    <td>' . $price . '</td>
                    <td><img src="img/' . $img . '" alt="Not Found" height="50px" width="50px"></img></td>
                    <td><button><a href="delete.php?deleteid=' . $id . '">Delete</a></button></td>  
                    <td><button><a href="update.php?updateid=' . $id . '">update</a></button></td>
                    <td id="itemTotal' . $id . '" class="item-total"></td>
                   
                </tr>';
        }
        ?>
        <tr>
            <th colspan="6">Grand Total</th>
            <th colspan="1" id="grandTotal">0</th>
            <th><button type="submit" class="btn">Buy</button></th>
        </tr>
    </table>
</form>
</div>
</div>
<script>
    function calculateGrandTotal() {
        let itemTotals = document.getElementsByClassName('item-total');
        let grandTotal = 0;
        for (let i = 0; i < itemTotals.length; i++) {
            grandTotal += parseInt(itemTotals[i].innerText == '' ? 0 : itemTotals[i].innerText);
        }
        document.getElementById('grandTotal').innerText = grandTotal;
    }
    let quantities = document.getElementsByClassName('qty')

    for (let i = 0; i < quantities.length; i++) {
        const element = quantities[i];
        element.addEventListener('input', function(e) {
            let value = e.target.value != '' ? e.target.value : 0
            let total = parseInt(value) * parseInt(e.target.dataset.price);
            let id = e.target.dataset.id;
            document.getElementById('itemTotal' + id).innerText = total
            calculateGrandTotal();

        })
    }
</script>