<!DOCTYPE html>
<html lang="en">

<head>
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
require 'header.php';
?>

        <section class="caption">
            <i>
                <h2 class="caption" style="text-align: center">Pronađite auto po želji!</h2>
            </i>
            <h3 class="properties" style="text-align: center">Range Rover - Mercedes Benz - Landcruiser</h3>
        </section>
    </section>

    <section class="listings" style="margin-top:-3%;">
        <div class="wrapper">

            <h3>Izmenite svoje podatke:</h3>
            <form action="includes/information_sc.php" method="post">
                <input type="text" name="fname" placeholder="Promeni Ime..." class="loginform">
                <input type="text" name="lname" placeholder="Promeni Prezime..." class="loginform">
                <input type="email" name="email" placeholder="Promeni E-mail..." class="loginform">
                <input type="password" name="pwd" placeholder="Lozinka..." class="loginform">
                <button type="submit" name="information-submit" class="loginbutton1">Izmeni podatke</button>
                <a href="passchange.php" class="loginbutton2">Promeni lozinku</a>
            </form>
        </div>
    </section>

    <?php require 'footer.php';?>

</body>

</html>
