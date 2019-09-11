<?php
if (isset($_POST['signup-submit'])) {
    require 'config.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pwd'];
    $passRepeat = $_POST['pwd-repeat'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $loc = $_POST['location'];

    if (empty($fname) || empty($lname) || empty($pass) || empty($gender) || empty($email) || empty($phone) || empty($loc) || empty($passRepeat)) {
      echo "<script type = \"text/javascript\">
      alert(\"Molimo popunite sva polja.\");
      window.location = (\"../signup.php\")
      </script>";
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
      echo "<script type = \"text/javascript\">
      alert(\"Vaše ime i e-mail nisu validni.\");
      window.location = (\"../signup.php\")
      </script>";
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "<script type = \"text/javascript\">
      alert(\"Molimo unesite ispravnu e-mail adresu.\");
      window.location = (\"../signup.php\")
      </script>";
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $fname)) {
      echo "<script type = \"text/javascript\">
      alert(\"Vaše ime sadrži ilegalne karaktere.\");
      window.location = (\"../signup.php\")
      </script>";
        exit();
      } else if (!preg_match("/^[a-zA-Z0-9]*$/", $lname)) {
          echo "<script type = \"text/javascript\">
          alert(\"Vaše prezime sadrži ilegalne karaktere.\");
          window.location = (\"../signup.php\")
          </script>";
            exit();
    } else if ($pass !== $passRepeat) {
      echo "<script type = \"text/javascript\">
      alert(\"Potvrda lozinke nije ispravna.\");
      window.location = (\"../signup.php\")
      </script>";
        exit();
    } else {
        $sql = "SELECT email FROM client WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo "<script type = \"text/javascript\">
          alert(\"Greška pri konekciji.\");
          window.location = (\"../signup.php\")
          </script>";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $fname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
              echo "<script type = \"text/javascript\">
              alert(\"E-mail adresa je zauzeta.\");
              window.location = (\"../signup.php\")
              </script>";
                exit();
            } else {
                $sql = "INSERT INTO client (fname,lname,email,passw,phone,locat,gender) VALUES (?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "<script type = \"text/javascript\">
                  alert(\"Greška pri konekciji.\");
                  window.location = (\"../signup.php\")
                  </script>";
                    exit();
                } else {
                    $hashedPwd = password_hash($pass, PASSWORD_BCRYPT);
                    mysqli_stmt_bind_param($stmt, "sssiss", $fname, $lname, $email, $hashedPwd, $phone, $loc, $gender);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    echo "<script type = \"text/javascript\">
                    alert(\"Uspešno ste se registrovali. Prijavite se da bi ste nastavili.\");
                    window.location = (\"../account.php\")
                    </script>";
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    exit();
                }
            }
        }
    }
} else {
  echo "<script type = \"text/javascript\">
  alert(\"Dogodila se greška.\");
  window.location = (\"../signup.php\")
  </script>";
    exit();
}
