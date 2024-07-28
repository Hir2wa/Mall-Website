<?php
// server.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrefour_mall";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header("Location: error.php?error=" . urlencode($conn->connect_error));
    exit();
}

$stmt = $conn->prepare("INSERT INTO orders (name, email, phone, location, food_item, drink, sweetness, quantity, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssis", $name, $email, $phone, $location, $food_item, $drink, $sweetness, $quantity, $message);

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$food_item = $_POST['food_item'];
$drink = $_POST['drink'];
$sweetness = $_POST['sweetness'];
$quantity = $_POST['quantity'];
$message = $_POST['message'];

if ($stmt->execute()) {
    echo "New order has been placed successfully!";
} else {
    header("Location: error.php?error=" . urlencode($stmt->error));
    exit();
}

$stmt->close();
$conn->close();
?>
