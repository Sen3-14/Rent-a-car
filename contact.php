<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kontakt</title>
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
        <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
        </style>
        </head>

        <body>
            <br><br>
            <h3 style="margin-left:1%;">Kontaktirajte nas</h3>

            <div class="container">
                <?php
if (isset($_GET['error'])) {
    if ($_GET['error'] == "emptyFields") {echo "<script type='text/javascript'>alert('Imate prazna polja!');</script>";} else if ($_GET['error'] == "invalidCharacters") {echo "<script type='text/javascript'>alert('Imate ilegalne karaktere');</script>";}
}
if (isset($_GET['messageSent'])) {
    if ($_GET['messageSent'] == "true") {echo "<script type='text/javascript'>alert('Poruka je uspešno poslata');</script>";}
}
?>
                <form action="contact_submit.php" method="POST">
                    <label for="fname">Ime</label>
                    <input type="text" id="fname" name="firstname" placeholder="Vaše ime..">

                    <label for="lname">Prezime</label>
                    <input type="text" id="lname" name="lastname" placeholder="Vaše prezime..">

                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Vaš e-mail..">


                    <label for="subject">Poruka</label>
                    <textarea id="subject" name="subject" placeholder="Vaša poruka.." style="height:200px"></textarea>

                    <input type="submit" value="Pošalji" name="submit" style="letter-spacing:1px;">
                </form>
            </div>
            <?php
        require_once 'footer.php';
        ?>
