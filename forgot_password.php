<?php
include 'sendVerification.php';
require 'connection.php';

if (isset($_POST['btn_resetpassword'])) {
    $email=$_POST['txt_email'];

    // find match in DB
    $query=mysqli_query($db,"SELECT u_email FROM user WHERE u_email= $email");
    if($query==false){
      echo "Failed to find user<br>";
      echo "SQL error :".mysqli_error($db);
      exit();
    }
    $record = mysqli_fetch_array($query);

     // delete request record 
    $deleterecord= mysqli_query($db,"DELETE FROM resetpassword WHERE u_email = $email");
    if($deleterecord==false){
      echo "Failed to delete request reset password record<br>";
      echo "SQL error :".mysqli_error($db);
      exit();
    }
    $subject="Reset Password Request";
    $emailstatus=sendVerification($email,$subject);
    
    // send the user to the next if true and user to index login page if false
    header(($emailstatus) ? 'Location: requestverification.php?success=emailsended&email='.$email: 'Location: ../login.php?error=failedtoresetpassword') ;

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
crossorigin="anonymous">

  <title>Put tittle here</title>

</head>

<body style="background-image: url('images/bg.jpg');background-size: cover;">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Forgot Your Password?</h1>

                  </div>
                  <form class="user" method="POST" action="<?=$_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                      <input type="email" name="txt_email" class="form-control form-control-user" placeholder="Enter Your Email" required>
                    </div>
                    <input type="submit" name="btn_resetpassword" class="btn btn-primary btn-user btn-block" value="Reset Password"> 

                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="register.php">Not register yet? Register here!</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="login.php">Already have an account? Login!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</body>

</html>