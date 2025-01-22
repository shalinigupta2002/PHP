<?php
// Database connection
$host = "localhost"; // Replace with your host
$user = "root";      // Replace with your database username
$pass = "";          // Replace with your database password
$db = "time"; // Replace with your database name

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    // Validate inputs
    if (!empty($start_time) && !empty($end_time)) {
        // Save settings to database
        $stmt = $conn->prepare("INSERT INTO timing (start_time, end_time) VALUES (?, ?)");
        $stmt->bind_param("ss", $start_time, $end_time);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $message = "Voting time set successfully!";
            $messageType = "success";
        } else {
            $message = "Error setting voting time.";
            $messageType = "error";
        }
        $stmt->close();
    } else {
        $message = "Both start and end times are required.";
        $messageType = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Set Voting Time</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        label {
            font-size: 1rem;
            color: #555;
        }
        input[type="datetime-local"] {
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Set Voting Time</h1>
        <?php if (isset($message)): ?>
            <div class="message <?= $messageType; ?>">
                <?= $message; ?>
            </div>
        <?php endif; ?>
        <form method="POST">
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" name="start_time" required>
            
            <label for="end_time">End Time:</label>
            <input type="datetime-local" id="end_time" name="end_time" required>
            
            <button type="submit">Set Voting Time</button>
        </form>
    </div>
</body>
</html>

