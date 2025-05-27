<?php
// Database connection
$host = "localhost";
$user = "admin@admin.com";
$pass = "password";
$dbname = "ecomm";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userMessage = trim($_POST['message'] ?? '');
$response = "Sorry, I didn't understand that.";

// Basic keyword matching
if (stripos($userMessage, 'laptop') !== false) {
    $sql = "SELECT name, price FROM products WHERE category_id = 1 LIMIT 3";
} elseif (stripos($userMessage, 'phone') !== false) {
    $sql = "SELECT name, price FROM products WHERE category_id = 4 LIMIT 3";
} elseif (stripos($userMessage, 'ram') !== false) {
    $sql = "SELECT name, price FROM products WHERE category_id = 9 LIMIT 3";
} else {
    $sql = null;
}

if ($sql) {
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $response = "";
        while ($row = $result->fetch_assoc()) {
            $response .= "- " . $row['name'] . " ($" . $row['price'] . ")\n";
        }
    } else {
        $response = "No results found.";
    }
}

echo nl2br($response);
$conn->close();
?>
