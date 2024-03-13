<?php
session_start();
$_SESSION["isConnectedVolunteer"] = false;
$_SESSION["isConnectedAdmin"] = false;

header("Location: ../../frontend/pages/home.php");
exit();