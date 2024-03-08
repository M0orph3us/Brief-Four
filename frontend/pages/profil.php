<?php
session_start();
if (!isset($_SESSION["isConnectedVolunteer"]) || $_SESSION["isConnectedVolunteer"] !== true || empty($_SESSION["isConnectedVolunteer"])) {
    header("Location: ./404.php");
    exit();
}
require './includes/header.php';
?>
<main>
</main>
<?php
require './includes/footer.php';
?>