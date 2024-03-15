<?php
require '../config/autoload.php';
$urlCsvAddVolunteersByEvent = '../database/volunteersByEvent.csv';
$volunteersByEvent = new Database($urlCsvAddVolunteersByEvent);

$urlCsvEvent = "../database/events.csv";
$events = new Database($urlCsvEvent);
$getEvents = $events->readCsv();

if (isset($_POST['csrf-add-volunteers-by-event-form']) && $_POST['csrf-add-volunteers-by-event-form'] === $_SESSION['csrf-add-volunteers-by-event-form']) {

    if (isset($_POST["volunteers"], $_POST["event"]) && !empty($_POST["volunteers"]) && !empty($_POST["event"])) {
        $volunteersSanitize = htmlentities($_POST["volunteers"]);
        $volunteers = str_replace('-', ' ', $volunteersSanitize);

        $eventSanitize = htmlentities($_POST["event"]);
        $date = null;
        for ($k = 1; $k < count($getEvents); $k++) {
            if ($eventSanitize === $getEvents[$k][1]) {
                $date = $getEvents[$k][2];
            }
        }


        $arrayData = [
            $eventSanitize,
            $volunteers,
            $date
        ];
        $setvolunteersByEvent = $volunteersByEvent->writeVolunteersByevent($arrayData);

        $_SESSION["volunteerByEventRegisted"] = true;

        header("Location: ../../frontend/pages/adminboard.php");
        exit();
    } else {
        $_SESSION["volunteerByEventRegisted"] = false;
        header("Location: ../../frontend/pages/adminboard.php");
        exit();
    }
} else {
    header("Location: ../../frontend/pages/404.php");
    exit();
}
