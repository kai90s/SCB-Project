<?php session_start();
// check if user click sign in button
if (isset($_POST['btn_login'])){
    $user_email= $_POST['txt_email'];  
    $password= $_POST['txt_password'];
  
$password=md5($password);    

    require 'connection.php';

// check user in database
$query="SELECT * FROM user WHERE u_email='$user_email' ";
$qr=mysqli_query($db,$query);
if($qr==false){
    echo "Failed to find user <br>";
    echo "SQL error :".mysqli_error($db);
    exit();
}
if (mysqli_num_rows($qr)==0) {
  header('Location: request-login.php?error=notregister');
  exit();
}
$userinformation= mysqli_fetch_array($qr);
$dbEmail=$userinformation['u_email']; 
$dbpassword= $userinformation['password'];

    // check if password match
    if($dbpassword==$password){
      $_SESSION['u_fname']= $userinformation['u_fname'];
      $_SESSION['u_lname']= $userinformation['u_lname'];
      $_SESSION['phoneno']= $userinformation['phoneno'];
      $_SESSION['u_id']= $userinformation['u_id'];
      header('Location: available_car.php');
      exit();
    }
    else{
      header('Location: request-login.php?error=wrongpassword');
      exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
<?php include "header.php"  ?>
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
            <h5 class="card-title text-center">Sign In</h5>
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
            <form class="form-signin" method="POST" action="request-login.php">
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
                    <a class="small" href="register.php">Register Now!</a>
                  </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include "footer.php"  ?>
</body>



</html>