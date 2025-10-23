<?php
require_once 'settings.php';

function checkAuth() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: login.php');
        exit;
    }
}

function logout() {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    $_SESSION = array();
    session_destroy();
    header('Location: login.php');
    exit;
}

?>