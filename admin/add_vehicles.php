<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Upravljanje vozilima</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript">
    function sureToApprove(id) {
        if (confirm("Izbrisati ovo vozilo?")) {
            window.location.href = 'delete_car.php?id=' + id;
        }
    }

    function toggle(source) {
  checkboxes = document.getElementsByName('cb');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
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
                Upravljanje vozilima
            </div>

            <br />

            <div id="main">
                <div class="cl">&nbsp;</div>

                <div id="content">

                    <div class="box">
                        <div class="box-head">
                            <h2 class="left">Vozila</h2>
                        </div>

                        <div class="table">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="overflow:scroll;text-align: center;">
                                <tr>
                                    <th>Tip vozila</th>
                                    <th>Ime vozila</th>
                                    <th>Cena</th>
                                    <th>Kapacitet</th>
                                    <th>Dostupnost</th>
                                    <th width="110" class="ac">Kontrole</th>
                                </tr>
                                <?php
include '../includes/config.php';
$select = "SELECT * FROM cars WHERE status = 'Available'";
$result = $conn->query($select);
while ($row = $result->fetch_assoc()) {
    ?>
                                <tr>
                                    <td>
                                        <h3><a href="#"><?php echo $row['car_type'] ?></a></h3>
                                    </td>
                                    <td><?php echo $row['car_name'] ?></td>
                                    <td><a href="#"><?php echo $row['hire_cost'] ?></a></td>
                                    <td><?php echo $row['capacity'] ?></td>
                                    <td><?php echo $row['availability'] ?></td>
                                    <td><a href="javascript:sureToApprove(<?php echo $row['car_id']; ?>)"
                                            class="ico del">Izbriši</a><a href="#" class="ico edit">Podesi</a></td>
                                </tr>
                                <?php
}
?>
                            </table>


                        </div>
                      <br> <h2><input type="submit" onclick="window.print()" value="Štampaj" /></h2>

                    </div>
                </div>

                <div id="sidebar">
                    <div class="box">
                        <div class="box-head">
                        </div>


                        <div class="box-content">
                            <a href="add_cars.php" class="add-button"><span>Dodaj novo vozilo</span></a>
                            <div class="cl">&nbsp;</div>
                        </div>
                    </div>

                </div>


                <div class="cl">&nbsp;</div>
            </div>

        </div>
    </div>


</body>

</html>
