<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- BOOTSTRAP FILES -->
    <link rel="stylesheet" type="text/css"href="../bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <script src="../bootstrap-5.3.0-alpha1-dist/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <!-- CSS FILES -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- JQUERY FILES -->
    <script src="../jquery/jquery-3.6.3.min.js"></script>
</head>
<body>
    <h3>Notices</h3><br>
    <?php 
     $connection=mysqli_connect("localhost","root","");
     $db = mysqli_select_db($connection,"online_notice_board");
     $query= 'select * from notice';
     $query_run=mysqli_query($connection,$query);
     while($row=mysqli_fetch_assoc($query_run)){
        ?>
        <div class="card mt-2">
            <div class="card-body mt-2">
                <h5 class="card-title"><?php echo $row['title'];?></h5>
                <p class="card-text"><?php echo $row['message'];?></p>
            </div>
        </div>
        <?php
     }
     ?>
</body>
</html>