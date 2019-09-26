<?php
$host = "localhost";
$user = "root";
$pass = "12345";
$db = "cars";

date_default_timezone_set('Europe/Belgrade');
$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo "Failed:" . $conn->connect_error;
    die();
}
