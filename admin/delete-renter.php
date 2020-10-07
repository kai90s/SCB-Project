<?php
//connect database
include 'connection.php';

//get ID from recent page
$delete = $_GET['id'];

//delete from database
$query =mysqli_query($db,"DELETE FROM renter WHERE rent_id = '$delete'");

if($query === TRUE){
echo "<script type = \"text/javascript\">alert(\"Success deleted\"); 
      window.location = (\"view-renter.php\");</script>";
exit();
	}
?>