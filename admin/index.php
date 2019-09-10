<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Administrator</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript">
    function sureToApprove(id) {
        if (confirm("Da li ste sigurni da zelite da izbrisete poruku?")) {
            window.location.href = 'delete_msg.php?id=' + id;
        }
    }
    function changeStatus(id){
         if(confirm("Promeni u procitano?")){
                window.location.href = 'changeStatus.php?id=' +id;
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
                                <label>search messages</label>
                                <input type="text" class="field small-field" />
                                <input type="submit" class="button" value="search" />
                            </div>
                        </div>

                        <div class="table">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="13"><input type="checkbox" class="checkbox" /></th>
                                    <th>Poruka</th>
                                    <th>Vreme</th>
                                    <th>Status</th>
                                    <th width="110" class="ac">Kontrole</th>
                                </tr>
                                <?php
include '../includes/config.php';
$select = "SELECT * FROM message";
$result = $conn->query($select);
while ($row = $result->fetch_assoc()) {
    ?>                         <form action="" method="POST">
                                <tr>
                                    <td><input type="checkbox" class="checkbox" /></td>
                                    <td>
                                       <?php echo $row['message'] ?>
                                    </td>
                                    <td width="150"><?php echo $row['time']?></td>
                                    <td><?php echo $row['status']?></td>
                                    <td>
                                 <a href="javascript:sureToApprove(<?php echo $row['msg_id']; ?>)"
                                            class="ico del">Obrisi</a>
                                <a href="javascript:changeStatus(<?php echo $row['msg_id']; ?>)" class="ico edit">Oznaci</a>
                                    </td>
                                </tr>
                            </form>
                                <?php
}
?>
                            </table>

                        </div>
                        <h2><input type="submit" onclick="window.print()" value="Print Here" /></h2>

                    </div>

                </div>

                <div id="sidebar">

                    <div class="box">

                        <div class="box-head">
                            <h2>Management</h2>
                        </div>

                        <div class="box-content">
                            <a href="#" class="add-button"><span>Posalji odgovor</span></a>
                            <div class="cl">&nbsp;</div>

                            <p class="select-all"><input type="checkbox" class="checkbox" /><label>selektuj sve</label>
                            </p>
                            <p><a href="#">Obrisi selektovano</a></p>


                        </div>
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