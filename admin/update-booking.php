<?php
//connect database
include 'connection.php';
//get ID from recent page
$update = $_GET['id'];

//update from database
$query =mysqli_query($db,"UPDATE booking SET status = 'Approved' WHERE car_id = '$update'");


	if($query === TRUE){
	echo "<script type = \"text/javascript\">alert(\"Success updated\"); 
      window.location = (\"manage-booking.php\");</script>";
      exit();
	}
?>
