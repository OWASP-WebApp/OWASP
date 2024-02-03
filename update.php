<?php 
session_start();
$servername = "localhost";
$serverUsername = "owasp";
$serverPassword = "OWASP-ZERO123!@#a";
$db = "main";

$conn = new mysqli($servername, $serverUsername, $serverPassword, $db);

// Checking connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["action"]) && $_POST["action"] == "changeUsername"){

    $newUsername = $_POST["newUsername"];
    $checkUsernameQuery =  "select * from users where username = '" . $newUsername . "';";
    $res = $conn->query($checkUsernameQuery);

    if($res->num_rows == 0){

        $oldUsername = $_SESSION['username'];
        $q = "update users set username = '" . $newUsername . "' where username = '" . $oldUsername . "';";
        $_SESSION["username"] = $newUsername;
        $res = $conn->query($q);
        $message = array("message" => "Your username changed", "status" => true);
        header("Content-Type: application/json");
        echo json_encode($message);
        die();

    }else{
        $message = array("message" => "This username already exist", "status" => false);
        header("Content-Type: application/json");
        echo json_encode($message);
        die();
    }

}

if (isset($_POST["action"]) && $_POST["action"] == "changeFullname"){

    $newFullname = $_POST["newFullname"];
    $currentUsername = $_SESSION['username'];
    $q = "update users set fullname = '" . $newFullname . "' where username = '" . $currentUsername . "';";
    $res = $conn->query($q);
    if($res == "1"){
        $message = array("message" => "Your fullname changed", "status" => true);
        header("Content-Type: application/json");
        echo json_encode($message);
        die();
    }else{

        $message = array("message" => "An error accoured", "status" => false);
        header("Content-Type: application/json");
        echo json_encode($message);
        die();

    }

    
}

if (isset($_POST["action"]) && $_POST["action"] == "changePassword"){

    $username = $_SESSION["username"];
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];

    $q = "select * from users where username = '" . $username . "' and password = '" . $currentPassword . "'";
    $res = $conn->query($q);
    if ($res->num_rows == 1){
        $updatePassword = "update users set password = '" . $newPassword . "' where username = '" . $username . "';";
        $res = $conn->query($updatePassword);
        if($res == "1"){
            $message = array("status" => ture, "message" => "Your password changed");
            header("Content-Type: application/json");
            echo json_encode($message);
            die();

        }else{

            $message = array("status" => false, "message" => "An error accoured");
            header("Content-Type: application/json");
            echo json_encode($message);
            die();

        }
    }else{
        $message = array("status" => false, "message" => "Password doesn't matche with current password");
        header("Content-Type: application/json");
        echo json_encode($message);
        die();

    }
}




?>