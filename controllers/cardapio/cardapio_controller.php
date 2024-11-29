<?php
session_start();

function isAdmin()
{
    return isset($_SESSION['status']) && $_SESSION['status'] === 'admin';
}

function isClient()
{
    return isset($_SESSION['status']) && $_SESSION['status'] === 'client';
}

if (isAdmin()) {
    header('Location: ../../views/principal_admin/principal_admin_view.php');
    exit();
} elseif (isClient()) {
    header('Location: ../../views/principal_cliente/principal_client_view.php');
    exit();
} else {
    header('Location: ../../views/login/login_view.php');
    exit();
}
