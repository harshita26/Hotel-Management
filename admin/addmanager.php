<?php
        include('../db.php');
        session_start();
        if($_SESSION['id']){
             echo "";
        }
        else
        {
            header('location:admin-login.php');
        }        
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
    <header>
       <div class="container p-md-0">
            <div class="row">
                <div class="col-12">
                    <img src="../images/home_banner.jpg" alt="logo" class="img-fluid imglogo">
                </div>
            </div>
       </div>
    </header>
    <section>
        <div class="container bg_sec rounded mb-5">
            <div class="row">
                <div class="col-12">             
                    <div class="text_clr p-4">
                        <h3 class="text-center">Add Your Manager</h3>
                        <hr class="bg-secondary">
                        <form action="addmanager.php" method="post">
                            <div class="form-group">
                                <label>Full Name :</label>
                                <input type="text" class="form-control" name="fname" required>
                            </div>
                            <div class="form-group">
                                <label>Username :</label>
                                <input type="text" class="form-control" name="uname" required>
                            </div>
                            <div class="form-group">
                                <label>Email :</label>
                                <input type="email" class="form-control" name="mail" required>
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" class="form-control" name="pass" minlength="6">
                            </div>
                            <a href="admin.php"><span class="text-primary">Back To Admin Panel</span></a>
                            <button class="btn btn-primary float-right" name="add">Add</button>
                            <p id="demo"></p>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
if(isset($_POST['add'])){
    include('db.php');
    $name=$_POST['fname'];
    $uname=$_POST['uname'];
    $email=$_POST['mail'];
    $password=$_POST['pass'];
    $qry="INSERT INTO `admin`(`fullname`, `username`, `email`, `password`) VALUES ('$name','$uname','$email','$password');";
    $run=mysqli_query($conn,$qry);
    if(!$run){
        ?><script>document.getElementById("demo").innerHTML = "Add is not Done";</script><?php
     }
    else{
        ?><script>document.getElementById("demo").innerHTML = "Add is successful";
        </script>
        <?php
    }
}
?>


    <script src="../jquery-3.5.1.slim.min.js"></script>
<script src="../popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>