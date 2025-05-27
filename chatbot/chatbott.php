<?php
header("Content-Type: text/plain");

// Connect to your MySQL database
$conn = new mysqli("localhost", "root", "", "ecomm"); // ← update with your DB credentials if needed

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Get user message
$message = strtolower(trim($_POST["message"]));

// GREETINGS
$greetings = [
    "hi" => "Hello!",
    "hello" => "Hi there!",
    "hey" => "Hey! How can I help you?",
    "good morning" => "Good morning! Need help with a product?",
    "good evening" => "Good evening! Looking to buy something?",
    "how are you" => "I'm doing great! How can I help with your PC or shopping?",
    "thanks" => "You're welcome!",
    "thank you" => "Glad to assist!"
];

foreach ($greetings as $key => $reply) {
    if (strpos($message, $key) !== false) {
        echo $reply;
        exit;
    }
}

// PRICE CHECK
if (strpos($message, "price of") !== false) {
    $product_name = trim(str_replace("price of", "", $message));
    $stmt = $conn->prepare("SELECT name, price FROM products WHERE name LIKE CONCAT('%', ?, '%') LIMIT 1");
    $stmt->bind_param("s", $product_name);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if ($result) {
        echo "The price of {$result['name']} is \${$result['price']}.";
    } else {
        echo "Sorry, I couldn't find the product.";
    }
    exit;
}

// PRODUCT COMPARISON
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
        echo "Sorry, I couldn't compare those products.";
    }
    exit;
}

// PC BUILD HELP
if (strpos($message, "build") !== false || strpos($message, "setup") !== false) {
    echo "Here's a great PC build: Ryzen 5 CPU, 16GB RAM, 512GB SSD, RTX 3060 GPU — great for gaming and work!";
    exit;
}

// DEFAULT RESPONSE
echo "I'm not sure how to answer that. You can ask me about product prices, comparisons, or PC builds.";

$conn->close();
?>
