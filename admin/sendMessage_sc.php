<?php
  require '../includes/config.php';
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require '../phpmail/src/Exception.php';
  require '../phpmail/src/PHPMailer.php';
  require '../phpmail/src/SMTP.php';

  if(isset($_POST['send'])){
    session_start();
     $mailTo = $_SESSION['SENDTO'];
     $mesg = $_POST['reply'];
     if(empty($mesg)){
        echo "<script type = \"text/javascript\">
      alert(\"Prazno polje.\");
      window.location = (\"sendMessage.php\")
      </script>";
        exit();
     } else {
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
      $mail->Subject = 'Admin tim Rent-a-car';
      $mail->Body = $mesg;
      $mail->AddAddress($mailTo);
      $mail->Send();
         $id = $_SESSION['mailid'];
         $qry = "SELECT * FROM message WHERE msg_id = '$id'";
         $rslt = $conn->query($qry);
         $row = mysqli_fetch_assoc($rslt);
         if($row['status'] == 'Unread'){
        $query = "UPDATE message SET status = 'Read' WHERE msg_id = '$id'";
        $result = $conn->query($query);
        if($result === FALSE){
            echo "Sql greška";
        }
         mysqli_close($conn);
         unset($_SESSION['SENDTO']);
         unset($_SESSION['mailid']);
         echo "<script type = \"text/javascript\">
      alert(\"Poruka poslata.\");
      window.location = (\"index.php\")
      </script>";
        exit();
     } else {
      mysqli_close($conn);
      unset($_SESSION['SENDTO']);
      unset($_SESSION['mailid']);
      echo "<script type = \"text/javascript\">
   alert(\"Poruka poslata.\");
   window.location = (\"index.php\")
   </script>";
     exit();
     }
   }
 } else {
      header("Location: index.php");
      exit();
  }

?>
