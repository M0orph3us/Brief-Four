<?php
require '../config/autoload.php';

$urlCsvUsers = '../database/users.csv';
$users = new Database($urlCsvUsers);
$getUsers = $users->readCsv();

if (isset($_POST["csrf-volunteer"]) && $_POST["csrf-volunteer"] === $_SESSION["csrf-volunteer"]) {
    if (isset($_POST["code"]) && !empty($_POST["code"])) {
        $codeSanitize = htmlentities($_POST["code"]);


        for ($k = 1; $k < count($getUsers); $k++) {
            if ($codeSanitize === $getUsers[$k][12]) {
                $_SESSION["isConnectedVolunteer"] = true;
                $_SESSION['userCode'] = $codeSanitize;
                $_SESSION['username'] = $getUsers[$k][0] . " " . $getUsers[$k][1];
                $_SESSION['csrf-volunteer'] = bin2hex(random_bytes(32));

                header("Location: ../../frontend/pages/home.php");
                exit();
            }
        }
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
