<?php
session_start();
if (isset($_POST['pay'])) {
    include 'config.php';
    $mpesa = $conn->real_escape_string($_POST["mpesa"]);
    $pass = $conn->real_escape_string($_POST["pwd"]);
    $car = $_SESSION['the_car'];
    $usr = $_SESSION['user'];
    $waiting = 'waiting';

    if (empty($mpesa) || empty($pass)) {
      echo "<script type = \"text/javascript\">
      alert(\"Molimo popunite sva polja.\");
      window.location = (\"../rent.php\")
      </script>";
        exit();
    } else {
        $sql = "SELECT * FROM client WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<script type = \"text/javascript\">
          alert(\"Greška pri konekciji.\");
          window.location = (\"../rent.php\")
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
                  window.location = (\"../rent.php\")
                  </script>";
                    exit();
                } else if ($pwdCheck == 1) {

                    $qry1 = "UPDATE client SET mpesa = '$mpesa', car_id = '$car', status = 'waiting' WHERE email = '$usr';";
                    $result1 = $conn->query($qry1);
                    $qry2 = "INSERT INTO hire (client,car_id,status) VALUES ('$usr','$car','$waiting')";
                    $result2 = $conn->query($qry2);
                    if ($result1 == true && $result2 == true) {
                        echo "<script type = \"text/javascript\">
                             alert(\"Zakazivanje obavljeno uspešno. Uskoro ćemo Vas obavestiti o statusu zahteva.\");
                             window.location = (\"../index.php\")
                             </script>";

                        exit();
                    } else {
                        echo "<script type = \"text/javascript\">
                             alert(\"Greška pri zakazivanju, molimo Vas pokušajte ponovo.\");
                             window.location = (\"../rent.php\")
                             </script>";
                        exit();
                    }
                }
            }
        }
    }
} else {
    header("Location: ../book_car.php");
    exit();
}
