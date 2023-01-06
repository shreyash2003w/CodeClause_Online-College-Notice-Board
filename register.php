<?php
$connection=mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"online_notice_board");
if(isset($_POST['register'])){
  $query="insert into user values(null,'$_POST[fname]','$_POST[lname]','$_POST[email]',$_POST[class],'$_POST[password]')";
  $query_run = mysqli_query($connection,$query);
  if($query_run){
    echo "<script>alert('Registration Successfull.');
    window.location.href='index.php';
    </script>";
  }
  else{
    echo "<script>alert('Registration Filed.Try again');
    window.location.href='register.php';
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
        <h4>Registration Form</h4>
      </center>
      <form  action="register.php" method="post">
        <div class="form-group mt-2">
          <label >First Name:</label>
          <input type="text" class="form-control" name="fname" placeholder="Enter Your first name">
        </div>
        <div class="form-group mt-2">
          <label >Last Name:</label>
          <input type="text" class="form-control" name="lname" placeholder="Enter Your last name">
        </div>
        <div class="form-group mt-2">
          <label >Email ID:</label>
          <input type="text" class="form-control" name="email" placeholder="Enter Your Email">
        </div>
        <div class="form-group mt-2">
          <label >Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Enter Your password">
        </div>
        <div class="form-group mt-2">
          <label >Class:</label>
          <select class="form-control" name="class">
            <option>--Select Class--</option>
            <option>First Year</option>
            <option>Second Year</option>
            <option>Third Year</option>
            <option>Fourth Year</option>
           
          </select>
        </div>
        <button class="btn btn-primary mt-2" type="submit" name="register">Register</button>
      </form>
      <a href="index.php">Click here to login</a>
    </div>
  </div>
</section>
</body>
</html>
