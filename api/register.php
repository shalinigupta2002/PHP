<?php 
include("connect.php");

// Check if all required POST and FILES fields are set


    $name = $_POST['name'];
    $flatno = $_POST['flatno'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $description = $_POST['description'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];

    // Validate password match
    if($password === $cpassword) {
        // Move uploaded file
        $upload_path = "../uploads/" . basename($image);
        move_uploaded_file($tmp_name, $upload_path);
        $insert = mysqli_query($connect,"INSERT INTO user (name,flatno, mobile, description,password,photo,role,status,votes)VALUES ('$name','$flatno','$mobile', '$description', '$password', '$image', '$role', 0,0)");
        if($insert)
        {
            echo '
            <script>
            alert("Registration successful");
            window.location.href = "/pr/home.php";
            </script>';
        }
        else
        {
            echo '
            <script>
            alert("Registration failed");
            window.location.href = "../routes/register.html";
            </script>';
        }
    }
    else{
        echo '
        <script>
        alert("password and confirm password mismatch");
        window.location.href = "../routes/register.html";
</script>
        ';

    }

?>
