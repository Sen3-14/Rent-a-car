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
if (!isset($_SESSION['status'])) {
    echo "Da bi ste iznajmili vozilo morate imati korisnički nalog. Registraciju možete izvršiti <a href='signup.php' style='text-decoration:underline; color: red;'> ovde </a>.";
    exit();
}
$_SESSION['the_car'] = $_GET['id'];
?>

        <section class="caption">
            <h2 class="caption" style="text-align: center"><i>Iznajmite auto iz snova!</i></h2>
            <h3 class="properties" style="text-align: center">Mercedes Benz - Toyota - Range Rover</h3>
        </section>
    </section>
    <section class="listings">
        <div class="wrapper">
            <ul class="properties_list">
                <h3>Informacije plaćanja:</h3>
                <form action="includes/pay_sc.php" method="post">
                    <table>
                        <tr>
                            <td>Broj računa:</td>
                            <td><input type="text" name="mpesa" class="loginform" required></td>
                        </tr>
                        <tr>
                            <td>Lozinka profila:</td>
                            <td><input type="password" name="pwd" class="loginform" required></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align:right"><input type="submit" name="pay" value="Potvrdi"
                                    class="loginbutton1"></td>
                        </tr>
                    </table>
                </form>

                <section class="listings">
                    <div class="wrapper">
                        <ul class="properties_list">
                            <?php
include 'includes/config.php';

$sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
$rs = $conn->query($sel);
$rws = $rs->fetch_assoc();
?>
                            <li>
                                <img class="thumb" src="cars/<?php echo $rws['image']; ?>" width="300" height="200">

                                <span class="price"><?php echo 'RSD.' . $rws['hire_cost']; ?></span>
                                <div class="property_details">
                                    <h1>
                                        <a
                                            href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo 'Ime automobila>' . $rws['car_name']; ?></a>
                                    </h1>
                                    <h2>Model: <span class="property_size"><?php echo $rws['car_type']; ?></span></h2>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>

            </ul>
            <div class="more_listing" style="margin-top:1%;">
                <p class="more_listing_btn">Po uspešnoj transakciji sajt ne zadrzava informacije korisnika o tipu
                    kreditne kartice, broju računa i PIN koda. </p>
            </div>
        </div>
    </section>





    <?php
require_once 'footer.php';
?>

</body>

</html>