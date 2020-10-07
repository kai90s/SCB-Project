<?php session_start();
include 'sendVerification.php';
require 'connection.php';

if (isset($_POST['btn_resetpassword'])) {
    $email=$_POST['txt_email'];

    // find match in DB
    $query=mysqli_query($db,"SELECT u_email FROM user WHERE u_email= '$email' ");
    if($query==false){
      echo "Failed to find user<br>";
      echo "SQL error :".mysqli_error($db);
      exit();
    }
    // check if user exist in DB
    if (mysqli_num_rows($query)!=1) {
      header('Location: forgotPwd.php?error=notfound');
      exit();
    }
    $record = mysqli_fetch_array($query);
    // set email  as session
    $_SESSION['email']=$email;
     // delete request record 
    $deleterecord= mysqli_query($db,"DELETE FROM resetpassword WHERE u_email = '$email' ");
    if($deleterecord==false){
      echo "Failed to delete request reset password record<br>";
      echo "SQL error :".mysqli_error($db);
      exit();
    }

    $subject="Reset Password Request";
    $emailstatus=sendVerification($email,$subject);
    
    // send the user to the next if true and user to index login page if false
    header(($emailstatus) ? 'Location: requestverification.php?success=emailsended': 'Location: login.php?error=failedtoresetpassword') ;

}

?>
<!DOCTYPE html>
<html>
<head>

<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<?php include "header.php"  ?>
</head>
<body style="background-image: url('images/bg.jpg');background-size: cover;">
 
<div class="container">
    <div class="row mt-2">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <div class="text-center">  
                
                <h3><i class="fa fa-lock fa-2x"></i></h3>
          
                <h2 class="text-center">Forgot Password?</h2>
                
                <p>You can reset your password here.</p>
            </div> 
          
                <form class="user" method="POST" method="post" action="<?=$_SERVER['PHP_SELF'];?>">

                <input id="email" name="txt_email" placeholder="email address" class="form-control"  type="email">
              
              <div class="form-group">    
                  <div class="form-row mt-2">
                  
                  <input name="btn_resetpassword" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                </div>
              </div>
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

<?php include "footer.php"  ?> 

</body>
</html>