<?php
// Block direct URL access by checking if form was submitted
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.php");
    exit();
}

include_once("settings.php");

$conn = @mysqli_connect($host, $user, $password, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create eoi table if it doesn't exist
$createEoiTable = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNum VARCHAR(10) NOT NULL,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    DateOfBirth DATE NOT NULL,
    Gender ENUM('Male', 'Female', 'Other') NOT NULL,
    Address TEXT NOT NULL,
    Suburb VARCHAR(50) NOT NULL,
    State ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL,
    Postcode VARCHAR(4) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    PhoneNumber VARCHAR(20) NOT NULL,
    Skills JSON,
    OtherSkills TEXT,
    Status ENUM('New', 'Current', 'Final') DEFAULT 'New',
    ApplicationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createEoiTable)) {
    die("Error creating table: " . $conn->error);
}

$errors = [];

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Retrieve and sanitize form inputs
$JobReferenceNum = sanitize_input($_POST['JobReferenceNum'] ?? '');
$FirstName = sanitize_input($_POST['FirstName'] ?? '');
$LastName = sanitize_input($_POST['LastName'] ?? '');
$DateOfBirth = $_POST['DateOfBirth'] ?? '';
$Gender = $_POST['Gender'] ?? '';
$Address = sanitize_input($_POST['Address'] ?? '');
$Suburb = sanitize_input($_POST['suburb'] ?? '');
$State = $_POST['State'] ?? '';
$Postcode = sanitize_input($_POST['Postcode'] ?? '');
$Email = sanitize_input($_POST['email'] ?? '');
$PhoneNumber = sanitize_input($_POST['PhoneNumber'] ?? '');
$SkillList = $_POST['SkillList'] ?? [];
$OtherSkills = sanitize_input($_POST['OtherSkills'] ?? '');

if (empty($JobReferenceNum) || strlen($JobReferenceNum) > 5) {
    $errors[] = "Job Reference Number is required and must be 5 characters or less.";
}

if (empty($FirstName) || strlen($FirstName) > 20 || !preg_match("/^[a-zA-Z-' ]*$/", $FirstName)) {
    $errors[] = "First Name is required, must be 20 characters or less, and contain only letters and spaces.";
}

if (empty($LastName) || strlen($LastName) > 20 || !preg_match("/^[a-zA-Z-' ]*$/", $LastName)) {
    $errors[] = "Last Name is required, must be 20 characters or less, and contain only letters and spaces.";
}

if (empty($DateOfBirth)) {
    $errors[] = "Date of Birth is required.";
} else {
    $dob = DateTime::createFromFormat('Y-m-d', $DateOfBirth);
    $today = new DateTime();
    $age = $today->diff($dob)->y;
    
    if ($dob > $today) {
        $errors[] = "Date of Birth cannot be in the future.";
    } elseif ($age < 15 || $age > 80) {
        $errors[] = "Age must be between 15 and 80 years.";
    }
}

if (!in_array($Gender, ['Male', 'Female', 'Other'])) {
    $errors[] = "Please select a valid gender.";
}

if (empty($Address)) {
    $errors[] = "Address is required.";
}

if (empty($Suburb) || strlen($Suburb) > 50) {
    $errors[] = "Suburb is required and must be 50 characters or less.";
}

$validStates = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
if (!in_array($State, $validStates)) {
    $errors[] = "Please select a valid state.";
}

if (empty($Postcode) || !preg_match("/^\d{4}$/", $Postcode)) {
    $errors[] = "Postcode must be exactly 4 digits.";
} else {
    $statePostcodes = [
        'VIC' => ['3', '8'],
        'NSW' => ['1', '2'],
        'QLD' => ['4', '9'],
        'WA' => ['6'],
        'SA' => ['5'],
        'TAS' => ['7'],
        'ACT' => ['0'],
        'NT' => ['0']
    ];
    
    if (isset($statePostcodes[$State]) && !in_array($Postcode[0], $statePostcodes[$State])) {
        $errors[] = "Postcode does not match the selected state.";
    }
}

if (empty($Email) || !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Valid email address is required.";
}

if (empty($PhoneNumber) || !preg_match("/^[\d\s\(\)\-\+]{8,20}$/", $PhoneNumber)) {
    $errors[] = "Valid phone number is required (8-20 digits, may include spaces, parentheses, hyphens, or plus sign).";
}

$skillsJson = null;
if (!empty($SkillList)) {
    if (!is_array($SkillList)) {
        $errors[] = "Invalid skills selection.";
    } else {
        $validSkills = ['Programming', 'Design', 'Communication', 'Problem Solving'];
        foreach ($SkillList as $skill) {
            if (!in_array($skill, $validSkills)) {
                $errors[] = "Invalid skill selected.";
                break;
            }
        }
        $skillsJson = json_encode($SkillList);
    }
}

if (strlen($OtherSkills) > 500) {
    $errors[] = "Other skills must be 500 characters or less.";
}
// If there are validation errors, display them and stop processing
if (!empty($errors)) {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Application Error</title>
        <link rel='stylesheet' href='styles/styles.css'>
    </head>
    <body>";
    include 'Inc_Files/header.inc';
    echo "<div class='formContainer'>
            <h1>Application Error</h1>
            <div class='error-messages'>
                <p>Please correct the following errors:</p>
                <ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "      </ul>
                <a href='apply.php' class='back-btn'>Go Back to Form</a>
            </div>
          </div>";
    include 'Inc_Files/footer.inc';
    echo "</body></html>";
    exit();
}

$sql = "INSERT INTO eoi (JobReferenceNum, FirstName, LastName, DateOfBirth, Gender, Address, Suburb, State, Postcode, Email, PhoneNumber, Skills, OtherSkills) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("sssssssssssss", 
    $JobReferenceNum, 
    $FirstName, 
    $LastName, 
    $DateOfBirth, 
    $Gender, 
    $Address, 
    $Suburb, 
    $State, 
    $Postcode, 
    $Email, 
    $PhoneNumber, 
    $skillsJson, 
    $OtherSkills
);

if ($stmt->execute()) {
    $eoiNumber = $conn->insert_id;
    
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Application Submitted</title>
        <link rel='stylesheet' href='styles/styles.css'>
    </head>
    <body>";
    include 'Inc_Files/header.inc';
    echo "<div class='formContainer'>
            <h1>Application Submitted Successfully!</h1>
            <div class='success-message'>
                <p>Thank you for your application, $FirstName $LastName!</p>
                <p>Your Expression of Interest has been recorded.</p>
                <div class='eoi-number'>
                    <strong>Your EOI Number: #$eoiNumber</strong>
                </div>
                <p>Please keep this number for your records.</p>
                <a href='apply.php' class='back-btn'>Submit Another Application</a>
            </div>
          </div>";
    include 'Inc_Files/footer.inc';
    echo "</body></html>";
} else {
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Application Error</title>
        <link rel='stylesheet' href='styles/styles.css'>
    </head>
    <body>";
    include 'Inc_Files/header.inc';
    echo "<div class='formContainer'>
            <h1>Application Error</h1>
            <div class='error-messages'>
                <p>Sorry, there was an error processing your application. Please try again.</p>
                <p>Error: " . htmlspecialchars($stmt->error) . "</p>
                <a href='apply.php' class='back-btn'>Go Back to Form</a>
            </div>
          </div>";
    include 'Inc_Files/footer.inc';
    echo "</body></html>";
}

$stmt->close();
$conn->close();
?>