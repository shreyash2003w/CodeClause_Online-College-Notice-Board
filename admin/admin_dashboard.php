<?php session_start();
   if(isset($_POST['update_profile'])){

    $connection=mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"online_notice_board");
    $query="update admin set
      name='$_POST[name]',email='$_POST[email]',password='$_POST[password]' where email='$_SESSION[emailid]'";
      $query_run=mysqli_query($connection,$query);
      if($query_run){
        echo "<script type='text/javascript'>
        alert('Profile updated successfully');
        window.location.href='admin_dashboard.php'
        </script>";
      }
      else{
        echo "<script type='text/javascript'>
        alert('Profile update failed.Try again');
        window.location.href='admin_dashboard.php'
        </script>";
      }
   }

//    Notices

if(isset($_POST['send_notice'])){
    $connection=mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"online_notice_board");
    $query="insert into notice values(null,'$_POST[post_date]','$_POST[to_whom]','$_POST[subject]','$_POST[message]')";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
      echo "<script>alert('Notice Created.');
      window.location.href='admin_dashboard.php';
      </script>";
    }
    else{
      echo "<script>alert('Filed.Try again');
      window.location.href='admin_dashboard.php';
      </script>";
    }
  }
// Home profile
$connection=mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,"online_notice_board");
$name="";
$email="";
$password="";
$query="select * from admin where email='$_SESSION[emailid]'";
$query_run = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($query_run)){
  $name=$row['name'];
  $email=$row['email'];
  $password=$row['password'];
       
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Notice Board</title>
    <!-- BOOTSTRAP FILES -->
    <link rel="stylesheet" type="text/css"href="../bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- JQUERY FILES -->
    <script src="../jquery/jquery-3.6.3.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
       $("#edit_profile_button").click(function(){
        $("#main_content").load('edit_profile.php');
       });

       $("#create_notice_button").click(function(){
        $("#main_content").load('create_notice.php');
       });

       $("#view_notice_button").click(function(){
        $("#main_content").load('view_all_notice.php');
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
          <img src="../images/profile.jpg" alt="profile" class="image-rounded" width="200px" height="200px">
          <b><?php echo  $_SESSION['emailid'];?></b><hr>
          <button type="button" class="  btn btn-primary w-100 mt-2"name="button" id="edit_profile_button">Edit Profile</button>
          <button type="button" class="  btn btn-primary w-100 mt-2"name="button" id="create_notice_button">Create Notice</button>
          <button type="button" class="   btn btn-primary w-100 mt-2"name="button" id="view_notice_button">View Notices</button>
          <a href="logout.php" type="button" class="  btn btn-primary w-100 mt-2"name="button">Logout</a>
        </div>
        <div class="col-md-8 mx-auto" id="main_content">
          <h2>Welcome to your dashboard</h2>
          <h4>Profile</h4>
          <h6>Name :</h6><p><?php echo $name?></p>
          <h6>EmailID :</h6><p><?php echo $email?> </p>
          <p>Hello Admin.</p>
          <p>Now with the help of platform you are able to send important updates and notices to all students or to the particular classes.</p>
        </div>
      </div>
    </section>

    </div>
  </body>
</html>
