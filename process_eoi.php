<?php
    include_once("settings.php");

    $conn = @mysqli_connect($host, $user, $password, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // $createEoiTable = "CREATE TABLE IF NOT EXISTS eoi


?>