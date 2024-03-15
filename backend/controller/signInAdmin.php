<?php
require '../config/autoload.php';

if (isset($_POST['csrf-admin']) && $_POST['csrf-admin'] === $_SESSION['csrf-admin']) {
    if (isset($_POST["username"], $_POST["password"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
        $usernameSanitize = htmlentities($_POST["username"]);
        $passwordSanitize = htmlentities($_POST["password"]);
        $usernameAdmin = 'Admin';
        $passswordAdmin = $usernameAdmin;

        if ($usernameSanitize === $usernameAdmin && $passwordSanitize === $passswordAdmin) {
            $_SESSION["isConnectedAdmin"] = true;
            $_SESSION['csrf-admin'] = bin2hex(random_bytes(32));

            header("Location: ../../frontend/pages/adminboard.php");
            exit();
        } else {
            $_SESSION['csrf-admin'] = bin2hex(random_bytes(32));

            header("Location: ../../frontend/pages/home.php");
            exit();
        }
    } else {
        $_SESSION['csrf-admin'] = bin2hex(random_bytes(32));

        header("Location: ../../frontend/pages/home.php");
        exit();
    }
} else {
    $_SESSION['csrf-admin'] = bin2hex(random_bytes(32));

    header("Location: ../../frontend/pages/404.php");
    exit();
}
