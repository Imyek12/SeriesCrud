<?php
include 'connect.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Display data</title>
    <style>
    body{
      background-color: lightgray;
    }
    

   div {
  background-color: lightgreen;
     }

   

    </style>
  </head>
  <body>
  
    <div class="container my-5"  >
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sl no</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Subjects</th>
      <th scope="col">Gender</th>
      <th scope="col">Place</th>

      <th scope="col">operations</th>

    </tr>
  </thead>
  <tbody>
<?php

// selection query

$sql="select * from `seriescrud`";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
   $id=$row['id'];
   $fname= $row['fname']; 
   $lname= $row['lname'];
   $email= $row['email'];
   $mobile= $row['mobile']; 
   $datas=$row['multipleData'];
   $gender=$row['gender'];
   $place=$row['place'];
  //  $allData=implode(",", $datas);

   echo '<tr>
   <th scope="row">'.$id.'</th>
   <td>'.$fname.'</td>
   <td>'.$lname.'</td>
   <td>'.$email.'</td>
   <td>'.$mobile.'</td>
   <td>'.$datas.'</td>
   <td>'.$gender.'</td>
   <td>'.$place.'</td>
   <td>
   <a href="update.php?updateid='.$id.'" class="btn btn-dark">update</a>
   <a href="delete.php?deleteid='.$id.'" class="btn btn-danger">delete</a>
</td> 
 </tr>';         
}


?>

    
   
  </tbody>
</table>
    </div>

  </body>
</html>