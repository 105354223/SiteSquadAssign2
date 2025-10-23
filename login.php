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
</body>
</html>