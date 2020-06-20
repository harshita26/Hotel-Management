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
                        <h3 class="text-center">Add Room Category</h3>
                        <hr class="bg-secondary">
                        <form action="addroom.php" method="post">
                            <div class="form-group">
                                <label>Room Type :</label>
                                <input type="text" class="form-control" name="type" required>
                            </div>
                            <div class="form-group">
                                <label>No of Rooms :</label>
                                <input type="number" class="form-control" name="num" required>
                            </div>
                            <div class="form-group">
                                <label>No of Bed :</label>
                                <input type="number" class="form-control" name="bed" required>
                            </div>
                            <div class="form-group">
                                <label>Bed Type :</label>
                                <select name="bedtype" class="form-control" required>
                                    <option value="1" selected disabled>Select</option>
                                    <option value="single">Single</option>
                                    <option value="double">Double</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Facility :</label>
                                <input type="text" class="form-control" name="facility" required>
                            </div>
                            <div class="form-group">
                                <label>Price Per Night :</label>
                                <input type="text" class="form-control" name="price" required>
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
    $roomtype=$_POST['type'];
    $noofroom=$_POST['num'];
    $noofbed=$_POST['bed'];
    $bedtype=$_POST['bedtype'];
    $facilities=$_POST['facility'];
    $price=$_POST['price'];
    $qry="INSERT INTO `add_room`(`roomtype`, `numroom`, `numbed`, `bedtype`, `facility`, `price`) VALUES ('$roomtype','$noofroom','$noofbed','$bedtype','$facilities','$price')";
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


    <script src="../js/jquery-3.5.1.slim.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

</body>
</html>