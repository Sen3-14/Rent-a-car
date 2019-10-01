<?php
session_start();
if (isset($_POST['information-submit'])) {
    require 'config.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pwd'];
    $email = $_POST['email'];
    $hashedPwd = $_SESSION['sepass'];
    $usermail = $_SESSION['user'];

    if (empty($pass)) {
      echo "<script type = \"text/javascript\">
      alert(\"Morate uneti lozinku.\");
      window.location = (\"../information.php\")
      </script>";
        exit();
    } else {
          $pwdCheck = password_verify($pass, $hashedPwd);
          if ($pwdCheck == false) {
          echo "<script type = \"text/javascript\">
          alert(\"Pogrešna lozinka.\");
          window.location = (\"../information.php\")
          </script>";
            exit();
          } else {
            if (!empty($email)) {
              $sql = "SELECT * FROM client WHERE email='$email';";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              echo "<script type = \"text/javascript\">
              alert(\"E-mail adresa je zauzeta.\");
              window.location = (\"../information.php\")
              </script>";
            } else {
              $sql = "UPDATE client SET email='$email' WHERE email='$usermail';";
              $query = $conn->prepare($sql);
              $query->execute();
              }
            }
              if (!empty($fname)) {
                $sql = "UPDATE client SET fname='$fname' WHERE email='$usermail';";
                $query = $conn->prepare($sql);
                $query->execute();
              }
              if (!empty($lname)) {
                $sql = "UPDATE client SET lname='$lname' WHERE email='$usermail';";
                $query = $conn->prepare($sql);
                $query->execute();
              }

              echo "<script type = \"text/javascript\">
              alert(\"Uspešno ste izmenili podatke.\");
              window.location = (\"../index.php\")
              </script>";
          }
       }

}
?>
