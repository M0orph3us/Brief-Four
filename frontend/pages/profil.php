<?php
require '../../backend/config/autoload.php';
// if (!isset($_SESSION["isConnectedVolunteer"]) || $_SESSION["isConnectedVolunteer"] !== true || empty($_SESSION["isConnectedVolunteer"])) {
//     header("Location: ./404.php");
//     exit();
// }
require './includes/header.php';

$userProfil = new Database('../../backend/database/users.csv');
$getUserProfil = $userProfil->readCsv();

$userCode = '0f3960c4';



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
            <?php foreach($getUserProfil as $user) {
            if($userCode == $user[12]) {
                echo "<p>Prénom : $user[0] </p>";
                echo "<p>Nom :$user[1]</p>";
                echo "<p>Age : $user[2]</p>";
                echo "<p>Sexe : $user[3]</p>";
                echo "<p>Tél : $user[4]</p>";
                echo "<p>Email : $user[5]</p>";
                echo "<p>Date d'inscription : $user[6]</p>";
                };
            }; ?>
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