<?php
session_start();
// if (!isset($_SESSION["isConnectedVolunteer"]) || $_SESSION["isConnectedVolunteer"] !== true || empty($_SESSION["isConnectedVolunteer"])) {
//     header("Location: ./404.php");
//     exit();
// }
require './includes/header.php';
?>
<main>
<div class="alternativeMain">
    <div class="topProfil">
        <h1 class="registerFormTitle">Mon compte</h1>
        <div class="titleUnderline"></div>
    </div>
    <div class="metaInfos">
        <section class="personalInfos">
            <div class="titleProfil">
                <h2>Infos personnelles</h2>
            </div>
            <div class="infosProfil">
                <p>Prénom :</p>
                <p>Nom :</p>
                <p>Age :</p>
                <p>Sexe :</p>
                <p>Tél :</p>
                <p>Email :</p>
                <p>Date d'inscription :</p>
            </div>
        </section>

        <section class="availability">
            <div class="titleProfil">
                <h2>Disponibilités</h2>
            </div>
            <div class="infosProfil">
                <p>Région :</p>
                <p>Jours :</p>
                <p>Heures :</p>
                <p>Poste fav :</p>
            </div>
        </section>

        <section class="expression">
            <div class="titleProfil">
                <h2>Expression</h2>
            </div>
            <div class="infosProfil">
                <p>Votre message :</p>
            </div>
        </section>

        <section class="metaMissions">
            <div class="titleMissions">
                <h2>Mes missions</h2>
            </div>
            <div class="myMissions">

            </div>
        </section>
    </div>
</div>
</main>
<?php
require './includes/footer.php';
?>