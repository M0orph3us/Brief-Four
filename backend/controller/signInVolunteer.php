<?php
session_start();

if (isset($_POST["code"]) && !empty($_POST["code"])) {
    $code = $_POST["code"];

    $isConnectedVolunteer = false;
    header("Location: ../../frontend/pages/home.php");
    exit();
}
