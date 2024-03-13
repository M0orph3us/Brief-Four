<?php
require '../config/autoload.php';
$volunteersByEvent = new Database($urlCsvAddVolunteersByEvent);
$setvolunteersByEvent = $volunteersByEvent->writeVolunteersByevent();

if (isset($_POST['csrf-add-volunteers-by-event-form']) && $_POST['csrf-add-volunteers-by-event-form'] === $_SESSION['csrf-add-volunteers-by-event-form']) {
}