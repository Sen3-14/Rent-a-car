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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

    <section class="">
        <?php
include 'header.php';
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
                <?php
include 'includes/config.php';
if (!isset($_SESSION['status'])) {
    ?>
                <p class="terms"> Da bi ste iznajmili vozilo morate biti prijavljeni. Možete se prijaviti klikom na
                    sledeći <a href="account.php" style="text-decoration:underline; color:green;"> link. </a> </p>
                <p class="terms"> Registraciju možete izvršiti <a href="signup.php"
                        style="text-decoration:underline; color: red;"> ovde. </a> </p> <?php
exit();
}
$sel = "SELECT * FROM cars WHERE car_id = '$_GET[id]'";
$rs = $conn->query($sel);
$rws = $rs->fetch_assoc();
?>
                <li>
                    <a href="book_car.php?id=<?php echo $rws['car_id'] ?>">
                        <img class="thumb" src="cars/<?php echo $rws['image']; ?>" width="300" height="200">
                    </a>
                    <span class="price"><?php echo 'RSD.' . $rws['hire_cost']; ?></span>
                    <div class="property_details">
                        <h1>
                            <a
                                href="book_car.php?id=<?php echo $rws['car_id'] ?>"><?php echo 'Ime automobila>' . $rws['car_name']; ?></a>
                        </h1>
                        <h2>Model: <span class="property_size"><?php echo $rws['car_type']; ?></span></h2>
                    </div>
                </li>
                <h3>Model automobila : <?php echo $rws['car_name']; ?>. </h3>
                <?php
if (isset($_SESSION['status'])) {
    ?>
                <br> <a href="pay.php?id=<?php echo $rws['car_id'] ?>" class="loginbutton1"
                    style="text-decoration:none;">Zakažite ovde</a>

                <?php
}
?>

            </ul>
        </div>
    </section>

    <?php
require_once 'footer.php';
?>

</body>

</html>