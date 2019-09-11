<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Administrator</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript">
    function sureToApprove(id) {
        if (confirm("Da li ste sigurni da zelite da izbrišete poruku?")) {
            window.location.href = 'delete_msg.php?id=' + id;
        }
    }
    function changeStatus(id){
         if(confirm("Promeni u pročitano?")){
                window.location.href = 'changeStatus.php?id=' +id;
         }
    }
    function sendMessage(id){
        if(!id){
            window.alert("Izaberite poruku kojoj šaljete odgovor");
        } else {
            window.location.href = 'sendMessage.php?id=' +id;
        }
    }
    </script>
</head>

<body>

    <div id="header">
        <div class="shell">

            <?php
include 'menu.php';
?>
        </div>
    </div>

    <div id="container">
        <div class="shell">

            <div class="small-nav">
                <a href="index.php">Komandna tabla</a>
                <span>&gt;</span>
                Poruke klijenata
            </div>

            <br />

            <div id="main">
                <div class="cl">&nbsp;</div>

                <div id="content">

                    <div class="box">
                        <div class="box-head">
                            <h2 class="left">Poruke klijenata</h2>
                            <div class="right">
                                <input type="text" class="field small-field" />
                                <input type="submit" class="button" value="pretraga" />
                            </div>
                        </div>

                        <div class="table">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th>Poruka</th>
                                    <th>Vreme</th>
                                    <th>Status</th>
                                    <th width="150" class="ac">Kontrole</th>
                                </tr>
                                <?php
include '../includes/config.php';
$select = "SELECT * FROM message";
$result = $conn->query($select);
while ($row = $result->fetch_assoc()) {
    ?>                         <form action="sendReply.php" method="POST">
                                <tr>
                                    <td>
                                       <?php echo $row['message'] ?>
                                    </td>
                                    <td style="text-align:center;"><?php echo $row['time']?></td>
                                    <td style="text-align:center;"><?php echo $row['status']?></td>
                                    <td style="text-align:center;">
                                 <a href="javascript:sureToApprove(<?php echo $row['msg_id']; ?>)"
                                            class="ico del">Obriši</a>
                                <a href="javascript:changeStatus(<?php echo $row['msg_id']; ?>)" class="ico edit">Označi</a></br>
                            <a href="javascript:sendMessage(<?php echo $row['msg_id'];?>)" class="add-button"><span>Pošalji odgovor</span></a>
                            <div class="cl">&nbsp;</div>
                                    </td>
                                </tr>
                            </form>
                                <?php
}
?>
                            </table>

                        </div>
                        <br><h2><input type="submit" onclick="window.print()" value="Štampaj" /></h2>

                    </div>

                </div>

                <div class="cl">&nbsp;</div>
            </div>
        </div>
    </div>
    <div id="footer">
        <div class="shell">
            <span class="left">&copy; <?php echo date("Y"); ?></span>
            <span class="right">
                </a>
            </span>
        </div>
    </div>
</body>

</html>
