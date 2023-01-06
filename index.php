<?php
session_start();
$connection=mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"online_notice_board");
if(isset($_POST['login'])){
  $query="select * from user where email='$_POST[email]' AND password='$_POST[password]'";
  $query_run = mysqli_query($connection,$query);
  if(mysqli_num_rows($query_run)){
    
    while($row=mysqli_fetch_assoc($query_run)){
      $_SESSION['class']=$row['class'];
      $_SESSION['emailid']=$_POST['email'];
     echo"<script>
      window.location.href='user_dashboard.php';
      </script>";
    }
  }
  else{
    echo "<script>alert('Invalid Credentials.');
    window.location.href='index.php';
    </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>
    <!-- BOOTSTRAP FILES -->
    <link rel="stylesheet" type="text/css"href="bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- HEADER SECTION -->

      <div class="row justify-content-md-center" id="header">
        <div class="col-md-4"></div>
        <div class="col-md-4">
          <h3>Online Notice Board System</h3>
        </div>
        <div class="col-md-4"></div>
      </div>
     <!-- Login Form -->
<section id="login_form">
  <div class="row">
    <div class="col-md-4 m-auto block">
      <center>
        <h4>Login Form</h4>
      </center>
      <form  action="index.php" method="post">
        <div class="form-group mt-2">
          <label >Email ID:</label>
          <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
        </div>
        <div class="form-group mt-2">
          <label >Password:</label>
          <input type="password" class="form-control " name="password" placeholder="Enter Your password">
        </div>
        <button class="btn btn-primary mt-2" type="submit" name="login">Login</button>
      </form>
      <a href="register.php">Click here to register</a>
    </div>
  </div>
</section>
</body>
</html>
