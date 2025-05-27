<?php
// Your PHP code here (optional)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Round Robot Icon Button</title>
    
    <!-- Include Font Awesome from CDN for the robot icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Style for the round robot button */
        .robot-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            background-color: #4CAF50; /* Button background color */
            border-radius: 50%; /* Make it round */
            color: white;
            font-size: 30px; /* Icon size */
            display: flex;
            justify-content: center;
            align-items: center;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); /* Optional shadow */
            transition: background-color 0.3s ease;
        }

        /* Hover effect */
        .robot-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
    <!-- Round button with a robot icon -->
    <button class="robot-button">
        <i class="fas fa-robot"></i>
    </button>
</body>
</html>


https://static.superbot.works/chatbot/media/superbot1.png