<?php
require '../../backend/config/autoload.php';
require '../../backend/csrf-token/csrfRegister.php';
require './components/alertRegisterAdmin.php';
$csrfAdminForm = csrfAdminForm();
if (!isset($_SESSION["isConnectedAdmin"]) || $_SESSION["isConnectedAdmin"] !== true || empty($_SESSION["isConnectedAdmin"])) {
    header("Location: ./404.php");
    exit();
}
require './includes/header.php';
$urlCsv = "../../backend/database/events.csv";
$events = new Database($urlCsv);
$getEvents = $events->readCsv();

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
                echo "$valid";
                $_SESSION['eventRegisted'] = '';
            } else {
                echo "$error";
                $_SESSION['eventRegisted'] = '';
            }

            if ($screenWidth > 768) {
                echo '<table border="2" id="table-desktop">';
                echo '<thead>';
                echo '<tr>';

                foreach ($getEvents[0] as  $value) {
                    echo "<th> $value </th>";
                };

                echo '</tr>';
                echo '</thead>';
            }
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
                    echo "<td>" . $event['dayLeft'] . "day(s)</td>";
                    echo "<td>" . $event['comment'] . "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                } else if ($screenWidth < 768) {
                    echo "<div class=\" card-event-container\">";
                    echo "<p>region :" . $event['region'] . "</p>";
                    echo "<p>event name :" . $event['eventName'] . "</p>";
                    echo "<p>date :" . $event['dayLeft'] . "</p>";
                    echo "<p>note :" . $event['comment'] . "</p>";
                    echo "</div>";
                }
            }
            ?>
            </table>
        </div>
        <div class="form-new-event" id="form-new-event">
            <h1>Add a new event</h1>

            <form action="../../backend/controller/adminForm.php" method="post">
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
                <input type="text" name="comment-event" id="comment-event">

                <input type="hidden" name="csrf-admin-form" value="<?= $csrfAdminForm ?>">
                <button type="submit">send</button>
            </form>
        </div>
        <div class="form-volunteers-events" id="form-volunteers-events"></div>
    </div>
</main>
<?php
require './includes/footer.php';