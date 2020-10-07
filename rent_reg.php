<?php
 if (isset($_POST['btn_register'])) {
     $firstname= $_POST['txt_fname'];
     $lastname= $_POST['txt_lname'];
     $email= $_POST['txt_email'];
     $password= $_POST['txt_password'];
     $repeatpassword= $_POST['txt_repeatpassword'];
     $phone= $_POST['txt_phonenumber'];
     $address= $_POST['txt_address'];

$password=md5($password); 
$repeatpassword=md5($repeatpassword); 

     require 'connection.php';
     
     //  check if password is match
if ($password != $repeatpassword) {
  header('Location:rent_register.php?error=passwordnotmatch');
  exit();
}
    
    //  check if user already register using the same email 
    $findExistingUser =mysqli_query($db,"SELECT r_email FROM renter WHERE r_email='$email' ");
    if (mysqli_num_rows($findExistingUser)>0) {
        header('Location:rent_register.php?error=alreadyregister');
        exit();
    }
    // insert user information into database
     $query= "INSERT INTO renter (r_fname,r_lname,r_phoneno,r_address,password,r_email)VALUES ('$firstname','$lastname','$phone','$address','$password','$email') ";
     $qr= mysqli_query($db,$query);
     if($qr==false){
        echo "Failed to register news user <br>";
        echo "SQL error :".mysqli_error($db);
        exit();
    }
    else {
        // return to login page after success register 
        header('Location:rent_login.php?success=registered');
    }

  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Register form</title>
<?php include "header.php"  ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

</head>
<body style="background-image: url('images/bg.jpg');background-size: cover;">
<div class="container">
 <div class="row justify-content-center">
  <div class="col-xl-6 col-lg-6 col-md-6">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
  <!-- Nested Row within Card Body -->
        <div class="row ">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
               <?php
              // display error message
              if (isset($_GET['error'])) {
                if ($_GET['error']=="passwordnotmatch") {
                  echo '<div class="alert alert-danger" role="alert">
                        Sorry password not match
                        </div>';
                }
                elseif ($_GET['error']=="alreadyregister") {
                  echo '<div class="alert alert-danger" role="alert">
                        You already register
                        </div>';
                }
              }
            ?>

<form method="POST" action="rent_reg.php" enctype="multipart/form-data">
                
<div class="form-row">
    <div class="form-group col-md-6">
                    <label >First Name</label>
                    <input name="txt_fname" type="text" class="form-control"  placeholder="First Name" required>
                    </div>
    
    <div class="form-group col-md-6">
                    <label >Last Name</label>
                    <input name="txt_lname" type="text" class="form-control"  placeholder="Last Name" required>
                    </div>
                    </div>
                
    <div class="form-group">
                    <label >Email Address</label>
                    <input name="txt_email" type="email" class="form-control"  placeholder="Email"required>
                    </div>

<div class="form-row">
    <div class="form-group col-md-6">
                    <label f>Password</label>
                    <input name="txt_password" type="password" class="form-control"  placeholder="Password"required>
                    </div>

    <div class="form-group col-md-6">
                    <label f>Repeat Password</label>
                    <input name="txt_repeatpassword" type="password" class="form-control"  placeholder="Repeat Password"required>
                    </div>
                </div>

<div class="form-row">
                    <div class="form-group col-md-12">
                    <label >Phone</label>
                    <input name="txt_phonenumber" type="text" class="form-control"  placeholder="Phone Number"required>
                    </div>
                    </div>
                
<div class="form-row">
                    <label >Address</label>
                    <textarea name="txt_address" class="form-control"  rows="3" required></textarea>
                    </div>

<hr>
                <div class="text-center">
                <input name="btn_register" type="submit" class="btn btn-primary" value="Register">
                </div>
                </form>
<hr>

              <div class="text-center">
                <a class="small" href="forgotPwd.php">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="rent_login.php">Already have an account? Login!</a>
              </div>
              
            </div>
          </div>
        </div>
        </div>
    </div>
      </div>
    </div>

  </div>

<?php include 'footer.php'?>

<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>
</html>