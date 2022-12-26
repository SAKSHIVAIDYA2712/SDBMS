<?php
    $login=false;
    $correct=true;
    if($_SERVER['REQUEST_METHOD']=='POST'){
      include 'partials/_dbconnect.php';
      $email=$_POST['email'];
      $password=$_POST['password'];

      $sql="Select * from users where email='$email' AND password='$password'";
      $res=mysqli_query($conn, $sql);
      $rows= mysqli_num_rows($res);
       if($rows==1){
        $login=true;
        session_start();
        $_session['loggedin']=true;
        header("location:home.php");
      }
      else if($rows==0 or $rows>1){
        $correct=false;
      }
    }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <div class="mycard">
            <div class="row">
                <div class="col-md-6">
                    <div class="leftpart">
                        <form class="myForm" action="/loginsystem1/login.php" method="post">
                            <h2>login Here</h2>
                            <p class="note">Enter your school email-id</p>
                            <div class="form-group">
                                <label for="fname">Email</label>
                                <input class="myInput" type="text" name="email" id="email" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="fname">Password</label>
                                <input class="myInput" type="text" name="password" id="password" class="form-control"
                                    required>
                            </div>
                            <input type="submit" class="butt" a href="loginsystem1/thome.php"></a>>

                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="rightpart">
                        <div class="box">
                           <h3 class="quote">"COMPETE WITH YOURSELF THAT'S THE TOP POSITION"</h3>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>


