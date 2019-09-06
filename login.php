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
        <?php
include 'header.php';
?>

        <section class="caption" style="margin-top:3%;">
            <i>
                <h2 class="caption" style="text-align: center">Pronađite auto po želji!</h2>
            </i>
            <h3 class="properties" style="text-align: center">Range Rover - Mercedes Benz - Landcruiser</h3>
        </section>
    </section>


    <section class="search" style="background-color: #fff; margin-top:3%;">
        <div class="wrapper">
            <div id="form">
                <form action="includes/login_admin.php" method="post" style="height:400px;">
                    <h3 style="text-align:center; color: #000099; font-weight:bold; text-decoration:underline">Prijavite
                        se kao Administrator</h3>
                    <input type="text" name="uname" placeholder="Korisničko ime" class="loginform" required>
                    <input type="password" name="pass" placeholder="Lozinka" class="loginform" required>
                    <input type="submit" name="login-submit" value="Prijavite se" class="loginbutton1">
                </form>

    </section>

    <?php require_once 'footer.php';?>

</body>

</html>