<?php
//start session
session_start();

//if empty session or not login yet, it will redirect to login page
if (empty($_SESSION['email'])) {
header('location:login.php');   
}
//connect database
require'connection.php';
if(isset($_POST['btn_add'])){
//image upload style
$target_path = "img/car/";
$target_path = $target_path . basename ($_FILES['image']['name']);
if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
//collect data from form
$carbrand= $_POST['brand'];
$car_name= $_POST['name'];
$car_colour= $_POST['colour'];
$car_type= $_POST['type'];
$car_transmission= $_POST['transmission'];
$owner=$_POST['ownerID'];
$image = basename($_FILES['image']['name']);
                
//insert into database
$query= "INSERT INTO car (brand,car_name,car_colour,car_type,transmission,image,status,owner_id) VALUES ('$carbrand','$car_name','$car_colour','$car_type','$car_transmission','$image','Available','$owner') ";
                
$qr= mysqli_query($db,$query);
if($qr === TRUE){
echo "<script type = \"text/javascript\">alert(\"Vehicle Succesfully Added\"); 
      window.location = (\"index.php\");</script>";
 }
}
else{   
echo "Failed to add news car <br>";
echo "SQL error :".mysqli_error($db);
exit();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SCB - Add car</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          
        </div>
        <div class="sidebar-brand-text mx-3">Sham Car Booking</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fa fa-home" aria-hidden="true"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
    
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-tasks" aria-hidden="true"></i>
          <span>Manage</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage</h6>
            <a class="collapse-item" href="car.php">Car</a>
            <a class="collapse-item" href="user.php">Users</a>
          </div>
        </div>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

     <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fa fa-file" aria-hidden="true"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">view pages:</h6>
            <a class="collapse-item" href="../login.php">Login</a>
            <a class="collapse-item" href="../register.php">Register</a>
            <a class="collapse-item" href="../forgotPwd.php">Forgot Password</a>
            <a class="collapse-item" href="../index.php">Home</a>
            <a class="collapse-item" href="../contact.php">Contact Us</a>
          </div>
        </div>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->


    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
<?php include 'header.php';?>
        <!-- Topbar -->


<!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add Cars</h1>

<form method="POST" action="add_car.php" enctype="multipart/form-data">
                
<div class="form-row">

<div class="form-group col-md-6">
                    <label> Car Brand</label>
                    <input name="brand" type="text" class="form-control"  placeholder="e.g. Toyota,Proton," required>
                    </div>  
</div>

<div class="form-row">
<div class="form-group col-md-6">
                    <label> Car name</label>
                    <input name="name" type="text" class="form-control"  placeholder="Car name" required>
                    </div>
<div class="form-group col-md-6">
                    <label> Car colour</label>
                    <input name="colour" type="text" class="form-control"  placeholder="colour" required>
                    </div>  
</div>

<div class="form-row">
<div class="form-group col-md-6">
                    <label> Car type</label>
                    <input name="type" type="text" class="form-control"  placeholder="e.g. Mpv, Sedan" required> 
                    </div>
<div class="form-group col-md-4">

                    <label> Car transmission</label>
                    <select name="transmission" class="form-control" required>

<option value="Manual">Manual</option>
<option value="Automatic">Automatic</option>    


                    </select> 
                    </div>  
</div>

<div class="form-row">
<div class="form-group col-md-6">
                    
                    <label > Car picture : </label>
                    <br>
                    <input type="file" name="image">
                  </div>
<div class="form-group col-md-6">
                    <label>owner ID</label>

<select name="ownerID"class="form-control">

<?php 

$res=mysqli_query($db,"SELECT rent_id from renter");
while ($row=mysqli_fetch_array($res))
{
?>
<option value="<?php echo $row["rent_id"]?>"><?php echo $row["rent_id"]?></option>    
<?php
}
?>

</select>

                  </div>
</div>

<hr>
                
                <input name="btn_add" type="submit" class="btn btn-primary ml-3" value="Add">
                
</form>

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

        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!--footer-->
<?php include 'footer.php';?>
    <!--end footer-->

        </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>  
</body>

</html>