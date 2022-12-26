<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  </head>

  <style>
     hr{
        margin: 0px;
    }
    h2{
        margin-top:10px;
    }
    /* .rtable{
        margin-top:10px;
    } */
    .container{
        margin-top:15px;
    }
  </style>
  <body>
   <?php
      include 'tpartials/tnav.php';
   ?>
   <div class="text-center">
      <h2>Student Records</h2>
   </div>
   <hr>
  <div class="container rtable">
  <table class="table display" id="myTable">
  <thead>
    <tr>
      <th scope="col">sno</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Registration number</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Attendance</th>
      <th scope="col">Physics</th>
      <th scope="col">Chemistry</th>
      <th scope="col">Maths</th>
      <th scope="col">Edit/Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php 
         include 'tpartials/tdbconnect.php';
         $sql="SELECT * from `student_details`, `attendance`,`performance` WHERE student_details.regno=attendance.regno AND attendance.regno=performance.regno";
         $res=mysqli_query($conn, $sql);
         $row=mysqli_num_rows($res);
         $i=1;
         while($i <=$row){
            $frow=mysqli_fetch_assoc($res);
            $regno=$frow['regno'];
            // echo "$regno";
            echo "<tr>
            <td>".$i."</td>
            <td>".$frow['fname']."</td>
            <td>".$frow['lname']."</td>
            <td>".$frow['regno']."</td>
            <td>".$frow['gender']."</td>
            <td>".$frow['email']."</td>
            <td>".$frow['address']."</td>
            <td>".$frow['attendance']."</td>
            <td>".$frow['Physics']."</td>
            <td>".$frow['Chemistry']."</td>
            <td>".$frow['Maths']."</td>
            <td><button class='btn btn-primary'> <a href='update.php?updateid=".$regno."' class='text-light'>Update</a> </button><button class='btn btn-danger'> <a href='delete.php?deleteid=".$regno."' class='text-light'>Delete</a></button></td>
            </tr>";
            $i=$i+1;
         }
     ?>
  </tbody>
</table>
</div>
<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Edit Record
</button> -->


 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> -->
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
     <script>
         $(document).ready( function () {
         $('#myTable').DataTable();
         } );
     </script>

  </body>
</html>