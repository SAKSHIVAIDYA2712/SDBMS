<?php
    include 'tpartials/tdbconnect.php';
    if(isset($_GET['deleteid'])){
        $regno=$_GET['deleteid'];
         
      $sql="DELETE FROM student_details WHERE regno='$regno'";
      $res=mysqli_query($conn, $sql);
      if($res){
          header('location:records.php');
      }
      else{
        die(mysqli_error($con));
      }
    }
?>

