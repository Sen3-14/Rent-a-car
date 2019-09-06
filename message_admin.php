<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <style type="text/css">
    .status {
        font-size: 20px;
    }

    .txt {
        width: 600px;
        height: 200px;
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


    <section class="listings">
        <div class="wrapper">
            <h2 style="text-decoration:underline">Kontaktirajte administratora:</h2>
            <ul class="properties_list">
                <form action="includes/message_sc.php" method="post">
                    <table>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="message" placeholder="Unesite svoju poruku" class="txt"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="send" value="Pošaljite poruku" class="loginbutton1">
                            </td>
                        </tr>
                    </table>
                </form>

            </ul>
        </div>
    </section>

    <?php require_once 'footer.php';?>

</body>

</html>