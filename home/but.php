<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Button</title>
    <style>
        /* Button Style (Robot Icon) */
        .chatbot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #4CAF50;  /* Green background */
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }

        .chatbot-button img {
            width: 40px; /* Size of the robot icon */
            height: 40px;
        }

        /* Chatbox Style (Popup) */
        .chatbox {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 300px;
            height: 400px;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            display: none; /* Initially hidden */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            z-index: 999;
            padding: 10px;
        }

        .chatbox-header {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            border-radius: 5px;
        }

        .chatbox-body {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .chatbox-footer {
            display: flex;
            margin-top: 10px;
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
            cursor: pointer;
        }

        .chatbox-footer button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <!-- Chatbot Button -->
    <div class="chatbot-button" onclick="openChatbox()">
        <img src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" alt="Chatbot Icon" />
    </div>

    <!-- Chatbox Popup -->
    <div class="chatbox" id="chatbox">
        <div class="chatbox-header">Chatbot</div>
        <div class="chatbox-body">
            <p>How can I help you?</p>
        </div>
        <div class="chatbox-footer">
            <input type="text" id="userMessage" placeholder="Type your message..." />
            <button onclick="sendMessage()">Send</button>
        </div>
    </div>

    <script>
        // Function to open the chatbox
        function openChatbox() {
            document.getElementById('chatbox').style.display = 'block';
        }

        // Function to send a message
        function sendMessage() {
            var userMessage = document.getElementById('userMessage').value;
            if (userMessage.trim() !== "") {
                var chatboxBody = document.querySelector('.chatbox-body');
                var userMessageElement = document.createElement('p');
                userMessageElement.textContent = "You: " + userMessage;
                chatboxBody.appendChild(userMessageElement);

                // Clear the input field
                document.getElementById('userMessage').value = "";

                // Scroll to the bottom of the chatbox
                chatboxBody.scrollTop = chatboxBody.scrollHeight;

                // Send the bot response after a delay
                setTimeout(function() {
                    var botMessageElement = document.createElement('p');
                    botMessageElement.textContent = "Bot: I'm here to help!";
                    chatboxBody.appendChild(botMessageElement);
                    chatboxBody.scrollTop = chatboxBody.scrollHeight;
                }, 1000);
            }
        }
    </script>

    <?php
    // Example of dynamically generating the button using PHP
    // You can replace this with any condition or dynamic content generation
    // For now, it just echoes the same HTML for the button
    echo '
        <div class="chatbot-button" onclick="openChatbox()">
            <img src="https://image.shutterstock.com/image-vector/robot-icon-260nw-720919227.jpg" alt="Chatbot Icon" />
        </div>
    ';
    ?>

</body>
</html>
