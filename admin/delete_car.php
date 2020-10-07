<?php
//connect database
require 'connection.php';


//get ID from recent page
$id = $_REQUEST['id'];

//delete from database
$query = "DELETE FROM car WHERE car_id = '$id'";

$result = mysqli_query($db,$query);
if($result === TRUE){
echo "<script type = \"text/javascript\">
alert(\"Car Successfully Send\");
window.location = (\"view_car.php\")
</script>";
}
?>

