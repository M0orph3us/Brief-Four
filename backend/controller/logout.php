<?php
session_start();
session_destroy();

header("Location: ../../frontend/pages/home.php");
exit();
