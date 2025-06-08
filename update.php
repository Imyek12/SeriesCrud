<?php
include 'connect.php';

$id=$_GET['updateid'];
$sql="Select * from seriescrud where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

$fname=$row['fname'];
$lname=$row['lname'];
$email=$row['email'];
$mobile=$row['mobile'];
$datas=$row['multipleData'];
$gender=$row['gender'];
$place=$row['place'];

if(isset($_POST['update'])){
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$datas=$_POST['data'];
$gender=$_POST['gender'];
$place=$_POST['place'];
$allData=implode(",", $datas);

$sql="update seriescrud set fname='$fname', lname='$lname', email='$email', mobile='$mobile', multipleData='$allData', gender='$gender', place='$place' where id='$id'";

$result=mysqli_query($con,$sql);
if($result){
    // echo"upated succefully";
    header('location:read.php');
}else{
    die(mysqli_die($con));
}
} 
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet"> 

    <title>Update Data</title>
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
        <form method="post">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" autocomplete="off" name="fname" value=<?php echo $fname?>>
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" autocomplete="off" name="lname" value=<?php echo $lname?>>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" autocomplete="off" name="email" value=<?php echo $email?>>
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" autocomplete="off" name="mobile" value=<?php echo $mobile?>>
            </div>
        <div> 
       <input type="checkbox" name="data[]" value="JavaScript"> JavaScript
       <input type="checkbox" name="data[]" value="React"> React
       <input type="checkbox" name="data[]" value="HTML"> HTML 
       <input type="checkbox" name="data[]" value="CSS"> CSS    
        </div>
        <div class="my-3">
    Gender
       <input type="radio" name="gender"value="male">Male</input>
       <input type="radio" name="gender"value="female">Female</input>
        <input type="radio" name="gender"value="kids">Kids</input>
</div> 
<div>
                <select name="place">
                    <option value="mumbai">Mumbai</option>
                    <option value="banglore">Banglore</option>            
                    <option value="kolkata">Kolkata</option>
                    <option value="Mysore">Mysore</option>
                    
                </select>

            </div>
            <div class="my-5">
            <button type="submit" class="btn btn-dark btn-lg my-5" name="update"> Update </button>
            </div>
        </form>
        </form>
        
</body>
</html>