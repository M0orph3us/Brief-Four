<?php

if (isset($_POST["username"], $_POST["password-admin"]) && !empty($_POST["username"]) && !empty($_POST["password-admin"])) {
    $email = $_POST["username"];
    $password = $_POST["password-admin"];

    $isConnectedAdmin = false;
    header("Location: ../../Frontend/pages/home.php");
}

if (isset($_POST["code"]) && !empty($_POST["code"])) {
    $code = $_POST["code"];

    $isConnectedUser = false;
    header("Location: ../../Frontend/pages/profil.php");
}
