<!-- subscribe.php -->
<?php
$servername = "localhost";
$username = "root"; // your MySQL username
$password = ""; // your MySQL password
$dbname = "carrefour_mall";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the email from the form
$email = $_POST['email'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO subscriptions (email) VALUES (?)");
$stmt->bind_param("s", $email);

// Execute the statement
if ($stmt->execute()) {
    echo "Thank you for subscribing!";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
