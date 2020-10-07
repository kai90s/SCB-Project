<?php session_start();

?>
<!DOCTYPE html>
<html>
<head>
	  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

	<title>Available cars</title>


</head>
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
<?php include 'header.php'?>

<!-- Begin Page Content -->
        <div class="container-fluid">
<br>
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-white">View car</h1>


<!-- DataTables Example -->
          <div class="card shadow mb-5">
            
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Car image</th>
                      <th>Car Information</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php 
                    require 'connection.php';

                    //Execute the query
                    $qr=mysqli_query($db,"select car_id, brand, car_name, car_colour, car_type, transmission,status,image from car where status='available'");
                    if($qr==false){
                    echo ("Query cannot be executed!<br>");
                    echo ("SQL Error : ".mysqli_error($db));
                    }

                    while ($rekod=mysqli_fetch_array($qr)){
                    ?>
                    <tr>
                    
                    <td>
                          <a href="available_car.php?id=<?php echo $rekod['car_id'];?>">
                        <div class="text-center mt-5">
                        <img src="admin/img/car/<?php echo $rekod['image'];?>" width="300" height="180">  
                        </div>
                      </a>      
                    </td>
                    <td>  
<div class="row">
            <div class="col-md-4"><h5>Brand : </h5><?=$rekod['brand']?></div>
            <div class="col-md-4"><h5>Car name: </h5><?=$rekod['car_name']?></div>
            <div class="col-md-4"><h5>Colour : </h5><?=$rekod['car_colour']?></div>
</div>
<div class="row mt-4">
            
            <div class="col-md-4"><h5>Type :</h5><?=$rekod['car_type']?></div>
            <div class="col-md-4"><h5>Transmission :</h5><?=$rekod['transmission']?></div>  
</div>

                    </td>
                    
  <td><?=$rekod['status']?></td>
    
                    <td><button class="btn btn-primary"><a href="confirm-book.php?id=<?php echo $rekod['car_id'] ?>" class="text-white">Book</a></button>
                    </td>

                    </tr>
                    <?php
                    }//end of records
                    if(mysqli_num_rows($qr)==0) {  
                      echo "<td><h5>No available car..</h5></td>";   
                    }
                    ?>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>

<?php include 'footer.php'?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>
</html>
