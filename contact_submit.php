<?php
  require_once 'includes/config.php';
if (isset($_POST['submit'])) {

    $fname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lastname']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $message = mysqli_real_escape_string($conn,$_POST['subject']); 
    
    if (empty($fname) || empty($lname) || empty($email) || empty($message)) {
        header("Location: contact.php?error=emptyFields");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/", $fname) || !preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
        header("Location: contact.php?error=invalidCharacters");
        exit();
    }
    
    $toAdmin = "From:".$fname." ".$lname."\n subject: ".$message;

    $qry = "INSERT INTO message (message,client_id,status,flag,time) VALUES ('$toAdmin','$email','Unread',1,NOW())";
    $result = $conn->query($qry);

    if($result){
    header("Location: contact.php?messageSent=true");
    exit();
}
} else {
    header("Location: index.php");
    exit();
}