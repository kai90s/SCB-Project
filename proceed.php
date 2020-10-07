<?php session_start();
require'connection.php';

if(isset($_POST['btn_proceed'])){
$carID=$_SESSION['car_id'];
$carname=$_SESSION['brand']." ".$_SESSION['car_name'];
$ownerphone=$_SESSION['r_phoneno'];
$userID=$_SESSION['u_id'];
$username=$_SESSION['u_fname']." ".$_SESSION['u_lname'];

$var3=$_POST['dateStart'];
$var4=$_POST['dateEnd'];

$query=mysqli_query($db,"INSERT into booking (car_id,car_name,rent_phoneno,user_id,user_name,start_date,end_date,status) values('$carID','$carname','$ownerphone','$userID','$username','$var3','$var4','pending')");

$query=mysqli_query($db,"UPDATE car set status='unavailable' where car_id=$carID");

if($query==false){
        echo "Failed to add <br>";
        echo "SQL error :".mysqli_error($db);
        exit();
    }
    else {
        // redirect to success page 
              echo "<script type = \"text/javascript\">
                      alert(\"Success\");
                      
                      </script>";
                      header("location:successBook.php");
                      exit();
}}
?>

