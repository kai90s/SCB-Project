<?php session_start();
require'connection.php';
$id=$_GET['id'];
$qr1=mysqli_query($db,"SELECT user.*,booking.*,car.* from user
  join booking on (user.u_id=booking.user_id)
  join car on (booking.car_id=car.car_id)
  where u_id=$id");

$rs=mysqli_fetch_array($qr1);

$qr2=mysqli_query($db,"SELECT booking.* from booking");

$res=mysqli_fetch_array($qr2);
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

    <div class="row">
        <div class="col-12 mt-4">
          <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <h2 style="color: white;">Sham car Booking</h2>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-4 text-left">
                          
                            <p class="font-weight-bold mb-4">Client Information</p>
                            <p class="mb-1"><?php echo $rs['u_fname']." ".$rs['u_lname'];?>
                            </p>
                            
                            <p class="mb-1"><?php echo $rs['address'];?></p>
                            
                        
                        </div>
                        
                        <div class="col-md-4 text-right"></div>
                        <div class="col-md-4 text-right">
                            <p class="font-weight-bold mb-1">Invoice </p>
                            <p class="text-muted">Due to : <?php echo  date("d/m/Y");?></p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        

                        
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Book ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Car ID</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Car Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Car type</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Transmission</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $rs['book_id'];?></td>
                                        <td><?php echo $rs['car_id'];?></td>
                                        <td><?php echo $rs['brand']." ".$rs['car_name'];?></td>
                                        <td><?php echo $rs['car_type'];?></td>
                                        <td><?php echo $rs['transmission'];?></td>
                                        <td><?php echo $res['status'];?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    
                    <a onclick="window.print()"><span class="fa fa-print"></span></a>
                    
<div id="printableArea">
<input type="button" onclick="printDiv('printableArea')" value="print a div!" />
<script type="text/javascript">
  function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</div>



                    </div>
                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-light mt-5 mb-5 text-center small">by : <a class="text-light" target="_blank" href="http://totoprayogo.com">totoprayogo.com</a></div>

</div>

</div>
<!-- /close container -->

  
<?php include "footer.php"?>

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

</html>