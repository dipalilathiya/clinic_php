<?php 
$query = "select * from register";
$result = mysqli_query($connection, $query);
?>
<table border="1 " cellspacing="0"  style = "width:1000px; margin-top: 150px;height:200px;text-align:center;margin-left:-240px; position:absolute; background-color:#d4dff1;border:none ">

   <tr>
      <td>Id</td>
      <td>Name</td>
      <td>department</td>
      <td>Img</td>
      <td>Delete</td>
   </tr>
 <?php 
while ($row = mysqli_fetch_array($result)) {
$id= $row['Id'];
$name = $row['Name'];
$department = $row['Department'];
$img = $row['Img'];
   
   echo '<tr>
     <td>'.$id.'</td>
     <td>'.$name.'</td>
     <td>'.$department.'</td>
     <td><img src="./img/'.$img.'" width="50px" height="50px"></img></td>
     <td><button><a href="doctor_delete.php?deleteid='.$id.'">Delete</a></button></td>
     
   </tr>';

}
?>
