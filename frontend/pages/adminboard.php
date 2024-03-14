<?php
require '../../backend/config/autoload.php';
require '../../backend/csrf-token/csrfRegister.php';
require './components/alertRegisterAdmin.php';
$csrfAdminForm = csrfAdminForm();
$csrfAddVolunteersByEvent = csrfAddVolunteersByEventsForm();
if (!isset($_SESSION["isConnectedAdmin"]) || $_SESSION["isConnectedAdmin"] !== true || empty($_SESSION["isConnectedAdmin"])) {
    header("Location: ./404.php");
    exit();
}
require './includes/header.php';

$urlCsvAddVolunteersByEvent = '../../backend/database/volunteersByEvent.csv';
$volunteersByEvent = new Database($urlCsvAddVolunteersByEvent);
$getVolunteersByEvent = $volunteersByEvent->readCsv();

$urlCsvEvent = "../../backend/database/events.csv";
$events = new Database($urlCsvEvent);
$getEvents = $events->readCsv();

$urlCsvUsers = '../../backend/database/users.csv';
$users = new Database($urlCsvUsers);
$getUsers = $users->readCsv();

$screenWidth = $_SESSION["width"];
?>
<main>
    <div class="adminboard-container">
        <ul>
            <li><button id="events">events</button></li>
            <li><button id="assign-volunteers">assign volunteers</button></li>
            <li><button id="new-event">new event</button></li>
        </ul>
        <div class="events-container" id="events-container">
            <h1>Events</h1>
            <?php
            if (!empty($_SESSION['eventRegisted']) && $_SESSION['eventRegisted'] === true) {
                echo "$success";
                $_SESSION['eventRegisted'] = '';
            } else if (!empty($_SESSION['eventRegisted']) && $_SESSION['eventRegisted'] === false) {
                echo "$error";
                $_SESSION['eventRegisted'] = '';
            }

            if ($screenWidth > 768) {
                echo '<table border="2" id="table-desktop">';
                echo '<thead>';
                echo '<tr>';
                echo "<th>REGION</th>";
                echo "<th>EVENT NAME</th>";
                echo "<th>DAY REMAINING</th>";
                echo "<th>NOTE</th>";
                echo '</tr>';
                echo '</thead>';
            }
            if (!empty($getEvents[1])) {
                $events = [];
                for ($k = 1; $k < count($getEvents); $k++) {
                    $region = $getEvents[$k][0];
                    $eventName = $getEvents[$k][1];
                    $getDate = $getEvents[$k][2];
                    $date = DateTimeImmutable::createFromFormat('d/m/y', $getDate);
                    $currentDate = new DateTimeImmutable();
                    $diff = $currentDate->diff($date);

                    $dayLeft = $diff->format('%a');
                    if (!empty($getEvents[$k][3])) {
                        $comment = $getEvents[$k][3];
                    } else {
                        $comment = '';
                    }

                    $events[] = [
                        'region' => $region,
                        'eventName' => $eventName,
                        'dayLeft' => $dayLeft,
                        'comment' => $comment,
                    ];
                }

                usort($events, function ($a, $b) {
                    return $a['dayLeft'] - $b['dayLeft'];
                });
                foreach ($events as $event) {
                    if ($screenWidth > 768) {

                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $event['region'] . "</td>";
                        echo "<td>" . $event['eventName'] . "</td>";
                        if ($event['dayLeft'] < 5) {
                            echo "<td class=error >" . $event['dayLeft'] . " day(s)</td>";
                        } else {
                            echo "<td>" . $event['dayLeft'] . " day(s)</td>";
                        }
                        echo "<td>" . $event['comment'] . "</td>";
                        echo "</tr>";
                        echo "</tbody>";
                    } else if ($screenWidth < 768) {
                        echo "<div class=\" card-event-container\">";
                        echo "<p>region :" . $event['region'] . "</p>";
                        echo "<p>event name :" . $event['eventName'] . "</p>";
                        if ($event['dayLeft'] < 5) {
                            echo "<p class=error>date :" . $event['dayLeft'] . "</p>";
                        } else {
                            echo "<p>date :" . $event['dayLeft'] . "</p>";
                        }
                        echo "<p>note :" . $event['comment'] . "</p>";
                        echo "</div>";
                    }
                }
            }

            ?>
            </table>
            <div class="volunteers-events-container">
                <table border="2" id="table-desktop">
                    <thead>
                        <tr>
                            <th>EVENT NAME</th>
                            <th>VOLUNTEERS</th>
                            <th>DATE</th>
                        </tr>
                    </thead>
                    <?php
                    if (!empty($getVolunteersByEvent[1])) {
                        for ($k = 1; $k < count($getVolunteersByEvent); $k++) {
                            $eventName = $getVolunteersByEvent[$k][0];
                            $volunteers = $getVolunteersByEvent[$k][1];
                            $date = $getVolunteersByEvent[$k][2];
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>$eventName</td>";
                            echo "<td>$volunteers</td>";
                            echo "<td>$date</td>";
                            echo '</tr>';
                            echo "</tbody>";
                        }
                    }
                    ?>
                </table>
            </div>
        </div>

        <div class="form-new-event" id="form-new-event">
            <h1>Add a new event</h1>
            <form action="../../backend/controller/newEvents.php" method="post" onsubmit=" return newEventVerif()">
                <label for="region-select">region</label>
                <select name="region" id="region-select" required>
                    <option value="Auvergne-Rhone-Alpes">Auvergne-Rhône-Alpes</option>
                    <option value="Bourgogne-Franche-Comté">Bourgogne-Franche-Comté</option>
                    <option value="Bretagne">Bretagne</option>
                    <option value="Centre-Val de Loire">Centre-Val de Loire</option>
                    <option value="Corse">Corse</option>
                    <option value="Grand Est">Grand Est</option>
                    <option value="Hauts-de-France">Hauts-de-France</option>
                    <option value="Ile-de-France">Île-de-France</option>
                    <option value="Normandie">Normandie</option>
                    <option value="Nouvelle-Aquitaine">Nouvelle-Aquitaine</option>
                    <option value="Occitanie">Occitanie</option>
                    <option value="Pays de la Loire">Pays de la Loire</option>
                    <option value="Provence-Alpes-Cote d'Azur">Provence-Alpes-Côte d'Azur</option>
                </select>

                <label for="date-event">date event</label>
                <input type="date" name="date" id="date-event" required>

                <label for="name-event">name event</label>
                <input type="text" name="name-event" id="name-event" minlength="3" maxlength="50" required>

                <label for="comment-event">comment</label>
                <input type="text" name="comment-event" id="comment-event" minlength="5" maxlength="100">

                <input type="hidden" name="csrf-admin-form" value="<?= $csrfAdminForm ?>">
                <button type="submit">send</button>
            </form>
            <script src="../js/scripts/formNewEventVerif.js"></script>
        </div>
        <div class="form-volunteers-events" id="form-volunteers-events">
            <h1>Add a volunteer to an event</h1>
            <form action="../../backend/controller/addVolunteersByEvent.php" method="post">
                <label for="volunteers-select">Select Volunteers</label>
                <select name="volunteers" id="volunteers-select">
                    <?php
                    for ($k = 1; $k < count($getUsers); $k++) {
                        $lastName = $getUsers[$k][1];
                        $firstName = $getUsers[$k][0];
                        echo "<option value=$firstName-$lastName >$firstName  $lastName </option>";
                    }
                    ?>
                </select>
                <label for="event-select">Select Event</label>
                <select name="event" id="event-select">
                    <?php
                    for ($k = 1; $k < count($getEvents); $k++) {
                        $eventName = $getEvents[$k][1];
                        echo "<option value= $eventName>$eventName</option>";
                    }
                    ?>

                </select>
                <input type="hidden" name="csrf-add-volunteers-by-event-form" value="<?= $csrfAddVolunteersByEvent ?>">
                <button type="submit">send</button>
            </form>
        </div>
    </div>
</main>
<?php
require './includes/footer.php';
