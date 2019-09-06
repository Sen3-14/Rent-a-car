<?php
require 'config.php';
if (isset($_POST['log'])) {
    $usr = $_POST['eMail'];
    $pass = $_POST['pwd'];

    if (empty($usr) || empty($pass)) {
      echo "<script type = \"text/javascript\">
      alert(\"Morate popuniti sva polja.\");
      window.location = (\"../account.php\")
      </script>";
        exit();
    } else {
        $sql = "SELECT * FROM client WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<script type = \"text/javascript\">
          alert(\"Greška pri konekciji.\");
          window.location = (\"../account.php\")
          </script>";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $usr);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($pass, $row['passw']);
                if ($pwdCheck == false) {
                  echo "<script type = \"text/javascript\">
                  alert(\"Uneli ste pogrešnu lozinku.\");
                  window.location = (\"../account.php\")
                  </script>";
                    exit();
                } else if ($pwdCheck == 1) {
                    session_start();
                    $_SESSION['user'] = $row['email'];
                    $_SESSION['uid'] = $row['client_id'];
                    $_SESSION["status"] = true;
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    echo "<script type = \"text/javascript\">
                    alert(\"Uspešno ste se prijavili.\");
                    window.location = (\"../index.php\")
                    </script>";
                    exit();
                }
            } else {
              echo "<script type = \"text/javascript\">
              alert(\"Neispravna e-mail adresa ili lozinka. Molimo pokušajte ponovo.\");
              window.location = (\"../account.php\")
              </script>";
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
