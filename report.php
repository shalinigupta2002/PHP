<?php
session_start();

$groupsdata = $_SESSION['groupsdata'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        #headerSection {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }
        #headerSection h1 {
            margin: 0;
            font-size: 28px;
            font-weight: bold;
        }
        #mainsection {
            padding: 20px;
        }
        .group-card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        .group-card img {
            border-radius: 50%;
            margin-right: 20px;
        }
        .group-info {
            flex-grow: 1;
        }
        .group-info h4 {
            margin: 0 0 10px;
            font-size: 20px;
        }
        .votes {
            font-size: 18px;
            font-weight: bold;
            color: #007bff;
        }
        .btn-back {
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-back:hover {
            background-color: #5a6268;
        }
        .no-data {
            text-align: center;
            font-size: 18px;
            color: #6c757d;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div id="headerSection">
    <h1>Voting Results</h1>
</div>

<div id="mainsection" class="container">
    <a href="../">
        <button class="btn-back mb-4">Back to Dashboard</button>
    </a>
    <?php if (!empty($groupsdata)) { ?>
        <?php foreach ($groupsdata as $group) { ?>
            <div class="group-card">
                <img src="../uploads/<?php echo $group['photo']; ?>" alt="Group Photo" height="100" width="100">
                <div class="group-info">
                    <h4>Group Name: <?php echo $group['name']; ?></h4>
                    <p class="votes">Votes: <?php echo $group['votes']; ?></p>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="no-data">
            No groups data available to display.
        </div>
    <?php } ?>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
