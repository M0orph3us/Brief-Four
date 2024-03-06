<?php




if (!isset($_SESSION['csrf-volunteer'])) {
    $_SESSION['csrf-volunteer'] = bin2hex(random_bytes(32));
}



if (!isset($_SESSION['csrf-admin'])) {
    $_SESSION['csrf-admin'] = bin2hex(random_bytes(32));
}
