<?php
include 'connect.php';
if(isset($_POST['submit'])){

    $gender=$_POST['gender'];
    $sql="insert into `radiodata` (gender) values ('$gender') ";

    $result=mysqli_query($con,$sql);
    if($result){
        echo "Data of Radio buttons inserted successfully";
    }else{
        die(mysqli_error($con));
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Button Data</title>
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
    <div class="container my-5"></div>
    <form method="post">
        <div>
            <input type="radio" name="gender"value="male">Male</input>
        </div>
        <div>
            <input type="radio" name="gender"value="female">Female</input>
        </div>
         <div>
            <input type="radio" name="gender"value="kids">kids</input>
        </div>
        <button type ="submit" name ="submit" class="btn btn-dark my-3">Submit</button>
    </form>
</body>
</html> 