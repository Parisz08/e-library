<?php

function requireAuth() {
    if (!isset ($_SESSION['user'])) {
        header('Location: ../views/login.php');
        exit;
    }
}

function requireGuest() {
    if (isset($_SESSION['user'])) {
        header('Location: ../views/dashboard.php');
        exit;
    }
}