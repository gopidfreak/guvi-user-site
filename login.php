<?php

$email  = $_POST['email'];
$pass = $_POST['password'];

if (!empty($email) || !empty($pass) )
{
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "user_data";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
		$check = "SELECT `Email_Id`, `Password`  FROM `userinformation` where Email_Id='$email' AND Password='$pass'";
		$check_work= mysqli_query($conn,$check);
		if($check_work){
			if(mysqli_num_rows($check_work) > 0 ){	
				echo "1";
			}else{
				echo "0";
			}	
		}else{
				echo "Database Error";	
		}
	}
}
?>