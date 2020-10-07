<?php
session_start();
if (empty($_SESSION['email'])) {
header('location:login.php');   
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
  <title>SCB - View user</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">
<script type="text/javascript">
    function sureToApprove(id){
      if(confirm("Remove User?")){
        window.location.href ='delete_user.php?id='+id;
      }
    }
  </script>

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

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">view user</li>
            </ol>
          </div>


<!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>User ID</th>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Email</th>
                      <th>Dates of birth</th>
                      <th>Phone Number</th>
                      <th>Nation</th>
                      <th>Identification</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   <tbody>
                    <?php 
                    require 'connection.php';

                    //Execute the query
                    
                    $qr=mysqli_query($db,"select u_id,u_fname, u_lname, u_email, dob, phoneno,img,nation from user ");
                    if($qr==false){
                    echo ("Query cannot be executed!<br>");
                    echo ("SQL Error : ".mysqli_error($db));
                    }

                    while ($rekod=mysqli_fetch_array($qr)){
                    ?>
                    <tr>
                    <td><?=$rekod['u_id']?></td>
                    <td><?=$rekod['u_fname']?></td>
                    <td><?=$rekod['u_lname']?></td>
                    <td><?=$rekod['u_email']?></td>
                    <td><?=$rekod['dob']?></td>
                    <td><?=$rekod['phoneno']?></td>
                    <td><?=$rekod['nation']?></td>
                    <td>
                          <a href="manage_user.php?id=<?php echo $rekod['u_id'] ?>">
                        <div class="text-center mt-1">
                        <img src="img/user/<?php echo $rekod['img'];?>" width="150" height="80">  
                        </div>
                        
                      </a>      
                    </td>

                    <td><button class="btn btn-danger"><a href="javascript:sureToApprove(id=<?php echo $rekod['u_id'] ?>)" class="text-white">Delete</a></button></td>
                    <!--btn btn-danger is a bootstrap button to show danger-->  
                    </tr>
                    <?php
                    }//end of records
                    if(mysqli_num_rows($qr)==0) {  
                      echo "<td><h5>No registered user..</h5></td>";   
                    }
                    ?>                    
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>


           
         <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>    

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
                  <a href="login.php" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
      </div>
<?php include'footer.php'?>
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