<?php

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'sitesquad_db';

$conn = mysqli_connect($host, $user, $password);
if (!$conn) {
    die("Connection failed");
}
$createDbQuery = "CREATE DATABASE IF NOT EXISTS $dbname";
if (!mysqli_query($conn, $createDbQuery)) {
    die("Error creating database: " . mysqli_error($conn));
}
if (!mysqli_select_db($conn, $dbname)) {
    die("Error selecting database: " . mysqli_error($conn));
}
?>