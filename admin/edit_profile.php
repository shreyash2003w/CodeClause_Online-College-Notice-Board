<?php
session_start();
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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <div class="form-group mt-2">
            <label> Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
        </div>

        <div class="form-group mt-2">
            <label>Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
        </div>

        <div class="form-group mt-2">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" value="<?php echo $password ?>">
        </div>
        
        <button type="submit" name="update_profile" class="btn btn-primary mt-2">Update</button>

    </form>
</body>
</html>