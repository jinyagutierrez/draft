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
$password = $_POST['password'];

// Validate inputs (basic validation, you may need to improve this)
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Hash the password (you should use a stronger hashing algorithm like bcrypt in production)
$password_hashed = md5($password);

// Check if email already exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email already exists
    echo 'Email already registered';
} else {
    // Insert new user into database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password_hashed')";

    if ($conn->query($sql) === TRUE) {
        echo 'Registration successful';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }
}

$conn->close();
?>
