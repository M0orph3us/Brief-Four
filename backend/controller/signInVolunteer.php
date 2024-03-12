<?php
require '../config/autoload.php';

if (isset($_POST["csrf-volunteer"]) && $_POST["csrf-volunteer"] === $_SESSION["csrf-volunteer"]) {
    if (isset($_POST["code"]) && !empty($_POST["code"])) {
        $code = $_POST["code"];

        $_SESSION["isConnectedVolunteer"] = true;
        $_SESSION['csrf-volunteer'] = bin2hex(random_bytes(32));
        header("Location: ../../frontend/pages/home.php");
        exit();
    } else {
        $_SESSION['csrf-volunteer'] = bin2hex(random_bytes(32));
        header("Location: ../../frontend/pages/home.php");
        exit();
    }
} else {
    $_SESSION['csrf-volunteer'] = bin2hex(random_bytes(32));
    header("Location: ../../frontend/pages/404.php");
    exit();
}