<?php

if(isset($_POST['submit'])){
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    
    $url = "localhost/Rent-a-car/create-new-password.php?selector=". $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;

    require 'includes/config.php';

    $userEmail = $_POST['email'];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "ERROR";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    } 
    
    $sql = "INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "ERROR";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    } 

    mysqli_stmt_close($stmt);
    mysqli_close();

    $to = $userEmail;
    $subject = "Resetovanje lozinke za Rent-a-car.com";
    $message = "<p>Dobili smo vas zahtev za resetovanje lozinke. Kliknite na link da bi nastavili proces. Ako niste zatrazili 
    resetovanje lozinke, mozete da ignorisete ovaj e-mail.</p>";
    $message .= '<p>Link: <a href="' .$url.'">' .$url.'</a></p>';

    $header = "From: Administrator <dulee797@gmail.com>\r\n";
    $header.= "Reply-To: dulee797@gmail.com\r\n";
    $header.= "Content-type: text/html\r\n";
    
    mail($to,$subject,$message,$header);
    header("Location: index.php");

} else {
    header("Location: index.php");
    exit();
}