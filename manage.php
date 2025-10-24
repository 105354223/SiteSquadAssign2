<?php
require_once 'settings.php';
require_once 'auth.php';
checkAuth();

echo "<h1>HR Manager Dashboard</h1>";
echo "<p>Welcome to the EOI Management System</p>";
echo "<p>Database: $sql_db</p>";

$conn = mysqli_connect($host, $user, $password, $sql_db);

// Search by job reference
echo "<h3>Search by Job Reference:</h3>";
echo "<form method='GET'>";
echo "<input type='text' name='job_ref' placeholder='Enter job reference'>";
echo "<button type='submit'>Search</button>";
echo "</form>";

// Search by first name
echo "<h3>Search by First Name:</h3>";
echo "<form method='GET'>";
echo "<input type='text' name='first_name' placeholder='Enter first name'>";
echo "<button type='submit'>Search</button>";
echo "</form>";

// Search for last name
echo "<h3>Search by Last Name:</h3>";
echo "<form method='GET'>";
echo "<input type='text' name='last_name' placeholder='Enter last name'>";
echo "<button type='submit'>Search</button>";
echo "</form>";

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

$result = mysqli_query($conn, "SELECT * FROM eoi $where ORDER BY eoi_number");
echo "<h3>All Job Applications:</h3>";
echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
echo "<tr><th>EOI #</th><th>First Name</th><th>Last Name</th><th>Job Ref</th><th>Status</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['eoi_number'] . "</td>";
    echo "<td>" . $row['first_name'] . "</td>";
    echo "<td>" . $row['last_name'] . "</td>";
    echo "<td>" . $row['job_reference'] . "</td>";
    echo "<td>" . $row['status'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($conn);

//Navigation links between HR system pages for easy access and testing

echo "<h3>Management Options:</h3>";
echo "<a href='login.php'>Login Page</a><br>";
echo "<p>More features coming soon: View applications, Filter, Update status</p>";
?>