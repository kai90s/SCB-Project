<?php session_start();

if (empty($_SESSION['u_fname'])) {
  header('location:request-login.php');   
  }
//connect 2 database
require 'connection.php';
$uid=$_SESSION['u_id'];
$fname=$_SESSION['u_fname'];
$lname=$_SESSION['u_lname'];
$phone=$_SESSION['phoneno'];

$_SESSION['u_fname']=$fname;
$_SESSION['u_lname']=$lname;
$_SESSION['phoneno']=$phone;
$_SESSION['u_id']=$uid;

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
<title>Sham Car Booking</title>
<?php include "header.php";?>
 
</head>

<body>

<div style="background-image: url('images/bg.jpg');background-size: cover;">

  <!-- Page Content -->
  <div class="container">
<!--PageFeatures-->
          
          <!--table card-->
          <div class="card shadow mb-5">
              <div class="card-body">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>  
                      <th>Booking Information</th>
                    </tr>
                  </thead>
  
                  <tbody>
                      <td>

<?php
//Display car information
//request car ID from available_car.php 
$id=$_GET['id'];
$qr=mysqli_query($db,"SELECT car.*, renter.* FROM car 
join renter on (car.owner_id=renter.rent_id)
where car_id = '$id' ");

if($qr==false) 
{
echo ("Query cannot be executed!<br>");
echo ("SQL Error : ".mysqli_error($db));
}

//make session by fetching data from db
$rekod=mysqli_fetch_array($qr);
$_SESSION['car_id']=$rekod['car_id'];
$_SESSION['brand']=$rekod['brand'];
$_SESSION['car_name']=$rekod['car_name'];
$_SESSION['r_phoneno']=$rekod['r_phoneno'];


//display car image
echo '<a href="view_car.php?id='. $rekod['car_id'] .' "><div class="text-center mt-5"><img src="admin/img/car/' . $rekod['image'] .' " width="300" height="180"></div></a> ';

//display data from db

echo '<div class="form-group">';

echo '<div class="row ml-2"> <h5>Car name :&nbsp'.$rekod['brand'] ."&nbsp".$rekod['car_name'].'</h5></div>';

echo '<div class="row ml-2 mt-3"> <h5>Car owner name :&nbsp'.$rekod['r_fname']."&nbsp".$rekod['r_lname'].'</h5></div>';

echo '<div class="row ml-2 mt-3"> <h5>Owner phone number :&nbsp'.$rekod['r_phoneno']. '</h5></div>';
echo '<div class="row ml-2 mt-3"> <h5>Renter fullname :&nbsp'.$fname."&nbsp".$lname. '</h5></div>';
echo '</div>';
?>

<form method="POST" action="proceed.php" enctype="multipart/form-data">
<?php
echo '<div class="row">';
echo '<div class="col-lg-6 ml-2 mt-3"> <h5>Enter pickup date :&nbsp<input name="dateStart" type="date" class="form-control"  required></div>';
echo '<div class="col-lg-6 ml-2 mt-3"> <h5>Enter end date :&nbsp<input name="dateEnd" type="date" class="form-control"  required></div>';
echo '</div>';
 
echo'<br><br>';

//btn cancel
echo'<button class="btn btn-danger"><a href="available_car.php" class="text-white">Cancel book</a>
</button>';

//shortform 4 NoBreakingSpace
echo'&nbsp&nbsp&nbsp';

//btn approve
echo'<input name="btn_proceed" class="btn btn-success" type="submit"value="Proceed">';   
?>
<?php


?>        

</form>
      
              
      





                
                      </td>
                  </tbody>
                </table>

            </div>
          </div>
      </div>
<!-- /close container -->
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

</body>
<?php include "footer.php";?>
</html>