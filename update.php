<?php

$age  = $_POST['age'];
$gender = $_POST['gender'];
$con = $_POST['contact'];
$addr = $_POST['address'];
$email = $_POST['email'];


if (!empty($age) || !empty($gender)||!empty($con) || !empty($addr)|| !empty($email) )
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
		$check = "UPDATE `userInformation` SET Age='$age',Gender='$gender',Contact='$con',Address='$addr' WHERE `Email_Id` ='$email'";
		if ($conn->query($check) === TRUE) {
            echo "Record updated successfully";
          } else {
            echo "Error updating record: " . $conn->error;
          }
          
          $conn->close();
	}
}
?>
