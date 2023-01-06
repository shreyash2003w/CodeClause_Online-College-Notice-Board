<?php
session_start();
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
            <label>First Name:</label>
            <input type="text" class="form-control" name="fname" value="<?php echo $fname ?>">
        </div>

        <div class="form-group mt-2">
            <label>Last Name:</label>
            <input type="text" class="form-control" name="lname" value="<?php echo $lname ?>">
        </div>

        <div class="form-group mt-2">
            <label>Email:</label>
            <input type="text" class="form-control" name="email" value="<?php echo $email ?>">
        </div>

        <div class="form-group mt-2">
            <label>Password:</label>
            <input type="password" class="form-control" name="password" value="<?php echo $password ?>">
        </div>
        <div class="form-group mt-2">
            <label>Select Class:</label>
            <select class="form-control" name="class" required>
                <option><?php echo $class ?></option>
                <option>First Year</option>
                <option>Second Year</option>
                <option>Third Year</option>
                <option>Fourth Year</option>
                
            </select>
        </div>
        <button type="submit" name="update_profile" class="btn btn-primary mt-2">Update</button>

    </form>
</body>
</html>