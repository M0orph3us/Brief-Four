<?php
session_start();
if (!isset($_SESSION["isConnectedAdmin"]) || $_SESSION["isConnectedAdmin"] !== true) {
    header("Location: ./home.php");
    exit();
}
require './includes/header.php';


?>

<main>
</main>

<?php
require './includes/footer.php';
?>