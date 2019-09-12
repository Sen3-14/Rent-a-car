<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Admin Home</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <script type="text/javascript">
    function sureToApprove(id) {
        if (confirm("Da li ste sigurni?")) {
            window.location.href = 'approve.php?id=' + id;
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
                Zahtevi klijenata
            </div>

            <br />

            <div id="main">
                <div class="cl">&nbsp;</div>

                <div id="content">

                    <div class="box">
                        <div class="box-head">
                            <h2 class="left">Zahtevi klijenta</h2>
                            <div class="right">
                                <input type="text" class="field small-field" />
                                <input type="submit" class="button" value="pretraga" />
                            </div>
                        </div>

                        <div class="table">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th width="13"><input type="checkbox" class="checkbox" /></th>
                                    <th>Ime klijenta</th>
                                    <th>Broj telefona</th>
                                    <th>Rezervisani auto</th>
                                    <th>Cena</th>
                                    <th>Status</th>
                                    <th>Mpesa</th>
                                    <th width="110" class="ac">Kontrole</th>
                                </tr>
                                <?php
								include '../includes/config.php';
								$select = "SELECT client.mpesa,client.client_id,client.fname,client.phone,cars.car_name,cars.hire_cost,client.status
										FROM client JOIN cars ON client.car_id=cars.car_id";
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
                                <tr>
                                    <td><input type="checkbox" class="checkbox" /></td>
                                    <td>
                                        <h3><a href="#"><?php echo $row['fname'] ?></a></h3>
                                    </td>
                                    <td>
                                        <h3><a href="#"><?php echo $row['phone'] ?></a></h3>
                                    </td>
                                    <td><?php echo $row['car_name'] ?></td>
                                    <td><?php echo $row['hire_cost'] ?></td>
                                    <td><?php echo $row['status'] ?></td>
                                    <td><?php echo $row['mpesa']?></td>
                                    <td><a href="javascript:sureToApprove(<?php echo $row['client_id'];?>)"
                                            class="ico edit">Odobri</a><a href="#" class="ico del">Izbriši</a></td>
                                </tr>
                                <?php
								}
							?>
                            </table>

                        </div>
                        <br> <h2><input type="submit" onclick="window.print()" value="Štampaj zahteve" /></h2>

                    </div>

                </div>

                <div class="cl">&nbsp;</div>
            </div>

        </div>
    </div>



    <div id="footer">
        <div class="shell">
            <span class="left">&copy; <?php echo date("Y");?></span>
            <span class="right">
                </a>
            </span>
        </div>
    </div>
</body>

</html>
