<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "time";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the latest voting time settings
$sql = "SELECT start_time, end_time FROM timing ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $start_time = strtotime($row['start_time']);
    $end_time = strtotime($row['end_time']);
    $current_time = time();

    if ($current_time >= $start_time && $current_time <= $end_time) {
        echo "Voting is open! Cast your vote now.";
        // Display voting form or functionality here
    } elseif ($current_time < $start_time) {
        echo "Voting has not started yet. It will start on " . date("2025-1-01 H:i:s", $start_time) . ".";
    } else {
        echo "Voting has ended. Thank you for your interest!";
    }
} else {
    echo "Voting time is not set. Please contact the administrator.";
}
?>
