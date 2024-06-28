<?php
session_start();

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
$password = $_POST['password'];

// Validate inputs (basic validation, you may need to improve this)
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Hash the password (you should use a stronger hashing algorithm like bcrypt in production)
$password = md5($password);

// Query to check if user exists
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login successful
    $_SESSION['email'] = $email;
    header('Location: index.html'); // Redirect to dashboard or another page
    exit();
} else {
    // Invalid credentials
    $_SESSION['login_error'] = 'Invalid email or password';
    header('Location: Login.html'); // Redirect back to login page with error message
    exit();
}

$conn->close();
?>
