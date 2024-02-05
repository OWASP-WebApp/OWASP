<?php 
session_start();
session_destroy();
header("Location: /message.html?message=You have logged out successfully&referer=/");
die();
?>