<?php
require '../../backend/config/autoload.php';
// if (!isset($_SESSION["isConnectedVolunteer"]) || $_SESSION["isConnectedVolunteer"] !== true || empty($_SESSION["isConnectedVolunteer"])) {
//     header("Location: ./404.php");
//     exit();
// }
require './includes/header.php';

$userProfil = new Database('../../backend/database/users.csv');
$getUserProfil = $userProfil->readCsv();

$urlCsvVolunteersByEvent = '../../backend/database/volunteersByEvent.csv';
$volunteerByEvent = new Database($urlCsvVolunteersByEvent);
$getVolunteerByEvent = $volunteerByEvent->readCsv();

$urlCsvEvents = '../../backend/database/events.csv';
$events = new Database($urlCsvEvents);
$getEvents = $events->readCsv();

if (isset($_SESSION['username'], $_SESSION['userCode']) && !empty($_SESSION['username']) && !empty($_SESSION['userCode'])) {
    $username = $_SESSION['username'];
    $userCode = $_SESSION['userCode'];
}
?>
<main>
    <div class="alternativeMain">
        <div class="button-container">
            <button id="my-profil">MY PROFIL</button>
            <button id="my-events">MY EVENTS</button>
        </div>
        <div class="profil-container" id="profil-container">
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
                        <?php for ($k = 1; $k < count($getUserProfil); $k++) {
                            if ($userCode === $getUserProfil[$k][12]) {
                                $firstname = $getUserProfil[$k][0];
                                echo "<p>Prénom : $firstname </p>";
                                echo "<p>Nom :</p>";
                                echo "<p>Age :</p>";
                                echo "<p>Sexe :</p>";
                                echo "<p>Tél :</p>";
                                echo "<p>Email :</p>";
                                echo "<p>Date d'inscription :</p>";
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
        <div class="events-user-container" id="events-user-container">
            <div class="events-user-mobile">
                <div class="card-event-user">

                </div>
            </div>
            <div class="events-user-desktop">
                <table border="2">
                    <thead>
                        <tr>
                            <th>EVENT NAME</th>
                            <th>REGION</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <?php
                    for ($k = 1; $k < count($getVolunteerByEvent); $k++) {
                        if ($username === $getVolunteerByEvent[$k][1]) {
                            $eventName = $getVolunteerByEvent[$k][0];
                            $date = $getVolunteerByEvent[$k][2];
                            for ($k = 1; $k < count($getEvents); $k++) {
                                if ($eventName === $getEvents[$k][1]) {
                                    $region = $getEvents[$k][0];
                                }
                            }
                            echo '<tbody>';
                            echo '<tr>';
                            echo "<td>$eventName</td>";
                            echo "<td>$region</td>";
                            echo "<td>$date</td>";
                            echo '</tr>';
                            echo '</tbody>';
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

    </div>
</main>
<?php
require './includes/footer.php';
?>