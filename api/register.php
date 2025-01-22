<?php 
include("connect.php");

// Check if all required POST and FILES fields are set


    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];

    // Validate password match
    if($password === $cpassword) {
        // Move uploaded file
        $upload_path = "../uploads/" . basename($image);
        move_uploaded_file($tmp_name, $upload_path);
        $insert = mysqli_query($connect,"INSERT INTO user (name, mobile, address,password,photo,role,status,votes)VALUES ('$name','$mobile', '$address', '$password', '$image', '$role', 0,0)");
        if($insert)
        {
            echo '
            <script>
            alert("Registration successful");
            window.location.href = "../";
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
