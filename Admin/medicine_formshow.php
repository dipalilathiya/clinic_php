
 <?php          
            
            $query = "select * from medicine";
            $result = mysqli_query($connection, $query);
            ?>
                <table border="1"  cellspacing="0" style = "width:800px;height:200px;text-align:center;margin-left:350px;margin-top:50px; background-color:#d4dff1;border:none;  box-shadow: 0px 0px 10px 0px black;">
          
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
   