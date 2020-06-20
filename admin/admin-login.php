<?php
include('../db.php');
session_start();
if(isset($_SESSION['id'])){    
    header('location:admin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

</head>
<body>
<section>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 bg p-5 rounded width_con">
                <div class="">     
                    <h3 class="text-white text-center">Log In</h3>
                    <hr class="bg-white">
                    <div class="text_clr">
                        <form action="admin-login.php" method="post">
                            <div class="form-group">
                                <label>Username or Email :</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password :</label>
                                <input type="password" class="form-control"name="pass" required>
                            </div>
                            <button class="btn btn-primary form-control" name="login">Submit</button>
                        </form><br>                   
                        <p class="text-center"><a class="text-primary" href="../index.php">Back To Home</a></p>
                        <p id="demo" class="text-center"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
if(isset($_POST['login'])){
    include('../db.php');
    $mail=$_POST['email'];
    $pass=$_POST['pass'];
    $qry="SELECT `id` FROM `admin` WHERE `username`='$mail' AND `password`='$pass';";
    $run=mysqli_query($conn,$qry);
    if(mysqli_num_rows($run)<1){
        ?><script>document.getElementById("demo").innerHTML = "Login is not Done";</script><?php
     }
    else{
        ?><script>document.getElementById("demo").innerHTML = "Login is successful";
        window.open('admin.php','_self')
        </script>
        <?php
        $data=mysqli_fetch_assoc($run);
        $id=$data['id'];
        echo "id= ".$id;
        $_SESSION['id']=$id;
    }
}
?>
    <script src="../jquery-3.5.1.slim.min.js"></script>
<script src="../popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
</body>
</html>