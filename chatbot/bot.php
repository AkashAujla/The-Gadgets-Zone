<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Content-Type: text/plain");

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "ecomm";

    $conn = new mysqli($host, $user, $pass, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userMessage = trim(strtolower($_POST['message'] ?? ''));
    $response = "Sorry, I didn't understand that.";

    $greetings = ["hi", "hello", "hey", "good morning", "good afternoon", "good evening"];
    foreach ($greetings as $greet) {
        if (strpos($userMessage, $greet) !== false) {
            $response = "Hello! I can help you with product info, comparing items, or building a PC.";
            echo $response;
            $conn->close();
            exit;
        }
    }

    if (strpos($userMessage, 'build pc') !== false || strpos($userMessage, 'pc setup') !== false) {
        $response = "To build a PC, you'll need:\n- CPU\n- GPU\n- RAM\n- Storage\n- Motherboard\n- Power Supply\n- Case\nLet me know your purpose: gaming, office, or budget?";
        echo nl2br($response);
        $conn->close();
        exit;
    }

    if (strpos($userMessage, 'compare') !== false) {
        preg_match('/compare\s+(.*?)\s+and\s+(.*)/i', $userMessage, $matches);
        if (!empty($matches[1]) && !empty($matches[2])) {
            $product1 = $conn->real_escape_string($matches[1]);
            $product2 = $conn->real_escape_string($matches[2]);

            $sql = "SELECT name, price FROM products WHERE name LIKE '%$product1%' OR name LIKE '%$product2%' LIMIT 2";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $response = "Comparison:\n";
                while ($row = $result->fetch_assoc()) {
                    $response .= "- " . htmlspecialchars($row['name']) . " ($" . $row['price'] . ")\n";
                }
            } else {
                $response = "Couldn't find one or both products.";
            }
        } else {
            $response = "Use: compare [product1] and [product2]";
        }

        echo nl2br($response);
        $conn->close();
        exit;
    }

    if (strpos($userMessage, 'laptop') !== false) {
        $sql = "SELECT name, price FROM products WHERE category_id = 1 LIMIT 3";
    } elseif (strpos($userMessage, 'phone') !== false) {
        $sql = "SELECT name, price FROM products WHERE category_id = 4 LIMIT 3";
    } elseif (strpos($userMessage, 'ram') !== false) {
        $sql = "SELECT name, price FROM products WHERE category_id = 9 LIMIT 3";
    } elseif (preg_match('/price of (.+)/i', $userMessage, $match)) {
        $product = $conn->real_escape_string($match[1]);
        $sql = "SELECT name, price FROM products WHERE name LIKE '%$product%' LIMIT 1";
    } else {
        $sql = null;
    }

    if ($sql) {
        $result = $conn->query($sql);
        if ($result && $result->num_rows > 0) {
            $response = "";
            while ($row = $result->fetch_assoc()) {
                $response .= "- " . htmlspecialchars($row['name']) . " ($" . $row['price'] . ")\n";
            }
        } else {
            $response = "No results found.";
        }
    }

    echo nl2br($response);
    $conn->close();
    exit;
}
?>
