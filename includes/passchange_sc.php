<?php
session_start();
if (isset($_POST['pass-submit'])) {
    require 'config.php';
    $oldpass = $_POST['oldpwd'];
    $newpass = $_POST['newpwd'];
    $hashedPwd = $_SESSION['sepass'];
    $usermail = $_SESSION['user'];
    $newpassrep = $_POST['newpwd-repeat'];

    if (empty($oldpass) || empty($newpass) || empty($newpassrep)) {
      echo "<script type = \"text/javascript\">
      alert(\"Morate popuniti sva polja.\");
      window.location = (\"../passchange.php\")
      </script>";
        exit();
    } else {
          $pwdCheck = password_verify($oldpass, $hashedPwd);
          if ($pwdCheck == false) {
          echo "<script type = \"text/javascript\">
          alert(\"Pogrešna lozinka.\");
          window.location = (\"../passchange.php\")
          </script>";
            exit();
          } else if ($newpass !== $newpassrep){
            echo "<script type = \"text/javascript\">
            alert(\"Potvrda nove lozinke nije ispravna.\");
            window.location = (\"../passchange.php\")
            </script>";
              exit();
          } else {
            $hPwd = password_hash($newpass, PASSWORD_DEFAULT);
            $sql = "UPDATE client SET passw='$hPwd' WHERE email='$usermail';";
            $query = $conn->prepare($sql);
            $query->execute();
            echo "<script type = \"text/javascript\">
            alert(\"Uspešno ste promenili lozinku.\");
            window.location = (\"../index.php\")
            </script>";
              exit();
          }
       }

}
?>
