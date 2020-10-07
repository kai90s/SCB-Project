<?php
//connect database
include 'connection.php';

//get ID from recent page
$delete = $_GET['id'];

//delete from database
$query =mysqli_query($db,"DELETE FROM booking WHERE car_id = '$delete'");

//update to database
$query =mysqli_query($db,"UPDATE car SET status = 'available' WHERE car_id = '$delete'");
	
	
if($query === TRUE){
echo "<script type = \"text/javascript\">alert(\"Success deleted\"); 
      window.location = (\"manage-booking.php\");</script>";
      exit();
	}
?>