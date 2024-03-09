<?php
// Connect to MySQL database
$servername = "localhost"; // Replace with your database server name
$username = "your_username"; // Replace with your database username
$password = "your_password"; // Replace with your database password
$dbname = "test"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Connect to database (same connection details as login_process.php)

// Get form data
$user_id = $_POST['user_id'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password securely
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Prepare SQL query to insert user into the database
$sql = "INSERT INTO users (user_id, email, password) VALUES ('$user_id', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
