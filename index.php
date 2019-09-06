<?php
require 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rent-a-car</title>
    <meta charset="utf-8">
    <meta name="author" content="Dusan Ilic-Jovan Jovancic">
    <meta name="description" content="Rent-a-car site" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</head>

<body>

    <section class="">
        <section class="caption">
            <h2 class="caption" style="text-align: center; text-shadow: 0.5px 2px silver;"><i>Pronađite auto po
                    želji!</i></h2> <br>
            <h3 class="properties" style="text-align: center">Mercedes Benz - Toyota - Range Rovers</h3>
        </section>
    </section>

    <div class="slideshow-container">
        <center>
            <div class="mySlides fade">
                <img src="cars/1.jpg" style="width:800px; height:500px; box-shadow:2px 2px 7px 7px silver;">
            </div>

            <div class="mySlides fade">
                <img src="cars/2.jpg" style="width:800px; height:500px; box-shadow:2px 2px 7px 7px silver;">
            </div>

            <div class="mySlides fade">
                <img src="cars/3.jpg" style="width:800px; height:500px; box-shadow:2px 2px 7px 7px silver;">
            </div>

            <div class="mySlides fade">
                <img src="cars/4.jpg" style="width:800px; height:500px; box-shadow:2px 2px 7px 7px silver;">
            </div>
        </center>
    </div>
    <br>

    <div style="text-align:center">
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>


    <?php
require_once 'footer.php';
?>

</body>

</html>