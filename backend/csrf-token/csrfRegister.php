<?php
// for form admin
function csrfAdminForm()
{
    if (!isset($_SESSION['csrf-admin-form'])) {
        $_SESSION['csrf-admin-form'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-admin-form'];
}

// for form volunteers
function csrfVolunteersForm()
{
    if (!isset($_SESSION['csrf-volunteers-form'])) {
        $_SESSION['csrf-volunteers-form'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-volunteers-form'];
}