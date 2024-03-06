<?php
session_start();

if (isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $isConnectedAdmin = false;
    header("Location: ../../frontend/pages/adminboard.php");
    exit();
}
