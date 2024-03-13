<?php

// for form event admin
function csrfAdminForm()
{
    if (!isset($_SESSION['csrf-admin-form'])) {
        $_SESSION['csrf-admin-form'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-admin-form'];
}

// for form register volunteers
function csrfVolunteersForm()
{
    if (!isset($_SESSION['csrf-volunteers-form'])) {
        $_SESSION['csrf-volunteers-form'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-volunteers-form'];
}

function csrfAddVolunteersByEventsForm()
{
    if (!isset($_SESSION['csrf-add-volunteers-by-event-form'])) {
        $_SESSION['csrf-add-volunteers-by-event-form'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf-add-volunteers-by-event-form'];
}
