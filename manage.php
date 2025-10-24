<?php
require_once 'settings.php';
require_once 'auth.php';
checkAuth();

echo "<h1>HR Manager Dashboard</h1>";
echo "<p>Welcome to the EOI Management System</p>";
echo "<p>Database: $sql_db</p>";

$conn = mysqli_connect($host, $user, $password, $sql_db);
$result = mysqli_query($conn, "SELECT * FROM eoi ORDER BY eoi_number");
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