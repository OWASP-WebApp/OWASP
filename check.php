<?php 
session_start();
if ($_GET["action"] == "showUsername"){

    $username = array("username" => $_SESSION["username"]);
    header("Content-Type: application/json");
    echo json_encode($username);
    die();
}


if ($_GET["action"] == "isLogin"){
    $status = array("status" => $_SESSION["loggedin"]);
    header("Content-Type: application/json");
    echo json_encode($status);
    die();
}


?>