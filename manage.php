<?php
require_once 'settings.php';
require_once 'auth.php';
checkAuth();

echo "<h1>HR Manager Dashboard</h1>";
echo "<p>Welcome to the EOI Management System</p>";
echo "<p>Database: $sql_db</p>";

$conn = mysqli_connect($host, $user, $password, $sql_db);
$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM eoi");
$row = mysqli_fetch_assoc($result);
echo "<p>Total Applications: " . $row['total'] . "</p>";
mysqli_close($conn);

//Navigation links between HR system pages for easy access and testing

echo "<h3>Management Options:</h3>";
echo "<a href='login.php'>Login Page</a><br>";
echo "<p>More features coming soon: View applications, Filter, Update status</p>";
?>