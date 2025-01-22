<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Navbar Styling */
        body{
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #a517ba;
        }
        .navbar {
            font-family: Arial, sans-serif;
            font-size: 16px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
        }
        .navbar-nav .nav-item .nav-link {
            color: white;
            margin-right: 10px;
            transition: color 0.3s ease-in-out;
        }
        .navbar-nav .nav-item .nav-link:hover {
            color: #ff9800;
            text-decoration: underline;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 20px;
            color: #ff9800;
        }
        .navbar-brand:hover {
            color: white;
            text-decoration: none;
        }
        /* Body and Section Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .home-section {
            background-color: #ffffff;
            padding: 50px;
            margin: 20px auto;
            max-width: 900px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .home-section h1 {
            font-size: 32px;
            color: #333;
            font-weight: bold;
        }
        .home-section p {
            font-size: 18px;
            color: #555;
            line-height: 1.6;
        }
        .btn-custom {
            background-color: #ff9800;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #cc7a00;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php require 'partials/_nav.php'; ?>
    
    <!-- Home Section -->
    <div class="home-section">
        <h1>Welcome to the Admin Dashboard</h1>
        <p>
            As an administrator, you have complete control over the voting system. 
            From this dashboard, you can manage voters, oversee groups, track votes, 
            and ensure the voting process runs smoothly and transparently.
        </p>
        <p>
            Use the navigation bar above to access different sections, or click the button below to get started.
        </p>
        <button class="btn-custom">Explore Dashboard</button>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

