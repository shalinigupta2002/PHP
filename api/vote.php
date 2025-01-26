<?php
session_start();
include("connect.php");

// Get the data from the POST request and session
$votes = $_POST['gvotes'];
$total_votes = $votes + 1;
$flatno = $_POST['gid']; // Assuming 'gid' now refers to flatno
$uid_flatno = $_SESSION['userdata']['flatno']; // Use flatno for the current user

// Update the votes for the selected group
$update_votes = mysqli_query($connect, "UPDATE user SET votes='$total_votes' WHERE flatno='$flatno'");

// Update the voting status for the current user
$update_user_status = mysqli_query($connect, "UPDATE user SET status=1 WHERE flatno='$uid_flatno'");

if ($update_votes && $update_user_status) {
    // Fetch all groups (assuming role 2 means 'groups')
    $groups = $connect->query("SELECT * FROM user WHERE role = 2");
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC);

    // Update the session data
    $_SESSION['userdata']['status'] = 1;
    $_SESSION['groupsdata'] = $groupsdata;

    // Redirect with success message
    echo '
    <script>
    alert("Voting successful");
    window.location.href = "../routes/dashboard.php";
    </script>';
} else {
    // Redirect with failure message
    echo '
    <script>
    alert("Failed to vote");
    window.location.href = "../routes/dashboard.php";
    </script>';
}
?>
