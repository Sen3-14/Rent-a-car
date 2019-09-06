<?php
if (isset($_POST['send'])) {
    session_start();
    require 'config.php';
    $usr = $_SESSION['user'];
    $msg = $_POST['message'];

    $qry = "INSERT INTO message (message,client_id,status,time) VALUES ('$msg','$usr','Unread',NOW())";
    $result = $conn->query($qry);
    if ($result == true) {
        echo "<script type = \"text/javascript\">
              alert(\"Poruka je uspešno poslata.\");
              window.location = (\"../index.php\")
              </script>";
    } else {
        echo "<script type = \"text/javascript\">
              alert(\"Poruka nije poslata. Molimo pokušajte ponovo.\");
              window.location = (\"../index.php\")
              </script>";
    }
} else {
    header("Location: ../index.php");
    exit();
}
