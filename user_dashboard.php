<?php session_start();
   if(isset($_POST['update_profile'])){

    $connection=mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"online_notice_board");
    $query="update user set
      fname='$_POST[fname]',lname='$_POST[lname]',email='$_POST[email]',password='$_POST[password]',class='$_POST[class]' where email='$_SESSION[emailid]'";
      $query_run=mysqli_query($connection,$query);
      if($query_run){
        echo "<script type='text/javascript'>
        alert('Profile updated successfully');
        window.location.href='user_dashboard.php'
        </script>";
      }
      else{
        echo "<script type='text/javascript'>
        alert('Profile update failed.Try again');
        window.location.href='user_dashboard.php'
        </script>";
      }
   }

  //  Show Home Profile 

  $connection=mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"online_notice_board");

$fname="";
$lname="";
$email="";
$password="";
$class="";
$query="select * from user where email='$_SESSION[emailid]'";
$query_run = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($query_run)){
        $fname=$row['fname'];
        $lname=$row['lname'];
        $email=$row['email'];
        $password=$row['password'];
        $class=$row['class'];
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Notice Board</title>
    <!-- BOOTSTRAP FILES -->
    <link rel="stylesheet" type="text/css"href="bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/style.css">
    <!-- JQUERY FILES -->
    <script src="jquery/jquery-3.6.3.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
       $("#edit_profile_button").click(function(){
        $("#main_content").load('edit_profile.php');
       });   

       $("#view_notice_button").click(function(){
        $("#main_content").load('view_notice.php');
       });

      });
    </script>
  </head>
  <body>
    <!-- header -->
    <div class="row justify-content-md-center" id="header">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <h3>Online Notice Board System</h3>
      </div>
      <div class="col-md-4"></div>
    </div>
    <br>
    <!-- Content -->
    <section id="container">
      <div class="row">
        <div class="col-md-2" id="left_sidebar">
          <img src="images/profile.jpg" alt="profile" class=" img-fluid rounded" width="200px" height="200px">
          <b><?php echo  $_SESSION['emailid'];?></b><hr>
          <button type="button" class="  btn btn-outline-primary w-100 mt-2"name="button" id="edit_profile_button">Edit Profile</button>
          <button type="button" class="   btn btn-outline-primary w-100 mt-2"name="button" id="view_notice_button">View Notices</button>
          <a href="logout.php" type="button" class="  btn btn-outline-primary w-100 mt-2"name="button">Logout</a>
        </div>
        <div class="col-md-8 mx-auto" id="main_content">
          <h2>Welcome to your dashboard</h2>
          <h4>Profile</h4>
          <h6>Name :</h6><p><?php echo $fname . " ".$lname?></p>
          <h6>EmailID :</h6><p><?php echo  $email?> </p>
          <h6>Class :</h6><p><?php echo $class ?> </p>
          <p>Hello Students.</p>
          <p>We are happy to bring you on the platform, all the important updates and notices are provied to you on your profile.So stay tuned with the updates.</p>
        </div>
      </div>
    </section>

    </div>
  </body>
</html>
