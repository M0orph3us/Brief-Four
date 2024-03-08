<?php
require '../../backend/config/autoload.php';
require '../../backend/csrf-token/csrfRegister.php';
$csrfAdminForm = csrfAdminForm();
if (!isset($_SESSION["isConnectedAdmin"]) || $_SESSION["isConnectedAdmin"] !== true || empty($_SESSION["isConnectedAdmin"])) {
    header("Location: ./home.php");
    exit();
}
$urlCsv = "../../backend/database/events.csv";
$event = new Database($urlCsv);
$getEvent = $event->readCsv();

require './includes/header.php';
?>
<main>
    <div class="admin-container">
        <div class="form-admin-container">
            <h3>Add a new event</h3>
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
                <input type="text" name="comment-event" id="comment-event" name="comment">

                <input type="hidden" name="csrf-admin-form" value="<?= $csrfAdminForm ?>">
                <button type="submit">send</button>
            </form>
        </div>
        <div class="events-container">
            <h2>Events</h2>
            <table border="1">
                <thead>
                    <tr>
                        <?php
                        foreach ($getEvent[0] as  $value) {
                            echo "<th> $value </th>";
                        };
                        ?>
                    </tr>
                </thead>
                <?php
                for ($k = 1; $k < count($getEvent); $k++) {
                    foreach ($getEvent[$k] as  $value) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td> $value </td> ";
                        echo "</tr>";
                        echo "</tbody>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
</main>
<?php
require './includes/footer.php';
