<?php
require_once 'settings.php';
require_once 'auth.php';
checkAuth();

$conn = mysqli_connect($host, $user, $password, $sql_db);

// Update status when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
    $eoi_number = $_POST['eoi_number'];
    $new_status = $_POST['new_status'];
    mysqli_query($conn, "UPDATE eoi SET status = '$new_status' WHERE eoi_number = $eoi_number");
    echo "<div class='hr-message'>Status updated successfully!</div>";
}

if (isset($_POST['delete_by_jobref'])) {
    $job_ref = $_POST['job_reference'];
    mysqli_query($conn, "DELETE FROM eoi WHERE job_reference = '$job_ref'");
    echo "<div class='hr-message'>Applications deleted successfully!</div>";
}

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>HR Manager Dashboard</title>
    <link rel='stylesheet' href='styles/styles.css'>
</head>
<body>
<div class='hr-dashboard'>";

echo "<div class='hr-header'>";
echo "<h1>HR Manager Dashboard</h1>";
echo "<p>Welcome to the EOI Management System</p>";
echo "<p>Database: $sql_db</p>";
echo "</div>";

// Search by job reference
echo "<div class='hr-section'>";
echo "<h3>Search by Job Reference:</h3>";
echo "<form method='GET' class='hr-form'>";
echo "<div class='hr-form-group'>";
echo "<input type='text' name='job_ref' placeholder='Enter job reference' class='hr-input'>";
echo "</div>";
echo "<button type='submit' class='hr-button'>Search</button>";
echo "</form>";
echo "</div>";

// Search by first name
echo "<div class='hr-section'>";
echo "<h3>Search by First Name:</h3>";
echo "<form method='GET' class='hr-form'>";
echo "<div class='hr-form-group'>";
echo "<input type='text' name='first_name' placeholder='Enter first name' class='hr-input'>";
echo "</div>";
echo "<button type='submit' class='hr-button'>Search</button>";
echo "</form>";
echo "</div>";

// Search for last name
echo "<div class='hr-section'>";
echo "<h3>Search by Last Name:</h3>";
echo "<form method='GET' class='hr-form'>";
echo "<div class='hr-form-group'>";
echo "<input type='text' name='last_name' placeholder='Enter last name' class='hr-input'>";
echo "</div>";
echo "<button type='submit' class='hr-button'>Search</button>";
echo "</form>";
echo "</div>";

// Sort Applications
echo "<div class='hr-section'>";
echo "<h3>Sort Applications:</h3>";
echo "<form method='GET' class='hr-form'>";
echo "<div class='hr-form-group'>";
echo "<select name='sort' class='hr-select'>";
echo "<option value='eoi_number'>EOI Number</option>";
echo "<option value='first_name'>First Name</option>";
echo "<option value='last_name'>Last Name</option>";
echo "</select>";
echo "</div>";
echo "<button type='submit' class='hr-button'>Sort</button>";
echo "</form>";
echo "</div>";

// Delete by job reference 
echo "<div class='hr-section'>";
echo "<h3>Delete by Job Reference:</h3>";
echo "<form method='POST' class='hr-form'>";
echo "<div class='hr-form-group'>";
echo "<input type='text' name='job_reference' placeholder='Job reference' class='hr-input'>";
echo "</div>";
echo "<button type='submit' name='delete_by_jobref' class='hr-button delete'>Delete All</button>";
echo "</form>";
echo "</div>";

$where = "";
if (!empty($_GET['job_ref'])) {
    $where = " WHERE job_reference LIKE '%" . $_GET['job_ref'] . "%'";
}
if (!empty($_GET['first_name'])) {
    $where = " WHERE first_name LIKE '%" . $_GET['first_name'] . "%'";
}
if (!empty($_GET['last_name'])) {
    $where = " WHERE last_name LIKE '%" . $_GET['last_name'] . "%'";
}

$sort_field = $_GET['sort'] ?? 'eoi_number';
$result = mysqli_query($conn, "SELECT * FROM eoi $where ORDER BY $sort_field");

echo "<div class='hr-section'>";
echo "<h3>All Job Applications:</h3>";
echo "<div class='hr-table-container'>";
echo "<table class='hr-table'>";
echo "<tr><th>EOI #</th><th>First Name</th><th>Last Name</th><th>Job Ref</th><th>Status</th><th>Change Status</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['eoi_number'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "<td>" . $row['job_reference'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "<td>";
    echo "<form method='POST' class='status-form'>";
    echo "<input type='hidden' name='eoi_number' value='".$row['eoi_number']."'>";
    echo "<select name='new_status' class='status-select'>";
    echo "<option value='New'>New</option>";
    echo "<option value='Current'>Current</option>";
    echo "<option value='Final'>Final</option>";
    echo "</select>";
    echo "<button type='submit' name='update_status' class='status-update-btn'>Update</button>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
echo "</div>";
echo "</div>";

mysqli_close($conn);

// Navigation links between HR system pages for easy access and testing
echo "<div class='hr-navigation'>";
echo "<h3>Management Options:</h3>";
echo "<a href='login.php' class='hr-link'>Login Page</a><br>";
echo "<p>More features coming soon: View applications, Filter, Update status</p>";
echo "</div>";

echo "</div>
</body>
</html>";
?>