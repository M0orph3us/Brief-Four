<?php
session_start();
$screenWidth = $_POST["width"];
$_SESSION["width"] = $screenWidth;
