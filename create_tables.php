<?php
require_once 'settings.php';

$createEoiTable = "CREATE TABLE IF NOT EXISTS eoi (
    eoi_number INT AUTO_INCREMENT PRIMARY KEY,
    job_reference VARCHAR(10) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
    )";
?>  