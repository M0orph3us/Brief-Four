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
            <?php foreach ($getUserProfil as $user) {
              if ($userCode == $user[12]) {
                echo "<p>Prénom : $user[0] </p>";
                echo "<p>Nom :$user[1]</p>";
                echo "<p>Age : $user[2]</p>";
                echo "<p>Sexe : $user[3]</p>";
                echo "<p>Tél : $user[4]</p>";
                echo "<p>Email : $user[5]</p>";
                echo "<p>Date d'inscription : $user[11]</p>";
              };
            }; ?>
          </div>
        </section>
        <section class="availability">
          <div class="titleProfil">
            <h2>Disponibilités</h2>
          </div>
          <div class="infosProfil">
            <?php foreach ($getUserProfil as $user) {
              if ($userCode == $user[12]) {
                echo "<p>Région : $user[6]</p>";
                echo "<p>Jours : $user[7]</p>";
                echo "<p>Heures : $user[8]</p>";
                echo "<p>Poste fav : $user[9]</p>";
              }
            } ?>
          </div>
        </section>
        <section class="expression">
          <div class="titleProfil">
            <h2>Expression</h2>
          </div>
          <div class="infosProfil">
            <?php foreach ($getUserProfil as $user) {
              if ($userCode == $user[12]) {
                echo "<p>$user[10]<p>";
              }
            } ?>
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