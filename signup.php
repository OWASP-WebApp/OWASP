<?php 
session_start();
$servername = "localhost";
$serverUsername = "owasp";
$serverPassword = "OWASP-ZERO123!@#a";
$db = "main";

// Createing  connection
$conn = new mysqli($servername, $serverUsername, $serverPassword, $db);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST["fullname"];
$username = $_POST["username"];
$password = $_POST["password"];

$q2 =  "select * from users where username = '" . $username . "';";
$res = $conn->query($q2);

if($res->num_rows == 0){

  $q = "insert into users() values(NULL,'" . $fullname . "','" . $username . "','" . $password . "');";
  $res = $conn->query($q);
  $_SESSION['loggedin'] = true;
  $_SESSION['username'] = $username;
  header("Location: /profile.html");

}else{
  header("Location: /message.html?message=This username already exist&referer=/signup.html");
  die();
}

?>