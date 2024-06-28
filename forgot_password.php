<?php
// Replace with your database connection details
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];

// Validate inputs (basic validation, you may need to improve this)
$email = mysqli_real_escape_string($conn, $email);

// Check if email exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email exists, you would typically send a password reset link here
    echo 'Password reset link sent to your email';
} else {
    // Email doesn't exist
    echo 'Email not found';
}

$conn->close();
?>
