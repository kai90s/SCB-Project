<?php session_start();
require'connection.php';
$qr=mysqli_query($db,"SELECT * from user");
$rec=mysqli_fetch_array($qr);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 	
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="css/sb-admin-2.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<title>Success!</title>

<?php include "header.php";?>
</head>

<body  style="background-image: url('images/bg.jpg');background-size: cover;">

  <!-- Page Content -->
  <div class="container">

<!-- Jumbotron Header -->
    <header class="jumbotron my-4">

<div class="col-md-12">
<div class="card-body">
	<section class="listings">
		<div class="wrapper">
		<h2 class="text-center">Thank you for choosing us. We will give you a call shortly.</h2>
		 
		 <div class="col-md-12 text-center mt-4">
		 	<button class="btn btn-primary"><i class="fa fa-home" aria-hidden="true"></i><a style="color: white;" href="index.php"> Back to home</a>
		 </button>
		</div>

    <div class="col-md-12 text-center mt-4">
      <button class="btn btn-primary"><i class="<i class="fa fa-file" aria-hidden="true"></i><a style="color: white;" href="invoice.php?id=<?php echo $rec['u_id']?>">view records</a>
     </button>
    </div>
		 

			<ul class="properties_list">
			
			</ul>
		</div>
	</section>
	</div>
	</div>
</header>
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

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
</body>
<?php include "footer.php"?>
</html>