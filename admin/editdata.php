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
<?php
    $id=$_GET['id'];
    $qry="SELECT * FROM `book` WHERE `id`='$id';";
    $run=mysqli_query($conn,$qry);
    $data=mysqli_fetch_assoc($run);
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
                        <h3 class="text-center">Edit Book Room: <?php echo $data['category'];?></h3>
                        <hr class="bg-secondary">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Check In :</label>
                                <input type="date" class="form-control" name="in" value="<?php echo $data['checkin'];?>">
                            </div>
                            <div class="form-group">
                                <label>Check Out :</label>
                                <input type="date" class="form-control" name="out"  value="<?php echo $data['checkout'];?>">
                            </div>
                            <div class="form-group">
                                <label>Enter Your Full Name :</label>
                                <input type="text" class="form-control" name="name"  value="<?php echo $data['name'];?>">
                            </div>
                            <div class="form-group">
                                <label>Enter Your Phone Number :</label>
                                <input type="tel"  value="<?php echo $data['phone'];?>" class="form-control" name="phone">
                            </div>
                            <a href="admin.php"><span class="text-primary">Back To Admin Panel</span></a>
                            <button class="btn btn-primary float-right" name="add">Update</button>
                            <p id="demo"></p>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
    if(isset($_POST['add'])){
        $in=$_POST['in'];
    $out=$_POST['out'];
    $fname=$_POST['name'];
    $tel=$_POST['phone'];
    $qry="UPDATE `book` SET `checkin`='$in',`checkout`='$out',`name`='$fname',`phone`='$tel' WHERE `id`=$id;";
    $run=mysqli_query($conn,$qry);
    if(!$run){
        ?><script>document.getElementById("demo").innerHTML = "Update is not Done";</script><?php
     }
    else{
        ?><script>document.getElementById("demo").innerHTML = "Update is successful";
        window.open('editroom.php','_self')
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