<?php
session_start();
if (empty($_SESSION['id'])) {
header('location:rent_login.php');   
}

require 'connection.php';
$var1=$_SESSION['id'];
if(isset($_POST['btn_add'])){
                
$target_path = "admin/img/car/";
$target_path = $target_path . basename ($_FILES['image']['name']);
if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
                
$carbrand= $_POST['brand'];
$car_name= $_POST['name'];
$car_colour= $_POST['colour'];
$car_type= $_POST['type'];
$car_transmission= $_POST['transmission'];

$ownerID=$_SESSION['id'];
$image = basename($_FILES['image']['name']);
                

$query= "INSERT INTO car (brand,car_name,car_colour,car_type,transmission,image,status,owner_id) VALUES ('$carbrand','$car_name','$car_colour','$car_type','$car_transmission','$image','Available','$ownerID') ";
                
                $qr=mysqli_query($db,$query);
                if($qr === TRUE){
                  echo "<script type = \"text/javascript\">
                      alert(\"Vehicle Succesfully Added\");
                      window.location = (\"successAdd.php\")
                      </script>";
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
<html>
<head>
  <title>Add car details</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Custom styles for this template-->
  <link href="css/login.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="vendor/fontawesome-free/css/all.css" rel="stylesheet">
  <link href="admin/css/ruang-admin.min.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->


</head>
<body style="background-image: url('images/bg.jpg');background-size: cover;">

  <div class="container">
    <div class="row">
      <div class="col-lg-12 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Add your car details</h5>

            <form method="POST" action="rent_addcar.php" enctype="multipart/form-data">
                
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
                    <label> Owner ID : </label>
                    <?php echo $var1;?>
                  </div>
</div>

<hr>
                <input name="btn_add" type="submit" class="btn btn-primary ml-3" value="Add">  


                
</form>
  <div class="row col-md-6 mt-3">
    <button class="btn btn-danger nav-left"><a class="nav-link text-white" href="logout.php">Cancel / Log out</a></button>
</div>
            
           
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "footer.php"  ?>
</body>



</html>