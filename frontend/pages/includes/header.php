<?php
$backend = '../../backend/';
require $backend . 'csrf-token/csrfLogin.php';
require $backend . 'config/varDump.php';
$csrfAdmin = csrfAdminLogin();
$csrfVolunteer = csrfVolunteersLogin();

$uri = ($_SERVER['REQUEST_URI']);
$pattern = ['/Brief-Four', '/frontend/pages/', '.php'];
$title = ucfirst(str_replace($pattern, "", $uri));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="brief-four" />
    <link rel="shortcut icon" href="../assets/imgs/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="../styles/css/style.css" />
    <title><?= $title ?></title>
</head>

<body>
    <header>
        <div class="navbar-container-mobile" id="navbar-container-mobile">
            <i class="fa-solid fa-bars fa-xl open-burger" id="open-burger"></i>
            <i class="fa-solid fa-xmark fa-2xl close-burger" id="close-burger"></i>
            <div class="logo-container-mobile" id="logo-container-mobile">
                <a href="./home.php"><img src="../assets/imgs/reseau.png" alt="logo" class="logo"></a>
            </div>
            <i class="fa-solid fa-user fa-xl profil"></i>
            <div class="user-container" id="user-container">
                <?php
                if (isset($_SESSION["isConnectedVolunteer"]) && !empty($_SESSION["isConnectedVolunteer"]) && $_SESSION["isConnectedVolunteer"] === true || isset($_SESSION["isConnectedAdmin"]) && !empty($_SESSION["isConnectedAdmin"]) && $_SESSION["isConnectedAdmin"] === true) {
                    echo '<a href=' . $backend . 'controller/logout.php><button type="button">logout</button></a>';
                } else {
                    echo '<button type="button" class="btn-login" id="btn-login-mobile">login</button>';
                    echo '<a href="./inscription.php">
                    <button type="button" class="btn-register-mobile" id="btn-register-mobile">register</button>
                    </a>';
                }
                ?>
            </div>
            <div class="burger-container" id="burger-container">
                <ul class="links-container-burger" id="links-container-burger">
                    <li><a href="./home.php">home</a></li>
                    <?php
                    if (isset($_SESSION["isConnectedAdmin"]) && !empty($_SESSION["isConnectedAdmin"]) && $_SESSION["isConnectedAdmin"] === true) {
                        echo '<li><a href="./adminboard.php">admin</a></li>';
                    }
                    if (isset($_SESSION["isConnectedVolunteer"]) && !empty($_SESSION["isConnectedVolunteer"]) && $_SESSION["isConnectedVolunteer"] === true) {
                        echo '<li><a href="./profil.php">admin</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="navbar-container-desktop" id="navbar-container-desktop">
            <div class="logo-container-desktop" id="logo-container-desktop">
                <a href="./home.php"><img src="../assets/imgs/reseau.png" alt="logo" class="logo"></a>
            </div>
            <ul class="links-container" id="links-container">
                <li><a href="./home.php">home</a></li>
                <?php
                if (isset($_SESSION["isConnectedAdmin"]) && !empty($_SESSION["isConnectedAdmin"]) && $_SESSION["isConnectedAdmin"] === true) {
                    echo '<li><a href="./adminboard.php">admin</a></li>';
                }
                if (isset($_SESSION["isConnectedVolunteer"]) && !empty($_SESSION["isConnectedVolunteer"]) && $_SESSION["isConnectedVolunteer"] === true) {
                    echo '<li><a href="./profil.php">admin</a></li>';
                }
                ?>
            </ul>
            <div class="connections-container" id="connection-container">
                <!-- <button type="button" class="btn-login" id="btn-login-desktop">login</button>
                <a href="./inscription.php"><button type="button" class="btn-register-desktop"
                        id="btn-register-desktop">register</button>
                </a> -->
                <?php
                if (isset($_SESSION["isConnectedVolunteer"]) && !empty($_SESSION["isConnectedVolunteer"]) && $_SESSION["isConnectedVolunteer"] === true || isset($_SESSION["isConnectedAdmin"]) && !empty($_SESSION["isConnectedAdmin"]) && $_SESSION["isConnectedAdmin"] === true) {
                    echo '<a href=' . $backend . 'controller/logout.php><button type="button">logout</button></a>';
                } else {
                    echo '<button type="button" class="btn-login" id="btn-login-desktop">login</button>';
                    echo '<a href="./inscription.php">
                    <button type="button" class="btn-register-desktop" id="btn-register-desktop">register</button>
                    </a>';
                }
                ?>
            </div>
        </div>
        <div class="modal-login-form" id="modal-login-form">
            <i class="fa-solid fa-xmark fa-xl close-modal-login" id="close-modal-login"></i>
            <div class="choose-login-container">
                <button id="btn-volunteer" type="button">volunteer</button>
                <button id="btn-admin" type="button">admin</button>
            </div>
            <form class="login-admin-form" id="login-admin-form" action="../../Backend/controller/signInAdmin.php"
                method="POST">
                <label for="username-login">username</label>
                <input id="username-login" type="text" name="username" autocomplete="on" required>

                <label for="password-login">password</label>
                <div class="password-login-container">
                    <input id="password-login" type="password" name="password" required>
                    <i class="fa-solid fa-eye-slash hidden-eye-login"></i>
                    <i class="fa-solid fa-eye show-eye-login"></i>
                </div>
                <input type="hidden" name="csrf-admin" value=<?= $csrfAdmin ?>>
                <button id="btn-login-admin" stype="submit">login</button>
            </form>

            <form class="login-user-form" id="login-user-form" action="../../Backend/controller/signInVolunteer.php"
                method="post">
                <label for="password-user">code</label>
                <div class="code-login-container">
                    <input type="password" id="password-user" name="code">
                    <i class="fa-solid fa-eye-slash hidden-eye-login"></i>
                    <i class="fa-solid fa-eye show-eye-login"></i>
                </div>
                <input type="hidden" name="csrf-volunteer" value=<?= $csrfVolunteer ?>>
                <button id="btn-login-user" stype="submit">login</button>
            </form>
        </div>
    </header>