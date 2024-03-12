<?php

session_start();

if (
    isset($_POST['csrf-volunteers-form']) && $_POST['csrf-volunteers-form'] === $_SESSION['csrf-volunteers-form']
) {
    if (
        isset(
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["age"],
            $_POST["sex"],
            $_POST["phone"],
            $_POST["email"],
            $_POST["region"],
            $_POST["dateAvailability"],
            $_POST["hourAvailability"],
            $_POST["privilegedWork"],
            $_POST["freeExpression"]
        )
        && !empty($_POST["firstName"])
        && !empty($_POST["lastName"])
        && !empty($_POST["age"])
        && !empty($_POST["sex"])
        && !empty($_POST["phone"])
        && !empty($_POST["email"])
        && !empty($_POST["region"])
        && !empty($_POST["dateAvailability"])
        && !empty($_POST["hourAvailability"])
        && !empty($_POST["privilegedWork"])
        && !empty($_POST["freeExpression"])
    ) {
    } else {
        echo "pas bon";
    }
} else {
    $_SESSION['csrf-volunteers-form'] = bin2hex(random_bytes(32));
    header("Location: ../../frontend/pages/404.php");
    exit();
}