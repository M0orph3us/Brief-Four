<?php
session_start();
if (isset($_POST['csrf-admin-form']) && $_POST['csrf-admin-form'] === $_SESSION['csrf-admin-form']) {
}
