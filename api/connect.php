<?php

$connect = mysqli_connect("localhost","root","","vote") or die("connect failed");

if($connect)
{
    echo "Connected successfully";
}
else
{
    echo "Failed to connect";
}
?>