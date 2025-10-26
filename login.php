<?php
require_once 'settings.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
if ($username === 'Admin' && $password === 'Admin') {
    
    session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: manage.php');
        exit;
    } else {
        echo "Invalid credentials";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>HR Manager Login</title>
</head>
<body>
  <!-- Login form for HR managers to access the system -->

    <h2>HR Manager Login</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    
    <p><strong>Demo Credentials:</strong></p>
    <p>Username: Admin</p>
    <p>Password: Admin</p>
    
</body>
</html>