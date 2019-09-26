<?php

if(isset($_POST['submit'])){
   $selector = $_POST['selector'];
   $validator = $_POST['validator'];
   $password = $_POST['pwd'];
   $password_repeat = $_POST['pwd-repeat'];

   if(empty($selector) || empty($validator) || empty($password) || empty($password_repeat)){
            echo "PRAZNA POLJA";
            exit();
    } else if ($password != $password_repeat){
      header("Location: create-new-password.php");
      echo "Lozinke se ne poklapaju";
      exit();
    }

    $currentDate = date("U");
    require 'includes/config.php';

    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires>=?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "Sql error";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,"ss",$selector,$currentDate);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        if(!$row = mysqli_fetch_assoc($result)){
           echo "Morate da ponovite postupak, sql greska";
           exit();
        } else {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin,$row["pwdResetToken"]);
            if($tokenCheck === false){
                echo "Losi tokeni";
                exit();
            } else if($tokenCheck === true){
                 $tokenEmail = $row["pwdResetEmail"];
                 $sql = "SELECT * FROM client WHERE email=?;";
                 $stmt = mysqli_stmt_init($conn);
                      if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "Sql error";
                        exit();
                      } else {
                            mysqli_stmt_bind_param($stmt,"s",$tokenEmail);
                            mysqli_stmt_execute($stmt);
                                   $result = mysqli_stmt_get_result($stmt);
                                    if(!$row = mysqli_fetch_assoc($result)){
                                          echo "error";
                                          exit();
                                    } else {
                                        $sql = "UPDATE client SET passw=? WHERE email=?;";
                                        $stmt = mysqli_stmt_init($conn);
                                                if(!mysqli_stmt_prepare($stmt,$sql)){
                                                       echo "Sql error";
                                                              exit();
                                                 } else {
                                                     $newPassHash = password_hash($password, PASSWORD_DEFAULT);
                                                      mysqli_stmt_bind_param($stmt,"ss",$newPassHash,$tokenEmail);
                                                      mysqli_stmt_execute($stmt);
                                                      
                                                      $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=$tokenEmail;";
                                                      $query = $conn->query($sql);
                                                      echo "<script type = \"text/javascript\">
                                                      alert(\"Uspesno promenjena lozinka.\");
                                                      window.location = (\"account.php\")
                                                      </script>";
                                                        exit();
                                                            
                                                    }
                                    }
                        }
        }
    }
}
} else {
   header("Location: index.php");
   exit();
}