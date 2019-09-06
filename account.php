<?php
require 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Car Rental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>

    <section class="">
        <section class="caption" style="margin-top:3%;">
            <h2 class="caption" style="text-align: center">Registrujte se radi dobijanja svih privilegija.</h2>
        </section>
    </section>

  

    <section class="search" style="background-color: #fff; margin-top:3%;">
        <div class="wrapper">
            <div id="form">
                <form action="includes/login_sc.php" method="POST" style="height:400px;">
                    <input type="text" name="eMail" placeholder="Unesite E-mail..." class="loginform" required>
                    <input type="password" name="pwd" placeholder="Unesite lozinku..." class="loginform" required>
                    <button type="submit" name="log" class="loginbutton1">Prijavite se</button>
                    <a href="signup.php" class="loginbutton2">Novi nalog</a>
    </section>

    <?php
require_once 'footer.php';
?>

</body>

</html>
