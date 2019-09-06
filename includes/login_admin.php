<?php
require 'config.php';
if (isset($_POST['login-submit'])) {
    $usr = $conn->real_escape_string($_POST['uname']);
    $pass = $conn->real_escape_string($_POST['pass']);

    if (empty($usr) || empty($pass)) {
      echo "<script type = \"text/javascript\">
      alert(\"Molimo popunite sva polja.\");
      window.location = (\"../login.php\")
      </script>";
        exit();
    } else {
        $sql = "SELECT * FROM admin WHERE uname=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<script type = \"text/javascript\">
          alert(\"Greška pri konekciji.\");
          window.location = (\"../login.php\")
          </script>";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $usr);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($pass, $row['pass']);
                if ($pwdCheck == false) {
                  echo "<script type = \"text/javascript\">
                  alert(\"Uneli ste pogrešnu lozinku.\");
                  window.location = (\"../signup.php\")
                  </script>";
                    exit();
                } else if ($pwdCheck == 1) {
                    session_start();
                    $_SESSION['user'] = $row['uname'];
                    $_SESSION["status-admin"] = true;
                    header("Location: ../admin/index.php");
                    exit();
                }
            } else {
              echo "<script type = \"text/javascript\">
              alert(\"Neispravno korisničko ime ili lozinka.\");
              window.location = (\"../login.php\")
              </script>";
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
