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

$username = $_POST['username'];
$password = $_POST['password'];

$q = "select * from users where username = '" . $username . "';";
$res = $conn->query($q);

if($res->num_rows == 0){
  header("Location: /message.html?message=This username does not exist&referer=/login.html");
  die();
}

while($rows = $res->fetch_assoc()){
  if($rows['password'] == $password){
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $rows['id'];
    header("Location: /profile.html");
    die();
  }else{
    header("Location: /message.html?message=Invalid credentials&referer=/login.html");
    die();
  }
}


?>