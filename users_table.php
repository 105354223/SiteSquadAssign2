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
    
    // Check if Admin user already exists
    $checkAdmin = "SELECT id FROM users WHERE username = 'Admin'";
    $result = mysqli_query($conn, $checkAdmin);
    
    if (mysqli_num_rows($result) == 0) {
        // Admin doesn't exist, create it
        $password_hash = password_hash('Admin', PASSWORD_DEFAULT);
        $insertAdmin = "INSERT INTO users (username, password_hash) VALUES ('Admin', '$password_hash')";
        
        if (mysqli_query($conn, $insertAdmin)) {
            echo "Admin user created (Username: Admin, Password: Admin)";
        } else {
            echo "Error creating Admin user: " . mysqli_error($conn);
        }
    } else {
        echo "Admin user already exists<br>";
    }
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>