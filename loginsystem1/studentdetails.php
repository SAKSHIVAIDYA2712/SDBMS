<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/student.css"> -->
    <style>
        .sdtitle{
              margin-top:20px;
        }
        .container {
       padding: 30px;
        }

        hr{
            margin:0px;
        }
    </style>
  </head>
  <body>
    <?php
     include 'tpartials/tnav.php';
     ?>

<div class="text-center sdtitle">
<h2>Student Details</h2>
<hr>
</div>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Reg Number</th>
      <th scope="col">gender</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
    </tr>
  </thead>

  <?php    
    
     include 'tpartials/tdbconnect.php';
     session_start();
     $s=$_SESSION['regno'];
     if($s!=NULL){
     $sql="SELECT* from `student_details` WHERE regno='$s'";
     $res=mysqli_query($conn, $sql);
     $row=mysqli_fetch_assoc($res);
    if($res){
        echo "<tr>
        <td>".$row['fname']."</td>
        <td>".$row['lname']."</td>
        <td>".$row['regno']."</td>
        <td>".$row['gender']."</td>
        <td>".$row['email']."</td>
        <td>".$row['address']."</td>
      </tr>";
    }
  }
  ?>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
