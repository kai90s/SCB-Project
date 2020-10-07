<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
  <title>Sham Car Booking</title>


</head>

<body style="background-image: url('images/bg.jpg');background-size: cover;">

<?php include "header.php";?>	

<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
    <h1 class="text-center">Welcome to Sham Car Booking</h1>
    <h2 class="lead text-center">book your ride</h2>
    
    <form action="search_car.php"method="post">
	<br>
	<!-- Search form -->
<div class="xl-12 md-form mt-4">
  <input name="keyword" class="form-control" type="text" placeholder="Search car.." aria-label="Search">
</div>
  <br>
  <div class="col-md-12 text-center">
	<button class="btn btn-primary btn-md" type="submit"> <i class="fa fa-search" aria-hidden="true"></i>  Search</button>	
 </div>
</form>
</header>

<!--                                    Page Features                                              -->


<div class="row text-center">

      <div class="col-md-6">
        <div class="card h-100">
          <img class="card-img-top" src="images/car2.jpg" alt="car1" width="190" height="240">
          <div class="card-body">
            <h4 class="card-title">View all cars</h4>
            <p class="card-text">Explore your favourite car for rent.</p>
          </div>
          <div class="card-footer">
            <a href="available_car.php" class="btn btn-block btn-primary"><h5>View</h5></a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card h-100">
          <img class="card-img-top" src="images/Car-rental.jpg" alt="car-rental" width="190" height="240">
          <div class="card-body">
            <h4 class="card-title">Rent your car</h4>
            <p class="card-text">Be part of our community.</p>
          </div>
          <div class="card-footer">
            <a href="rent_addcar.php" class="btn btn-block btn-primary"><h5>Join now</h5></a>

          </div>
        </div>
      </div>


</div>
<!-- /.row -->
</div>
<!-- /close container -->

          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="logout.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>
  
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