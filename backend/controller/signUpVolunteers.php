<?php

session_start();
if (isset($_POST['csrf-volunteers-form']) && $_POST['csrf-volunteers-form'] === $_SESSION['csrf-volunteers-form']) {

    
}

?>