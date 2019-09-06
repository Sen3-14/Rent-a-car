<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>
    <?php require_once 'header.php';?>

    <section class="listings">
        <div class="wrapper">
            <ul class="properties_list">
                <?php
include 'includes/config.php';
$sel = "SELECT * FROM cars WHERE status = 'Available'";
$rs = $conn->query($sel);
while ($rws = $rs->fetch_assoc()) {
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
                <?php
}
?>
            </ul>
        </div>
    </section>

    <?php require_once 'footer.php';?>
</body>

</html>