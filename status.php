<!DOCTYPE html>
<html lang="en">

<head>
    <title>Status</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <style type="text/css">
    .status {
        font-size: 20px;
    }
    </style>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>

<body>

    <section class="">
        <?php
include 'header.php';
?>

        <section class="caption">
            <i>
                <h2 class="caption" style="text-align: center">Pronađite auto po želji!</h2>
            </i>
            <h3 class="properties" style="text-align: center">Range Rover - Mercedes Benz - Landcruiser</h3>
        </section>
    </section>
    </section>


    <section class="listings">
        <div class="wrapper">
            <h2 style="text-decoration:underline">Status vaše rezervacije:</h2>
            <ul class="properties_list">
                <?php
include 'includes/config.php';
if (!isset($_SESSION['status'])) {
    header("Location: ../index.php");
    exit();
}
$sel = "SELECT * FROM client WHERE email = '$_SESSION[user]'";
$rs = $conn->query($sel);
$rws = $rs->fetch_assoc();
?>
                <li>
                    <h2"><span style="font-size:25px; color: #FF0000">Status:</span> <span style="color:#003333;
						font-weight: bold; font-size: 25px;"><?php echo $rws['status']; ?></span></h2>
                </li>
            </ul>
        </div>
    </section>
    <?php
require_once 'footer.php';?>
</body>

</html>