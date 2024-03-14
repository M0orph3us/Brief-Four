<?php
require '../config/autoload.php';

if (isset($_POST['csrf-admin-form']) && !empty($_POST['csrf-admin-form']) && $_POST['csrf-admin-form'] === $_SESSION['csrf-admin-form']) {

    if (isset($_POST["region"], $_POST["date"], $_POST["name-event"]) && !empty($_POST["region"]) && !empty($_POST["date"]) && !empty($_POST["name-event"])) {
        $regionSanitize = htmlentities($_POST["region"]);
        $nameEventSanitize = htmlentities($_POST["name-event"]);

        $date = new DateTimeImmutable($_POST["date"]);
        $dateFormated = $date->format("d/m/y");

        if (strlen($nameEventSanitize) < 3 || strlen($nameEventSanitize) > 50) {
            header("Location: ../../frontend/pages/adminboard.php ");
            exit();
        } else {
            $data = [$regionSanitize, $nameEventSanitize, $dateFormated];
            if (isset($_POST["comment-event"]) && !empty($_POST["comment-event"])) {
                $commentEventSanitize = htmlentities($_POST["comment-event"]);
                if (strlen($commentEventSanitize) < 5 || strlen($commentEventSanitize) > 100) {
                    $data[] = $commentEventSanitize;
                }
            }
        }
        $newEvent = new Database("../database/events.csv");
        $newEvent->writeEvents($data);
        $_SESSION['eventRegisted'] = true;

        header("Location: ../../frontend/pages/adminboard.php");
        exit();
    } else {
        $_SESSION['eventRegisted'] = false;
        header("Location: ../../frontend/pages/adminboard.php");
        exit();
    }
}
