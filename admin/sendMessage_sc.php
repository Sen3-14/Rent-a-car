<?php
  require '../includes/config.php';

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
         mail($mailTo,"Rent-a-car team",$mesg);
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
     }
   }
 } else {
      header("Location: index.php");
      exit();
  }

?>
