<?php
  require_once 'includes/config.php';
if (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $message =$_POST['subject'];

    if (empty($fname) || empty($lname) || empty($email) || empty($message)) {
        header("Location: contact.php?error=emptyFields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $fname) || !preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        header("Location: contact.php?error=invalidCharacters");
        exit();
    }
    
    $toAdmin = "From:".$fname." ".$lname."\n subject: ".$message;

    $qry = "INSERT INTO message (message,client_id,status,time) VALUES ('$toAdmin','$email','Unread',NOW())";
    $result = $conn->query($qry);

    if($result){
    header("Location: contact.php?messageSent=true");
    exit();
}
} else {
    header("Location: index.php");
    exit();
}