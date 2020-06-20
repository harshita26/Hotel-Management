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
    $qry="SELECT * FROM `add_room` WHERE `id`='$id';";
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
                        <h3 class="text-center">Edit Room Category</h3>
                        <hr class="bg-secondary">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Room Type Name :</label>
                                <input type="text" class="form-control" name="type" value="<?php echo $data['roomtype'];?>">
                            </div>
                            <div class="form-group">
                                <label>No of Rooms :</label>
                                <input type="number" class="form-control" name="num"  value="<?php echo $data['numroom'];?>">
                            </div>
                            <div class="form-group">
                                <label>No of Bed :</label>
                                <input type="number" class="form-control" name="bed"  value="<?php echo $data['numbed'];?>">
                            </div>
                            <div class="form-group">
                                <label>Bed Type :</label>
                                <select name="bedtype"  value="<?php echo $data['bedtype'];?>" class="form-control">
                                    <option value="1" selected disabled>Select</option>
                                    <option value="single">Single</option>
                                    <option value="double">Double</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Facility :</label>
                                <input type="text"  value="<?php echo $data['facility'];?>" class="form-control" name="facility">
                            </div>
                            <div class="form-group">
                                <label>Price Per Night :</label>
                                <input type="text"  value="<?php echo $data['price'];?>" class="form-control" name="price">
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
        $roomtype=$_POST['type'];
    $noofroom=$_POST['num'];
    $noofbed=$_POST['bed'];
    $bedtype=$_POST['bedtype'];
    $facilities=$_POST['facility'];
    $price=$_POST['price'];
    $qry="UPDATE `add_room` SET `roomtype`='$roomtype',`numroom`='$noofroom',`numbed`='$noofbed',`bedtype`='$bedtype',`facility`='$facilities',`price`='$price' WHERE `id`=$id;";
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

<script src="../js/bootstrap.min.js"></script>
</body>
</html>