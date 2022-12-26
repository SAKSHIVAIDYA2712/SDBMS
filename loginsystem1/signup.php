<?php
     $ssignin=false;
     if($_SERVER["REQUEST_METHOD"]=='POST'){
     include 'partials/_dbconnect.php';
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $password=$_POST['password'];
     $email=$_POST['email'];
     $sql1="SELECT * from users WHERE email='$email'AND firstname='$fname' AND lastname='$lname'";
     $sql2="SELECT * from student_details WHERE email='$email'";
     $res1=mysqli_query($conn,$sql1);
     $res2=mysqli_query($conn, $sql2);
     $nrow1=mysqli_num_rows($res1);
     $nrow2=mysqli_num_rows($res2);
     $frow2=mysqli_fetch_assoc($res2);
     if($nrow1>0){
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>You already have an account please login or you are not register student of our school </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
     }
     else if($nrow1==0 && $nrow2==1){
     if($frow2['fname']=$fname && $frow2['lname']=$lname && $frow2['email']=$email){
     $sql="INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`) VALUES ('$fname', '$lname', '$email', '$password');";
     
     $res=mysqli_query($conn, $sql);
     if($res){
       $ssignin="true";
     }
     else{
        echo'<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Invalid credentials<a class="loginalert" href="login.php">Login Here</a> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
     }
     }
    }

}


?>



<!DOCTYPE html>
<html>

<head>
    <title>Login Form Design</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
    <style>
        .rightpart{
            padding:100px;
        }
    </style>
</head>

<body>
    <?php
         if($ssignin){
            echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>You are signedin successfully.<a class="loginalert" href="login.php">Login Here</a> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
         }
    ?>
        <div class="container">
        <div class="mycard">
            <div class="row">
                <div class="col-md-6">
                    <div class="leftpart">
                        <form class="myForm" action="/loginsystem1/signup.php" method="post">
                            <h2>Signup Here</h2>
                            <p class="note">Enter your school email-id</p>
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input class="myInput" type="text" name="fname" id="fname" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input class="myInput" type="text" name="lname" id="lname" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="myInput" type="text" name="email" id="email" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="myInput" type="text" name="password" id="password" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="rpassword">Repeat-password</label>
                                <input class="myInput" type="text" name="rpassword" id="rpassword" class="form-control"
                                    required>
                            </div>
                            <input type="submit" class="butt" value="CREATE ACCOUNT">

                            <div class="form-group mt-3 ml-3">
                                <p> Already have an account? <a class="login" href="login.php">Login Here</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rightpart">
                        <div class="box">
                            <H2 class="quote">
                        “Education is the passport to the future, for tomorrow belongs to those who prepare for it today.”
                            </H2>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>