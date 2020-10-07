<?php
if (isset($_POST['btn_send'])) {
    $fbname= $_POST['txt_name'];
    $fbEmail= $_POST['txt_email'];
    $fbPhoneno= $_POST['txt_phoneno'];
    $fb= $_POST['txt_feedback'];


require 'admin/connection.php';

// insert user information into database
$query= "INSERT INTO feedback (fbName,fbEmail,fbPhoneno,fbOpinion)VALUES ('$fbname','$fbEmail','$fbPhoneno','$fb') ";
$qr= mysqli_query($db,$query);

header('Location: contact.php?success');
exit();
} 
?>


<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="fontawesome/css/all.min.css" rel="stylesheet">

<?php include "header.php"  ?>
</head>

<body style="background-image: url('images/bg.jpg');background-size: cover;">
<?php
              // display message
              if (isset($_GET['success'])) {
                echo '<script>alert("feedback has been submitted.. thank you for your feedback!")</script>';
                echo '<div class="alert alert-success" role="alert">
                        submitted.. thank you!</div>';
                
                }
            ?>
<!--contact form-->


<div class="card card-signin">
    <div class="card-title">
    <h2 class="text-center mt-3">Contact Us</h2>        
    </div>
</div>

              
<div class="container">
<div class="form-row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
        
        <div class="card-body">
        <h4 class="card-title text-center">If you got any questions <br>please do not hesitate to send us a message</h4>
<form method="POST" action="contact.php" class="container">       

<div class="form-row ">
                    <div class="form-group col-md-12">
                    <input name="txt_name" type="text" class="form-control"  placeholder="Your name" required>
                    </div>
                    </div>

<div class="form-row">
            
                    <div class="form-group col-md-12">       
                    <input name="txt_phoneno" type="text" class="form-control"  placeholder="Phone number"required>
                    </div>
                    </div>

<div class="form-row">
            
                    <div class="form-group col-md-12">
                    <input name="txt_email" type="email" class="form-control"  placeholder="Email"required>
                    </div>
                    </div>

<div class="form-row">                
                    <div class="form-group col-md-12">
                    <textarea name="txt_feedback" class="form-control"  rows="3" placeholder="Message"required></textarea>
                    </div>
                    </div>

<button name="btn_send" type="submit" class="btn btn-primary">send</button>
</form>

</div>
</div>
</div>

<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
            <div class="card-body">


	<h3 class="card-title text-center">Contact Number</h3>

	<h4 class="text-center"> +60182118078</h4>
	<br>
	<h3 class="card-title text-center mt-3">Email</h3>

	<h4 class="text-center"> shamcarbooking@gmail.com</h4>
	<br><br>

        </div>
    </div>
</div>

</div>
</div>



<?php include "footer.php"  ?>
</body>
</html>