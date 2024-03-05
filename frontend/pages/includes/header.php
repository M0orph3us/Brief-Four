<?php
$uri = ($_SERVER['REQUEST_URI']);
$pattern = ['/Brief-Four/Frontend/pages/', '.php'];
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
            <div class="profil-container" id="profil-container">
                <button type="button" class="btn-login-mobile" id="btn-login-mobile">login</button>
                <button type="button" class="btn-register-mobile" id="btn-register-mobile">register</button>
            </div>
            <div class="burger-container" id="burger-container">
                <ul class="links-container-burger" id="links-container-burger">
                    <li><a href="./test.php">lorem</a></li>
                    <li><a href="./test.php">lorem</a></li>
                    <li><a href="./test.php">lorem</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-container-desktop" id="navbar-container-desktop">
            <div class="logo-container-desktop" id="logo-container-desktop">
                <a href=""><img src="" alt="logo"></a>
            </div>
            <ul class="links-container" id="links-container">
                <li><a href="./test.php">lorem</a></li>
                <li><a href="./test.php">lorem</a></li>
                <li><a href="./test.php">lorem</a></li>
            </ul>
            <div class="connections-container" id="connection-container">
                <button type="button" class="btn-login-desktop" id="btn-login-desktop">login</button>
                <button type="button" class="btn-register-desktop" id="btn-register-desktop">register</button>
            </div>
        </div>
    </header>