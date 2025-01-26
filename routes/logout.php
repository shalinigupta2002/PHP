<?php
session_start();
 session_destroy();
 ?>

 <script>
    alert("You have been logged out successfully.");
    window.location.href = "../pr/welcome.php";
 </script>