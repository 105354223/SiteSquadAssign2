<?php
require_once 'settings.php';

$createEoiTable = "CREATE TABLE IF NOT EXISTS eoi (
    eoi_number INT AUTO_INCREMENT PRIMARY KEY,
    job_reference VARCHAR(10) NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    date_of_birth DATE NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    street_address VARCHAR(100) NOT NULL,
    suburb VARCHAR(50) NOT NULL,
    state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
    postcode VARCHAR(4) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    skills JSON,
    other_skills TEXT
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
     application_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
?>  