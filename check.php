<?php 
session_start();

if(isset($_GET["action"]) && $_GET["action"] == "showInfo"){
    if($_SESSION["loggedin"] == FALSE){
        $message = array("error" => "Your are not login");
        header("Content-Type: application/json");
        echo json_encode($message);
        die();
    }
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

    $username = $_SESSION["username"];
    $q = "select * from users where username = '" . $username . "';";
    $res = $conn->query($q);
    $rows = $res->fetch_assoc();
    $data = array();

    $data["Username"] = $username;
    $data["Phone"] = "+12534222";
    $data["Email"] = $username . "@gmail.com";
    $data["Address"] = "US, NewYork, Centeral Park, Building 23, Floor No.4";
    $data["Password"] = md5($rows["password"]);
    header("Content-Type: application/json");
    echo json_encode($data);
    die();
}


if (isset($_GET["action"]) && $_GET["action"] == "showUsername"){

    $username = array("username" => $_SESSION["username"]);
    header("Content-Type: application/json");
    echo json_encode($username);
    die();
}


if (isset($_GET["action"]) && $_GET["action"] == "isLogin"){
    $status = array("status" => $_SESSION["loggedin"]);
    header("Content-Type: application/json");
    echo json_encode($status);
    die();
}

?>