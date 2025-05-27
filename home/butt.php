<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Chatbot</title>
    <style>
        /* Floating Chatbot Button */
        .chatbot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #4CAF50;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .chatbot-button img {
            width: 40px;
            height: 40px;
        }

        /* Chatbox Popup */
        .chatbox {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 300px;
            height: 400px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 999;
            display: flex;
            flex-direction: column;
        }

        .chatbox-header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border-radius: 10px 10px 0 0;
        }

        .chatbox-body {
            flex: 1;
            overflow-y: auto;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .chatbox-footer {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ccc;
        }

        .chatbox-footer input {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .chatbox-footer button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            margin-left: 5px;
            cursor: pointer;
        }

        .chat-message {
            margin: 5px 0;
            padding: 8px;
            border-radius: 5px;
            max-width: 80%;
            word-wrap: break-word;
        }

        .user-message {
            background-color: #d3f8e2;
            text-align: right;
            align-self: flex-end;
        }

        .bot-message {
            background-color: #e8e8e8;
            align-self: flex-start;
        }
    </style>
</head>
<body>

    <!-- Floating Button -->
    <div class="chatbot-button" onclick="toggleChatbox()">

        <img src="https://static.superbot.works/chatbot/media/superbot1.png" alt="Chatbot Icon" />
    </div>

    <!-- Popup Chatbox -->
    <div class="chatbox" id="chatbox">
        <div class="chatbox-header">Chatbot</div>
        <div class="chatbox-body" 
		 <p>How can I help you?</p>
            <!-- Messages appear here -->
        </div>
        <div class="chatbox-footer">
            <input type="text" id="user-input" placeholder="Type your message...">
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        function toggleChatbox() {
            const chatbox = document.getElementById('chatbox');
            chatbox.style.display = chatbox.style.display === 'block' ? 'none' : 'block';
        }

        function sendMessage() {
            const userInput = document.getElementById("user-input");
            const message = userInput.value.trim();
            if (message === "") return;

            addMessage(message, "user");

            fetch("http://127.0.0.1:5000/chat", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({ message: message })
            })
            .then(res => res.json())
            .then(data => {
                addMessage(data.response, "bot");
            })
            .catch(error => {
                addMessage("Sorry, an error occurred.", "bot");
                console.error("Error:", error);
            });

            userInput.value = "";
        }

        function addMessage(text, sender) {
            const chatboxBody = document.getElementById("chatbox-body");
            const msg = document.createElement("div");
            msg.classList.add("chat-message");
            msg.classList.add(sender === "user" ? "user-message" : "bot-message");
            msg.textContent = text;
            chatboxBody.appendChild(msg);
            chatboxBody.scrollTop = chatboxBody.scrollHeight;
        }

        // Optional: Enable Enter key to send
        document.getElementById("user-input").addEventListener("keypress", function(event) {
            if (event.key === "Enter") {
                sendMessage();
            }
        });
    </script>

</body>
</html>
