<?php
session_start();
require '../../backend/csrf-token/csrfRegister.php';
require './includes/header.php';
$csrfRegister = csrfVolunteersForm();
?>

<main>
    <div class="alternativeMain">
        <h1 class="successTitle">Votre inscription à bien été prise en compte, merci !</h1>
        <div class="containerId">
            <h2>Votre identifiant de connexion</h2>
            <p>Gardez le précieusement !</p>
            <div class="userId">1233211</div>
        </div>
        <a href="./home.php">
            <button class="finished">Terminer</button>
        </a>
    </div>
</main>

<?php
require './includes/footer.php';
?>