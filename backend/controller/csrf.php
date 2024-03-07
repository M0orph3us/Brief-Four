<?php


// for form login volunteers
function csrfVolunteersLogin()
{
    if (!isset($_SESSION['csrf-volunteer'])) {
        $_SESSION['csrf-volunteer'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-volunteer'];
}

// for form login admin
function csrfAdminLogin()
{
    if (!isset($_SESSION['csrf-admin'])) {
        $_SESSION['csrf-admin'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-admin'];
}


// for form admin
function csrfAdminForm()
{
    if (!isset($_SESSION['csrf-admin-form'])) {
        $_SESSION['csrf-admin-form'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-admin-form'];
}
