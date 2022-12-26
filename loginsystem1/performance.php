<?php
  $add=false;
  if($_SERVER["REQUEST_METHOD"]=='POST'){
   include 'tpartials/tdbconnect.php';
   $regno=$_POST['regno'];
   $pmarks=$_POST['pmarks'];
   $cmarks=$_POST['cmarks'];
   $mmarks=$_POST['mmarks'];
   $sql="INSERT INTO `performance` (`regno`, `Physics`, `Chemistry`, `Maths`) VALUES ('$regno', '$pmarks', '$cmarks', '$mmarks');";
   $res=mysqli_query($conn, $sql);
   if($res){
      $add=true;
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
    <link rel="stylesheet" href="css/performance.css">
  </head>
  <body>
    <?php
        include 'tpartials/tnav.php';
        if($add){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>Details Added Successfully</strong>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
        }
    ?>

<form action="/loginsystem1/performance.php" method="post">
  <div class="container">
    <h2>Add Academic Performance Details</h2>
    <hr>
    <label for="regno"><b>Registration Number</b></label>
    <input type="text" name="regno" id="regno"  class="form-control" required>
    
    <label for="pmarks"><b>Physics</b></label>
    <input type="number" name="pmarks" id="pmarks" class="form-control">

    <label for="cmarks"><b>Chemistry</b></label>
    <input type="number" name="cmarks" id="cmarks" class="form-control">

    <label for="mmarks"><b>Maths</b></label>
    <input type="number" name="mmarks" id="mmarks" class="form-control">

    <button type="submit" class="registerbtn">Add Details</button>
  </div>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>