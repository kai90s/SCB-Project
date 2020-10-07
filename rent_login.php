<?php
session_start();
require 'connection.php';


// check if user click sign in button
if (isset($_POST['btn_login'])){
    $rent_email= $_POST['txt_email'];  
    $password= $_POST['txt_password'];
    
$password=md5($password); 

// check user in database

$qr=mysqli_query($db,"SELECT * FROM renter where r_email='$rent_email'");
if($qr==false){
    echo "Failed to find user <br>";
    echo "SQL error :".mysqli_error($db);
    exit();
}
if (mysqli_num_rows($qr)==0) {
  header('Location: rent_login.php?error=notregister');
  exit();
}

$rentinfo= mysqli_fetch_array($qr);
$dbEmail=$rentinfo['r_email']; 
$dbpassword= $rentinfo['password'];

    // check if password match
if($dbpassword==$password){
  $_SESSION['id']= $rentinfo['rent_id'];    
  
      echo "<script>alert(\"welcome..\"); window.location = (\"rent_addcar.php?success=welcome\")</script>";
      
    }
    else{
      header('Location:rent_login.php?error=wrongpassword');
      exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>sign in</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Custom styles for this template-->
  <link href="css/login.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

</head>
<body style="background-image: url('images/bg.jpg');background-size: cover;">

  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Renter login</h5>
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
            <form class="form-signin" method="POST" action="rent_login.php">
              <div class="form-label-group">
                <input name="txt_email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input name="txt_password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <input name="btn_login" type="submit" class="btn btn-lg btn-primary btn-block text-uppercase" value="Sign in" >
           
            </form>
            <hr>
                  <!-- link to register and forgot password -->
                  <div class="text-center">
                    <a class="small" href="forgotPwd.php">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="rent_reg.php">Register Now!</a>
                  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "footer.php"  ?>
</body>



</html>