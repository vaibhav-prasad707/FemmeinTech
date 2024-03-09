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

// Get form data
$user_id = $_POST['user_id'];
$password = $_POST['password'];

// Prepare SQL query to validate user credentials (replace with your table and column names)
$sql = "SELECT * FROM users WHERE user_id = '$user_id' AND password = '$password'";
$result = $conn->query($sql);

// Check if user exists
if ($result->num_rows > 0) {
    // User found, proceed with login
    echo "Login successful!";
    // Redirect to a secure page or set session variables for authentication
} else {
    // User not found, display error message
    echo "Invalid user ID or password";
}

// Close database connection
$conn->close();
?>
