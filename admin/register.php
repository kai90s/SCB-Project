<?php
session_start();
if (empty($_SESSION['email'])) {
header('location:login.php');   
}

 if (isset($_POST['btn_reg'])) {
     $fname= $_POST['fname'];
     $lname= $_POST['lname'];
     $email= $_POST['email'];
     $password= $_POST['password'];
     $repeatpassword= $_POST['repeatpassword'];
     $phone= $_POST['phone'];
     $address= $_POST['address'];
     $dob= $_POST['dob'];
     $img= $_POST['uploadid'];
     $license= $_POST['uploadlic'];

     require 'connection.php';
     
     //  check if password is match
if ($password != $repeatpassword) {
  header('Location:register.php?error=passwordnotmatch');
  exit();
}
    
    //  check if user already register using the same email 
    $findExistingUser =mysqli_query($db,"SELECT a_email FROM admin WHERE a_email='$email' ");
    if (mysqli_num_rows($findExistingUser)>0) {
        header('Location: register.php?error=alreadyregister');
        exit();
    }
    // insert user information into database
     $query= "INSERT INTO admin (a_fname,a_lname,a_email,a_phoneno,password,dob,address,img,drivlicense)VALUES 
     ('$fname','$lname','$email','$phone','$password','$dob','$address','$img','$license') ";
     $qr= mysqli_query($db,$query);
     if($qr==false){
        echo "Failed to register news user <br>";
        echo "SQL error :".mysqli_error($db);
        exit();
    }
    else {
        // return to login page after success register 
        header('Location:login.php?success=registered');
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

  <title>SCB - Register</title>
  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/ruang-admin.min.css" rel="stylesheet">


  
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  

</head>

<body class="bg-gradient-login">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-8">
<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<!-- Nested Row within Card Body -->
<div class="row">
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
              <form class="user" method="POST" action="register.php" enctype="multipart/form-data">
                
<div class="form-row">
                    <div class="form-group col-md-6">
                    <input name="fname" type="text" class="form-control form-control-user"  placeholder="Enter first name" required>
                    </div>
    
                    <div class="form-group col-md-6">
                    <input name="lname" type="text" class="form-control form-control-user"  placeholder="Enter last name" required>
                    </div>
</div>

                    <div class="form-group">
                    
                    <input name="email" type="email" class="form-control form-control-user"  placeholder="Email address"required>
                    </div>

<div class="form-row">
                    <div class="form-group col-md-6">
                    <input name="password" type="password" class="form-control form-control-user"  placeholder="Create password"required>
                    </div>

                    <div class="form-group col-md-6">
                    <input name="repeatpassword" type="password" class="form-control form-control-user"  placeholder="Confirm password"required>
                    </div>
</div>

<div class="form-row">
                    <div class="form-group col-md-6">
                    
                    <input name="dob" type="date" class="form-control form-control-user"  required>
                    </div>
                    
                    <div class="form-group col-md-6">
                    <input name="phone" type="text" class="form-control form-control-user"  placeholder="Phone Number"required>
                    </div>
</div>
                
                    <div class="form-group">
                    
                    <textarea name="address" class="form-control" placeholder="Your address"  rows="3" required></textarea>
                    </div>

<div class="form-row">
                    <div class="form-group col-md-6">
                    
                    <label >Upload</label>
                    <br>
                    <label > IC picture : </label>
                    <input type="file" name="fileToUpload" id="uploadid">
                    <br>
                    <br>
                    <label >2. Driving license : </label>
                    <input type="file" name="fileToUpload" id="uploadlic">
                    </div>
</div>

                    
</div>
<hr>
                <div class="text-center">
                <input name="btn_reg" type="submit" class="btn btn-primary" value="Register">
                </div>
</form>
              <hr>

              <div class="text-center">
                <a class="small" href="forgot-password.php">Forgot Password?</a>
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
<?php include 'footer.php';?>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="js/demo/chart-area-demo.js"></script> 
</body>

</html>
