<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmail/src/Exception.php';
  require 'phpmail/src/PHPMailer.php';
  require 'phpmail/src/SMTP.php';
if(isset($_POST['submit'])){
    
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    
    $url = "localhost/Rent-a-car/create-new-password.php?selector=". $selector . "&validator=" . bin2hex($token);
    $expires = date("U") + 1800;

    require 'includes/config.php';

    $userEmail = $_POST['email'];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "ERROR1";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,"s",$userEmail);
        mysqli_stmt_execute($stmt);
    } 
    
    $sql = "INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken,pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "ERROR2";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$userEmail,$selector,$hashedToken,$expires);
        mysqli_stmt_execute($stmt);
    } 

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    //
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = '465';
    $mail->isHTML();
    $mail->Username = 'dulee797@gmail.com';
    $mail->Password = '';
    $mail->SetFrom('dulee797@gmail.com');
    $mail->Subject = 'Resetovanje lozinke za Rent-a-car.com';
    $message = "<p>Dobili smo vas zahtev za resetovanje lozinke. Kliknite na link da bi nastavili proces. Ako niste zatrazili 
    resetovanje lozinke, mozete da ignorisete ovaj e-mail.</p>";
    $message .= 'Kopirajte ovaj link u browser -> '.$url;
    $mail->Body = $message;
    $mail->AddAddress($userEmail);
    $mail->Send();
    //
    $to = $userEmail;
    $subject = "Resetovanje lozinke za Rent-a-car.com";
    
    header("Location: index.php");

} else {
    header("Location: index.php");
    exit();
}