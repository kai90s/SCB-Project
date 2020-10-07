<?php session_start();
// check if user click sign in button
if (isset($_POST['btn_login'])){
    $adminemail= $_POST['txt_email'];  
    $adminpassword= $_POST['txt_password'];
    
require 'connection.php';

// check user in database
$query="SELECT * FROM admin WHERE email='$adminemail' ";
$qr=mysqli_query($db,$query);
if($qr==false){
    echo "Failed to find user <br>";
    echo "SQL error :".mysqli_error($db);
    exit();
}
if (mysqli_num_rows($qr)==0) {
  header('Location: login.php?error=notregister');
  exit();
}
$admininformation= mysqli_fetch_array($qr);
$dbEmail=$admininformation['email']; 
$dbpassword= $admininformation['password'];
$_SESSION['email']=$admininformation['email'];
  
// check if password match
if($dbpassword==$adminpassword){
$_SESSION['a_fname']= $admininformation['a_fname'];
echo "<script type = \"text/javascript\">
                      alert(\"Welcome\");
                      window.location = (\"index.php\")
                      </script>";
exit();
}
else{
header('Location: login.php?error=wrongpassword');
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
  
  <title>SCB - Admin Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body style="background-image: url('../images/bg.jpg');">
  <!-- Login Content -->
   <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">  <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                  </div>
                   <?php
              // display error message
              if (isset($_GET['error'])) {
                if ($_GET['error']=="notregister") {
                  echo '<div class="alert alert-danger" role="alert">
                        Not registered yet
                        </div>';
                }
                elseif ($_GET['error']=="wrongpassword") {
                  echo '<div class="alert alert-danger" role="alert">
                        Wrong Password entered
                        </div>';
                }
              }
            ?>
                  <form class="user" method="POST" action="login.php">
                    <div class="form-group">
                      <input name="txt_email" type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                        placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input name="txt_password" type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      
                      <button class="btn btn-primary btn-user btn-block" name="btn_login" type="submit">Sign in</button>
                    </div>
                    
                  </form>
                  <hr>
                  
                  <div class="text-center">
                    <a class="font-weight-bold small" href="forgot-password.php">Forgot Password?</a>
                  </div>
                  
                  
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
</body>

</html>