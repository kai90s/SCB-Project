<?php
//connect database
require 'connection.php';

//get ID from recent page
$id = $_REQUEST['id'];

//delete from database
$query = "DELETE FROM user WHERE u_id = '$id'";
$result = mysqli_query($db,$query);
if($result === TRUE){
echo "<script type = \"text/javascript\">alert(\"User removed\");window.location = (\"manage_user.php\");
</script>";
	}
?>