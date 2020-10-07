
<head>

	<title>Sham Car Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style >

</style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
  <div class="container">
    <a class="navbar-brand">
          <h3>Sham Car Booking</h3>
        </a>
        
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        
        <?php
        if (empty($_SESSION['u_fname'])) {
          echo '<li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>';
        }
        else {

          echo '<li class="nav-item">
          <a class="nav-link">Hello '.$_SESSION['u_fname'].'!</a>
        </li>';

          echo '<li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
        }
        ?>

        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

<li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
                
                
          
      </ul>
    </div>
  </div>
</nav>

 <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</head>

