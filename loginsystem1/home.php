

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HCPS SCHOOL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,500,0,0" />
    <script src="https://kit.fontawesome.com/588cbecf27.js" crossorigin="anonymous"></script>
    <style>
      .logout{
        margin-right: 10px;
        margin-top: 5px;
      }
    </style>
  </head>
  <body>
  <?php
     include 'partials/nav.php';
   ?>

   <div id="homepage">
    <section id="title">
     <!-- START MAIN AREA -->
      <main class="site-main">
        <!-- START BANNER AREA -->
        <section class="site-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 site-title">
                        <h3 class="title-text">Results are out!!</h3>
                        <h1 class="title-text ">To know how to check</h1>
                        <h4 class="title-text ">click below button</h4>
                        <div class="site-buttons">
                            <div class="d-flex flex-row flex-wrap">
                                <button type="button"
                                    class="btn button primary-button mr-4 text-uppercase"><a class="btn1" href="#aboutpage">Click Here</a></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 banner-image">
                        <img src="images/result.png" alt="women-image" class="img-fluid">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
    </section>
    </div>

   
   <div class="about" id="aboutpage">
      <section id="check">
           <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Step-1</h5>
                <p class="card-text"><b>  Enter your email address correctly which you entered at the time of signup.Click below to fill the form to see your result </b> </p>
                <br>
              <a href="#resultpage" class="btn btn-primary">Click Here</a>
              </div>
           </div>

           <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Step-2</h5>
                <p class="card-text"> <b>Enter your registration number in second placeholder.Click below to fill the form to see your result </b></p>
                <br>
              <a href="#resultpage" class="btn btn-primary">Click Here</a>
              </div>
           </div>

           <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Step-3</h5>
                <p class="card-text"><b>Enter password in third placeholder.Click on submit button.Click below to fill the form to see your result</b></p>
                <br>
              <a href="#resultpage" class="btn btn-primary">Click Here</a>
              </div>
           </div>
        </section>
    </div> 
  
<div id="resultpage">
<form action="/loginsystem1/home.php" method="post">
  <div class="container">
    <h2  class="text-center hresult">Check Your Result Here</h2>
    <hr>
    <div class="mb-3">
    <label for="email" class="form-label">  <b>email address</b></label>
    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="regno" class="form-label"> <b>Registration Number</b></label>
    <input type="text" class="form-control" id="regno" name="regno">
    </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label"> <b>Password</b></label>
    <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="sbtn btn btn-primary">Submit</button>
  </div>
</form>
</div>


<div class="rtable" id="contactpage">
<div class="container ">
<table class="table">
    <thead>
      <tr>
        <th scope="col">Reg no.</th>
        <th scope="col">first name</th>
        <th scope="col">Last name</th>
        <th scope="col">Physics</th>
        <th scope="col">Chemistry</th>
        <th scope="col">Maths</th>
        <th scope="col">Total</th>
        <th scope="col">Percentage</th>
      </tr>
    </thead>
  <?php
      if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'partials/_dbconnect.php';
        $email=$_POST['email'];
        $regno=$_POST['regno'];
        $password=$_POST['password'];
        // $sql="Select * from users INNER JOIN result ON users.username=result.username AND users.username='$username' AND users.password='$password'";
        $sql="Select * from student_details,performance,users WHERE student_details.regno='$regno' AND performance.regno='$regno' AND users.password='$password' AND users.email='$email' AND student_details.email='$email'";
        $res=mysqli_query($conn, $sql);
        $rows=mysqli_num_rows($res);
        if($rows==1){
             $frow=mysqli_fetch_assoc($res);
             $total= $frow['Physics']+$frow['Chemistry']+$frow['Maths'];
             $percentage=(($total)/300)*100;
             echo "<tr>
               <td>".$frow['regno']."</td>
               <td>".$frow['fname']."</td>
               <td>".$frow['lname']."</td>
               <td>".$frow['Physics']."</td>
               <td>".$frow['Maths']."</td>
               <td>".$frow['Chemistry']."</td>
               <td>".$total."</td>
               <td>".$percentage."</td>
             </tr>";
        }
      }
?>
 </tbody>
 </table>
</div>
</div>
<div id="resultpage">
<form action="/loginsystem1/home.php" method="post">
  <div class="container">
    <h2  class="text-center hresult">Contact</h2>
    <p class="text-center"> if you face any issue please contact</p>
    <hr>
    <?php 
            $alert=false;
            if(isset($_POST['submit'])){
            include 'partials/_dbconnect.php';
            $fname=$_POST['fname'];
            $lname=$_POST['lname'];
            $email=$_POST['email'];
            $message=$_POST['message']; 
            $sql="INSERT INTO `contact` (`firstname`, `lastname`,`email`, `message`) VALUES ('$fname', '$lname','$email', '$message');";
            $res=mysqli_query($conn, $sql);
            if($res){
                $alert=true;
            }
           }
           
    ?>
    <div class="mb-3">
    <label for="fname" class="form-label">  <b>First Name</b></label>
    <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
    <label for="lname" class="form-label"> <b>Last Name</b></label>
    <input type="text" class="form-control" id="lname" name="lname">
    </div>
    <div class="mb-3">
    <label for="femail" class="form-label"> <b>Email</b></label>
    <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
    <label for="message"><b>Message</b></label>
    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <button type="submit" class="sbtn btn btn-primary" name="submit">Submit</button>
  </div>
</form>
</div>
         
<footer>
        <div class="text-center">
             <h6 class="footer-text">copyright@sdv1926</h6>
        </div>
</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>




