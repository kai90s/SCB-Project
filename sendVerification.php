<?php 
 function sendVerification($email,$subject){

require 'connection.php';

 // create pin 
$pin=random_int(10000, 99999);
$hashpin=md5($pin);

 // message in email
$messagesubject=$subject;
$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
$message ="This is your code for verify your request";
$message .="<br>Code: "."<b>".$pin."</b>";
$message .="<br><br>If your not request to reset password, please ignore this email";


    	// send email 
		// check whether email has been send and return to login page with message
		if (mail($email, $messagesubject, $message,$headers)) {
			$query= mysqli_query($db,"INSERT INTO resetpassword (u_email,reset_token) VALUES ('$email','$hashpin')");
			if($query==false){
		      echo "Failed to load reset password request<br>";
		      echo "SQL error :".mysqli_error($db); 
		    }
		    else
		      return true;
		}
		else
		  return false;
 }
 ?>