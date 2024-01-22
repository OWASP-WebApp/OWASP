<?php 
session_start();
if ($_GET["action"] == "showUsername"){

    $username = array("username" => $_SESSION["username"]);
    header("Content-Type: application/json");
    echo json_encode($username);
    die();
}

?>