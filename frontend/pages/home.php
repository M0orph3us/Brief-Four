<?php
require '../../backend/config/autoload.php';
require './includes/header.php';
require './components/alertLoginAdmin.php';
require './components/alertLoginVolunteers.php';

$urlCsv = "../../backend/database/events.csv";
$events = new Database($urlCsv);
$getEvents = $events->readCsv();
?>

<main>
    <div class="alert-container">
        <?php
        if (isset($_SESSION["isConnectedAdmin"]) && $_SESSION["isConnectedAdmin"] === true) {
            echo "$successAdmin";
        } else if (isset($_SESSION["isConnectedAdmin"]) && $_SESSION["isConnectedAdmin"] === false) {
            echo "$errorAdmin";
        }

        if (isset($_SESSION["isConnectedVolunteer"]) && $_SESSION["isConnectedVolunteer"] === true) {
            echo "$successVolunteer";
        } else if (isset($_SESSION["isConnectedVolunteer"]) &&  $_SESSION["isConnectedVolunteer"] === false) {
            echo "$errorVolunteer";
        }
        ?>
    </div>
    <h1 class="title-event-home">future event : </h1>
    <div class="grid-container">
        <?php
        function compareDate($a, $b)
        {
            if ($a === $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        }
        $events = [];
        for ($k = 1; $k < count($getEvents); $k++) {
            $region = $getEvents[$k][0];
            $eventName = $getEvents[$k][1];
            $date = $getEvents[$k][2];
            $events[] = ['region' => $region, 'eventName' => $eventName, 'date' => $date];
        }

        usort($events, function ($a, $b) {
            return compareDate($a['date'], $b['date']);
        });
        foreach ($events as $event) {
            $region = $event['region'];
            $eventName = $event['eventName'];
            $date = $event['date'];

            echo "<div class=\"card-event-container\">";
            echo "<p>name : $eventName </p>";
            echo "<p>location : $region </p>";
            echo "<p>date : $date </p>";
            echo "</div>";
        }
        ?>
    </div>
</main>

<?php
require './includes/footer.php';
?>