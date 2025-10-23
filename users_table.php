<?php
require_once 'settings.php';

$conn = mysqli_connect($host, $user, $password, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$createTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $createTable)) {
    echo "Users table created successfully<br>";
    

    $password_hash = password_hash('Admin', PASSWORD_DEFAULT);
    $insertAdmin = "INSERT INTO users (username, password_hash) VALUES ('Admin', '$password_hash')";
    
    if (mysqli_query($conn, $insertAdmin)) {
        echo "Admin user created (Username: Admin, Password: Admin)";
    }
}

mysqli_close($conn);
?>