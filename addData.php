<?php

$user  = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

if (!empty($user) || !empty($email)||!empty($con) || !empty($pass))
{
$host = "db4free.net:3306";
$dbusername = "gopidfreak";
$dbpassword = "gopiishu1730";
$dbname = "userdataguvi";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
		$check = "INSERT INTO userInformation (`UserName`, `Email_Id`, `Password`) VALUES ('$user','$email','$pass')";
		if ($conn->query($check) === TRUE) {
            echo "Logged In Successfully!";
          } else {
            echo "Error Occured: " . $conn->error;
          }
          
          $conn->close();
	}
}
?>
