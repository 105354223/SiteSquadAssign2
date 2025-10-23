<?php
require_once 'settings.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Login form submitted
    
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    

if ($username === 'Admin' && $password === 'Admin') {
        echo "Login successful!";
    }
}


?>