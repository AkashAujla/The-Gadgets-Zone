<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header("Content-Type: text/plain");

    $OPENAI_API_KEY = 'sk-xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
    $conn = new mysqli("localhost", "admin@admin.com", "password", "ecomm");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $message = strtolower(trim($_POST['message'] ?? ''));
    $response = "🤖 I'm not sure I understood. Try asking: 'build pc under 3000' or 'compare iphone and samsung'";

    function log_chat($conn, $userMsg, $botReply) {
        $stmt = $conn->prepare("INSERT INTO chat_logs (message, reply) VALUES (?, ?)");
        $stmt->bind_param("ss", $userMsg, $botReply);
        $stmt->execute();
    }

   
    if (preg_match('/\b(hi|hello|hey|good morning|good evening|good afternoon)\b/i', $message)) {
        $reply = "👋 Hi! How can I help you.";
        log_chat($conn, $message, $reply);
        echo $reply;
        exit;
    }

    error_log("User Message: $message");
    error_log("API Key length: " . strlen($OPENAI_API_KEY));

  
    if (preg_match('/compare (.*?) (with|and) (.*)/', $message, $match)) {
        $product1 = $conn->real_escape_string($match[1]);
        $product2 = $conn->real_escape_string($match[3]);

        $sql = "SELECT name, price FROM products WHERE name LIKE '%$product1%' OR name LIKE '%$product2%' LIMIT 2";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $reply = "🆚 Product Comparison:\n";
            while ($row = $result->fetch_assoc()) {
                $reply .= "- {$row['name']} (\${$row['price']})\n";
            }
        } else {
            $reply = "❌ Couldn’t find one or both products.";
        }
        log_chat($conn, $message, $reply);
        echo nl2br($reply);
        exit;
    }

    $maxPrice = null;
    if (preg_match("/under \$?(\d+)/", $message, $match)) {
        $maxPrice = (int)$match[1];
    }

    // Search-like queries
    if (preg_match('/\b(search|find|show|price of)\b\s+(.*)/i', $message, $match)) {
        $keyword = $conn->real_escape_string(trim($match[2]));
      

$keyword = "%$keyword%";  

$sql = "SELECT name, price FROM products WHERE name LIKE :keyword OR brand LIKE :keyword OR category LIKE :keyword ORDER BY price ASC LIMIT 5";
$stmt = $pdo->prepare($sql);
$stmt->execute(['keyword' => $keyword]);

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


   $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) {
            $reply = "🔍 Search results for '$keyword':\n";
            while ($row = $res->fetch_assoc()) {
                $reply .= "- {$row['name']} (\${$row['price']})\n";
            }
        } else {
            $reply = "❌ No products found for '$keyword'. Try another search.";
        }
        log_chat($conn, $message, $reply);
        echo nl2br($reply);
        exit;
    }

    $intents = [
        'build pc' => ['cpu', 'gpu', 'ram', 'ssd', 'hdd', 'cooler', 'motherboard', 'case'],
        'pc setup' => ['pc', 'monitor', 'mouse', 'keyboard', 'speaker', 'joystick', 'wheel', 'controller'],
        'full setup' => ['pc', 'monitor', 'mouse', 'keyboard', 'speaker', 'joystick', 'wheel', 'controller', 'chair', 'table', 'decoration']
    ];

    foreach ($intents as $intent => $parts) {
        if (strpos($message, $intent) !== false) {
            $reply = "💻 Suggested $intent:\n";
            foreach ($parts as $keyword) {
                $k = $conn->real_escape_string($keyword);
                $sql = "SELECT name, price FROM products WHERE name LIKE '%$k%'" . ($maxPrice ? " AND price <= $maxPrice" : "") . " ORDER BY price ASC LIMIT 1";
                $res = $conn->query($sql);
                if ($res && $res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        $reply .= "- {$row['name']} (\${$row['price']})\n";
                    }
                }
            }
            log_chat($conn, $message, $reply);
            echo nl2br($reply);
            exit;
        }
    }

    // Fallback keyword search — SMARTER MATCHING
    $keyword = $conn->real_escape_string($message);
    $sql = "SELECT name, price FROM products WHERE name LIKE '%$keyword%' OR brand LIKE '%$keyword%' OR category LIKE '%$keyword%' ORDER BY price ASC LIMIT 5";
    $res = $conn->query($sql);
    if ($res && $res->num_rows > 0) {
        $reply = "📦 Related results:\n";
        while ($row = $res->fetch_assoc()) {
            $reply .= "- {$row['name']} (\${$row['price']})\n";
        }
        log_chat($conn, $message, $reply);
        echo nl2br($reply);
        exit;
    }

    // OpenAI fallback
    $apiURL = "https://api.openai.com/v1/chat/completions";
    $data = [
        "model" => "gpt-3.5-turbo",
        "messages" => [
            ["role" => "system", "content" => "You are a helpful shopping assistant. Answer clearly."],
            ["role" => "user", "content" => $message]
        ]
    ];

    $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer $OPENAI_API_KEY"
    ];

    $ch = curl_init($apiURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $aiResponse = curl_exec($ch);
    curl_close($ch);

    if (!$aiResponse) {
        error_log("❌ OpenAI API did not respond");
        $reply = "❌ No response from OpenAI. Check your API key or internet.";
        log_chat($conn, $message, $reply);
        echo $reply;
        exit;
    }

    $result = json_decode($aiResponse, true);
    if (is_array($result) && isset($result['choices'][0]['message']['content'])) {
        $reply = trim($result['choices'][0]['message']['content']);
    } else {
        $reply = "❌ I couldn't understand that. Please rephrase.";
    }

    log_chat($conn, $message, $reply);
    echo nl2br($reply);
    $conn->close();
    exit;
}
?>
<style>
  .chatbot-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #43cea2, #185a9d);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    z-index: 1000;
    transition: transform 0.3s ease;
  }
  .chatbot-button:hover {
    transform: scale(1.1);
  }
  .chatbot-button img {
    width: 36px;
    height: 36px;
  }
  .chatbox {
    position: fixed;
    bottom: 90px;
    right: 20px;
    width: 350px;
    height: 480px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    display: none;
    flex-direction: column;
    z-index: 999;
  }
  .chatbox-header {
    background: #185a9d;
    color: #fff;
    padding: 12px;
    font-weight: bold;
    text-align: center;
    border-radius: 12px 12px 0 0;
  }
  .chatbox-body {
    padding: 10px;
    height: 355px;
    overflow-y: auto;
    font-size: 14px;
    background: #f0f4f7;
  }
  .chatbox-footer {
    display: flex;
    padding: 10px;
    border-top: 1px solid #ccc;
    background: #fafafa;
  }
  .chatbox-footer input {
    flex: 1;
    padding: 8px;
    border-radius: 8px;
    border: 1px solid #ccc;
  }
  .chatbox-footer button {
    margin-left: 8px;
    background: #43cea2;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.3s ease;
  }
  .chatbox-footer button:hover {
    background: #2e9e83;
  }
</style>


<script>
function toggleChatbox() {
  const box = document.getElementById('chatbox');
  box.style.display = (box.style.display === 'block') ? 'none' : 'block';
}

function sendMessage() {
  const input = document.getElementById('userMessage');
  const msg = input.value.trim();
  const body = document.getElementById('chatbox-body');
  if (!msg) return;
  body.innerHTML += `<p><strong>You:</strong> ${msg}</p>`;
  input.value = "";
  fetch("chatbot.php", {
    method: "POST",
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: "message=" + encodeURIComponent(msg)
  })
  .then(res => res.text())
  .then(reply => {
    body.innerHTML += `<p><strong>Bot:</strong> ${reply.replace(/\n/g, "<br>")}</p>`;
    body.scrollTop = body.scrollHeight;
  });
}

document.getElementById('userMessage').addEventListener("keypress", function(e) {
  if (e.key === "Enter") sendMessage();
});
</script>

<div class="chatbot-button" onclick="toggleChatbox()">
  <img src="https://static.superbot.works/chatbot/media/superbot1.png" alt="Chatbot Icon">
</div>

<div class="chatbox" id="chatbox">
  <div class="chatbox-header">🧠 SmartBot</div>
  <div class="chatbox-body" id="chatbox-body">
    <p><strong>Bot:</strong> Hi! How can I help you today?</p>
  </div>
  <div class="chatbox-footer">
    <input type="text" id="userMessage" placeholder="Type your message..." />
    <button onclick="sendMessage()">Send</button>
  </div>
</div>
