<?php
header("Content-Type: text/plain");

// Database connection (update credentials as needed)
$conn = new mysqli("localhost", "root", "", "ecomm");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$message = strtolower(trim($_POST["message"]));

// Simple greetings
$greetings = [
    "hi" => "Hello!",
    "hello" => "Hi there!",
    "hey" => "Hey! Need help with a product?",
    "good morning" => "Good morning! 🌞",
    "good evening" => "Good evening! 🌙",
    "how are you" => "I'm just a bot, but I'm happy to help! 🤖",
    "thanks" => "You're welcome!",
    "thank you" => "Glad to assist!"
];

foreach ($greetings as $key => $reply) {
    if (strpos($message, $key) !== false) {
        echo $reply;
        exit;
    }
}

// Price check
if (strpos($message, "price of") !== false) {
    $product = trim(str_replace("price of", "", $message));
    $stmt = $conn->prepare("SELECT name, price FROM products WHERE name LIKE CONCAT('%', ?, '%') LIMIT 1");
    $stmt->bind_param("s", $product);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();

    if ($res) {
        echo "The price of {$res['name']} is \${$res['price']}.";
    } else {
        echo "Sorry, I couldn't find that product.";
    }
    exit;
}

// Product comparison
if (strpos($message, "compare") !== false && strpos($message, "and") !== false) {
    $parts = explode("and", str_replace("compare", "", $message));
    $p1 = trim($parts[0]);
    $p2 = trim($parts[1]);

    $stmt1 = $conn->prepare("SELECT name, price FROM products WHERE name LIKE CONCAT('%', ?, '%') LIMIT 1");
    $stmt1->bind_param("s", $p1);
    $stmt1->execute();
    $res1 = $stmt1->get_result()->fetch_assoc();

    $stmt2 = $conn->prepare("SELECT name, price FROM products WHERE name LIKE CONCAT('%', ?, '%') LIMIT 1");
    $stmt2->bind_param("s", $p2);
    $stmt2->execute();
    $res2 = $stmt2->get_result()->fetch_assoc();

    if ($res1 && $res2) {
        echo "{$res1['name']} (\${$res1['price']}) vs {$res2['name']} (\${$res2['price']})";
    } else {
        echo "Sorry, one or both products were not found.";
    }
    exit;
}

// PC build suggestion
if (strpos($message, "build") !== false || strpos($message, "setup") !== false) {
    echo "Here's a great PC build suggestion: Ryzen 5 CPU, 16GB RAM, 512GB SSD, and RTX 3060 GPU. Want more options?";
    exit;
}

// Default fallback
echo "I didn't understand that. Try asking about product prices, comparisons, or PC builds.";

$conn->close();
?>
