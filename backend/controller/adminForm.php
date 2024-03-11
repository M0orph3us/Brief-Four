<?php
require '../config/autoload.php';

if (isset($_POST['csrf-admin-form']) && $_POST['csrf-admin-form'] === $_SESSION['csrf-admin-form']) {

    if (isset($_POST["region"], $_POST["date"], $_POST["name-event"]) && !empty($_POST["region"]) && !empty($_POST["date"]) && !empty($_POST["name-event"])) {

        $region = $_POST["region"];
        $regionSanitize = htmlentities($region);

        $date = new DateTimeImmutable($_POST["date"]);
        $dateFormated = $date->format("d-m-y");

        $nameEvent = $_POST["name-event"];
        $nameEventSanitize = htmlentities($nameEvent);
        $data = [$regionSanitize, $nameEventSanitize, $dateFormated];

        if (isset($_POST["comment-event"]) && !empty($_POST["comment-event"])) {
            $commentEvent = $_POST["comment-event"];
            $commentEventSanitize = htmlentities($commentEvent);
            $data[] = $commentEventSanitize;
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
