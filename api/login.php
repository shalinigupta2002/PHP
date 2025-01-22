<?php
session_start();
include("connect.php");

// Retrieve and sanitize inputs
$mobile = isset($_POST['mobile']) ? $_POST['mobile'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';

if (!empty($mobile) && !empty($password) && !empty($role)) {
    // Use prepared statements for security
    $stmt = $connect->prepare("SELECT * FROM user WHERE mobile = ? AND password = ? AND role = ?");
    $stmt->bind_param("ssi", $mobile, $password, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $userdata = $result->fetch_assoc();
        $groups = $connect->query("SELECT * FROM user WHERE role = 2");
        $groupsdata = $groups->fetch_all(MYSQLI_ASSOC);

        $_SESSION['userdata'] = $userdata;
        $_SESSION['groupsdata'] = $groupsdata;

        echo '
        <script>
            window.location="../routes/dashboard.php";
        </script>';
    } else {
        echo '
        <script>
            alert("Invalid Credentials");
            window.location="../";
        </script>';
    }
    $stmt->close();
} else {
    echo '
    <script>
        alert("All fields are required");
        window.location="../";
    </script>';
}
?>
