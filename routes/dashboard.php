<?php
session_start();

// Set voting start and end time
$voting_start_time = strtotime("2025-01-21 09:00:00"); // Example start time
$voting_end_time = strtotime("2025-01-28 18:00:00"); // Example end time
$current_time = time();

// Check if current time is outside the voting window
if ($current_time > $voting_end_time) {
    header("Location: http://localhost/pr/api/votingresult.php");
    exit;
}

if (!isset($_SESSION['userdata']) || !isset($_SESSION['groupsdata'])) {
    echo "<script>
            alert('Session Expired. Please log in again.');
            window.location = '/admin/login.php';
          </script>";
    exit;
}

$userdata = $_SESSION['userdata'];
$groupsdata = $_SESSION['groupsdata'];

$status = $_SESSION['userdata']['status'] == 0
    ? '<span class="text-danger font-weight-bold">Not Voted</span>'
    : '<span class="text-success font-weight-bold">Voted</span>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #a517ba;
            font-family: 'Arial', sans-serif;
            text:black;
        }
        #headerSection {
            background-color:#F5F5F5;
            color: black;
            padding: 15px;
            text-align: center;
            border-radius: 8px;
        }
        #headerSection h1 {
            margin: 0;
            font-size: 28px;
        }
        #backbtn, #logoutbtn {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        #backbtn {
            background-color: rgb(33, 86, 128);
            color: white;
        }
        #logoutbtn {
            background-color: rgb(33, 86, 128);
            color: white;
        }
        #backbtn:hover {
            background-color:green;
        }
        #logoutbtn:hover {
            background-color:green;
        }
        #profileCard {
            background-color: #F5F5F5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        #groupsSection {
            margin-top: 20px;
        }
        .group-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .group-card img {
            border-radius: 50%;
            margin-right: 20px;
        }
        .group-card h5 {
            margin: 0;
        }
        .btn-vote {
            background-color: #28a745;
            color: white;
            font-size: 16px;
            border: none;
            padding: 5px 15px;
            border-radius: 5px;
        }
        .btn-vote:disabled {
            background-color: #6c757d;
            cursor: not-allowed;
        }
        .btn-vote:hover:not(:disabled) {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div id="headerSection">
        <h1>Building Voting System</h1>
        <div class="d-flex justify-content-between px-4 mt-3">
            <a href="../"><button id="backbtn">Back</button></a>
            <a href="../welcome.php"><button id="logoutbtn">Logout</button></a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container my-4">
        <!-- User Profile -->
        <div id="profileCard" class="mb-4">
            <h3 class="text-center mb-3">Your Profile</h3>
            <div class="text-center">
                <img src="../uploads/<?php echo isset($userdata['photo']) ? $userdata['photo'] : 'default.png'; ?>" 
                     alt="User Photo" class="rounded-circle" height="150" width="150">
            </div>
            <div class="mt-3">
                <p><b>Name:</b> <?php echo isset($userdata['name']) ? $userdata['name'] : 'N/A'; ?></p>
                <p><b>Mobile:</b> <?php echo isset($userdata['mobile']) ? $userdata['mobile'] : 'N/A'; ?></p>
                <p><b>Flat No:</b> <?php echo isset($userdata['flatno']) ? $userdata['flatno'] : 'N/A'; ?></p>
                <p><b>Status:</b> <?php echo $status; ?></p>
            </div>
        </div>

        <!-- Voting Groups -->
        <div id="groupsSection">
            <h3 class="text-center mb-4">Available Candidate</h3>
            <?php if ($groupsdata): ?>
                <?php foreach ($groupsdata as $group): ?>
                    <div class="group-card">
                        <img src="../uploads/<?php echo $group['photo']; ?>" alt="Group Photo" height="100" width="100">
                        <div class="flex-grow-1">
                            <h5>Candidate Name: <?php echo $group['name']; ?></h5><br>
                            <p><b>Position:</b> Secretary</p>
                            <p><b>Flat Number:</b> <?php echo isset($group['flatno']) ? $group['flatno'] : 'N/A'; ?></p>
                            <p><b>Description:</b> <?php echo isset($group['description']) ? $group['description'] : 'N/A'; ?></p>
                            <p><b>Votes:</b> <?php echo $group['votes']; ?></p>
                        </div>
                        <form action="../api/vote.php" method="POST" class="d-flex align-items-center">
                            <input type="hidden" name="gvotes" value="<?php echo $group['votes']; ?>">
                            
                            <button type="submit" name="votebtn" 
                                    class="btn-vote" 
                                    <?php echo $_SESSION['userdata']['status'] != 0 ? 'disabled' : ''; ?>>
                                <?php echo $_SESSION['userdata']['status'] == 0 ? 'Vote' : 'Already Voted'; ?>
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-muted">No groups available to display.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
