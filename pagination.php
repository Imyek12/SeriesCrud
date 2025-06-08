<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
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
    <div class="container my-5">
    <table class="table">
  <thead class="bg-dark text-light">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">MultipleData</th>
      <th scope="col">Gender</th>
      <th scope="col">Place</th>
    </tr>
  </thead>
  <tbody>
  <?php

$sql="select * from `seriescrud`";
$result=mysqli_query($con,$sql);
$num=mysqli_num_rows($result);
$numberPages=3;
$totalPages=ceil($num/$numberPages);
// echo $totalPages
// creating pagination buttons
for($btn=1;$btn<=$totalPages;$btn++){
    echo '<button class="btn btn-dark mx-1 mb-3"><a href="pagination.php?page='.$btn.'" class="text-light">'.
    $btn.'</a></button>';
}
if(isset($_GET['page'])){
    $page=$_GET['page'];
    // echo $page;

}else{
    $page=1;
}

$startinglimit = ($page - 1) * $numberPages;
$sql = "SELECT * FROM seriescrud LIMIT " . $startinglimit . ',' . $numberPages;
$result = mysqli_query($con, $sql);


// echo $num
while($row=mysqli_fetch_assoc($result)){
    echo '<tr>
      <th scope="row">'.$row['id'].'</th>
      <td>'.$row['fname'].'</td>
      <td>'.$row['lname'].'</td>
      <td>'.$row['mobile'].'</td>
      <td>'.$row['email'].'</td>
      <td>'.$row['multipleData'].'</td>
      <td>'.$row['gender'].'</td>
      <td>'.$row['place'].'</td>
    </tr>';
}

?>
  </tbody>
</table>
    </div>
</body>
</html>      