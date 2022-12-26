<?php
    $insert=false;
   if(isset($_POST['adddetails'])){
   include 'tpartials/tdbconnect.php';
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $regno=$_POST['regno'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $sql="INSERT INTO `student_details` (`fname`, `lname`, `regno`, `gender`, `email`, `address`, `datetime`) VALUES ('$fname', '$lname', '$regno', '$gender', '$email', '$address', current_timestamp());";
    $res=mysqli_query($conn, $sql);
    if($res){
      session_start();
      $_SESSION['regno']=$regno;
        $insert=true;
    }
   }
    ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/student.css">
  </head>
  <body>
    <?php
     include 'tpartials/tnav.php';
     if($insert==true){
       echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Details Added Successfully</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
     }
    ?>
  <form action="/loginsystem1/student.php" method="post">
  <div class="container">
    <h2>Add Student Details</h2>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" name="fname" id="fname"  class="form-control" required>

    <label for="lname"><b>Last Name</b></label>
    <input type="text" name="lname" id="lname"  class="form-control" required>

    <label for="regno"><b>Registration Number</b></label>
    <input type="text" name="regno" id="regno"  class="form-control" required>

    <label for="gender"><b>Gender</b></label>
    <input type="text"  name="gender" id="gender"  class="form-control" required>

    <label for="email"><b>Email</b></label>
    <input type="text"  name="email" id="email"  class="form-control"  required>

    <label for="address"><b>Address</b></label>
    <textarea name="address" id="address" cols="30" rows="4" class="form-control tarea"></textarea>


    <button type="submit" class="registerbtn" name="adddetails">Add Details</button>
  </div>
</form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
