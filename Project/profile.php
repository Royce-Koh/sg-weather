<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Default username for WAMP
$password = ""; // Default password for WAMP
$dbname = "save_food"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'user' parameter is present in the GET request
if (isset($_GET['user'])) {
    $user = $_GET['user'];

    // Prepare and execute SQL query to get the filename for the specified user
    $sql = $conn->prepare("SELECT filename FROM profile WHERE user = ?");
    $sql->bind_param("s", $user); // 's' indicates that the parameter is a string
    $sql->execute();
    $sql->bind_result($filename);
    $sql->fetch();

    // Check if a filename was found and return it, otherwise return "No image"
    if ($filename) {
        echo $filename;
    } else {
        echo "No image";
    }

    // Close the statement
    $sql->close();
} else {
    echo "User parameter missing in the GET request.";
}

// Close the connection
$conn->close();
