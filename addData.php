<?php

$uname = $_POST['username'];
$email  = $_POST['email'];
$pass = $_POST['password'];

if (!empty($uname1) || !empty($email) || !empty($pass) )
{

$host = "192.168.30.23";
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
//Prepare statement
     $stmt = $conn->prepare("SELECT Email_Id From userinformation Where Email_Id = ? Limit 1");
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare("INSERT INTO userinformation (`UserName`, `Email_Id`, `Password`) VALUES (?,?,?)");
      $stmt->bind_param("sss", $uname,$email,$pass);
      $stmt->execute();
      echo "1";
     } else {
      echo "0";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
