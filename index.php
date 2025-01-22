<?php
session_start();

// Define voting session start and end time
$start_time = strtotime("2025-01-17 00:00:00");
$end_time = strtotime("2025-08-25 00:00:00");
$current_time = time();

// Check if the current time is within the voting session
if ($current_time < $start_time || $current_time > $end_time) {
    $voting_status = "Voting is not available at this time.";
    $is_voting_active = false;
} else {
    $voting_status = "Voting is active! You can cast your vote.";
    $is_voting_active = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Building Voting System</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    <style>
        body {
            background-color: #a517ba;
        }
        .header {
            background-color: #F5F5F5;
            color: black;
            padding: 20px;
            text-align: center;
            border-radius: 8px; 
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #F5F5F5;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .timing-info {
            background: orange;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }
        .timing-info h4 {
            margin: 0;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Building Voting System</h1>
    </div>

    <div class="container">
        <div class="timing-info">
            <h4>Voting Timings</h4>
            <p>Start Time: <strong><?= date("Y-m-d H:i:s", $start_time); ?></strong></p>
            <p>End Time: <strong><?= date("Y-m-d H:i:s", $end_time); ?></strong></p>
            <p>Status: <strong><?= $voting_status; ?></strong></p>
        </div>

        <?php if ($is_voting_active): ?>
            <form action="api/login.php" method="POST">
                <h3 class="text-center">Login</h3>
                <div class="form-group">
                    <label for="mobile">Mobile Number</label>
                    <input type="number" name="mobile" id="mobile" class="form-control" placeholder="Enter mobile" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="1">Voter</option>
                        <option value="2">Group</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
                
            </form>
        <?php else: ?>
            <div class="alert alert-warning text-center">
                Voting is currently closed. Please check back during the active voting period.
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
