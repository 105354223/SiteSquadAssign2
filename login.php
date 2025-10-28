<?php
 session_start();
require_once 'settings.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
if ($username === 'Admin' && $password === 'Admin') {

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Manager Login</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body class="loginBody">
    <div class="loginContainer">
        <div class="loginHeader">
            <h2>HR Manager Login</h2>
            <p class="loginSubtitle">Access the EOI Management System</p>
        </div>
        
        <?php if (!empty($error)): ?>
            <div class="errorMessage">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="login-form">
            <div class="formGroup">
                <label class="formLabel">Username</label>
                <input type="text" name="username" placeholder="Enter your username" class="loginInput" required>
            </div>
            
            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="Enter your password" class="loginInput" required>
            </div>
            
            <button type="submit" class="loginButton">Login</button>
        </form>
        
        <div class="demoCredentials">
            <strong>Admin Credentials:</strong>
            <p>Username: Admin</p>
            <p>Password: Admin</p>
        </div>
    </div>
</body>
</html>