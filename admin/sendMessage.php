<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <style type="text/css">
    .status {
        font-size: 20px;
    }

    .txt {
        width: 600px;
        height: 200px;
    }
    </style>

</head>

<body>

    <div id="header">
      <div class="shell"> 
          <?php
include 'menu.php';
require '../includes/config.php';
$id = $_REQUEST['id'];

$query = "SELECT * from message WHERE msg_id = '$id'";
$result = $conn->query($query);
$row = mysqli_fetch_assoc($result);
$mail = $row['client_id'];
$Query = "SELECT * FROM client WHERE email = '$mail'";
$result2 = $conn->query($Query); 
$row2 = mysqli_fetch_assoc($result2);

session_start();
$_SESSION['SENDTO'] = $mail;
$_SESSION['mailid'] = $id;
?>
</div>
</div>

    <section class="listings">
        <div class="wrapper">
            <h2 style="color:black;">Vas odgovor za:<?php echo " " .$row2['fname'];?></h2>
            <ul class="properties_list">
                <form action="sendMessage_sc.php" method="post">
                    <table> 
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <h1 style="color: black;">Poruka:
                            <?php 
                                   echo $row['message'];
                            ?>
                            </h1>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="reply" placeholder="Unesite svoju poruku" class="txt"></textarea>
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

<?php 
    
?>

</body>

</html>