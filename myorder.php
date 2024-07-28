<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carrefour_mall";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$items = json_decode($_POST['items'], true);
$total = $_POST['total'];

// Convert items array to JSON
$items_json = json_encode($items);

// Calculate total number of items
$total_items = 0;
foreach ($items as $item) {
    $total_items += $item['quantity'];
}

// Insert order with JSON items and total items
$sql = "INSERT INTO orders (name, email, phone, location, items, total_items, total) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssid", $name, $email, $phone, $location, $items_json, $total_items, $total);

if ($stmt->execute()) {
    echo "Order placed successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$stmt->close();
$conn->close();
?>
