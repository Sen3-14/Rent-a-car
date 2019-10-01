<?php
	include '../includes/config.php';
    $id = $_REQUEST['id'];

    $qry1 = "SELECT * FROM client WHERE client_id = '$id'";
    $sql = $conn->query($qry1);
    $result = mysqli_fetch_assoc($sql);
		$vozilo = $result['car_id'];

		$qry4 = "SELECT * FROM cars WHERE car_id='$vozilo'";
		$sqlquery = $conn->query($qry4);
		$row = mysqli_fetch_assoc($sqlquery);
			$a=$row['availability'];
			if ($a == 0) {
				$qrr = "UPDATE cars SET status = 'Available'";
				$qrr1 = $conn->prepare($qrr1);
				$qrr1->execute();
			}
		$b = ++$a;
			$qr = "UPDATE cars SET availability = $b WHERE car_id='$vozilo'";
		$query4 = $conn->prepare($qr);
		$query4->execute();




    $qry2 = "UPDATE client SET status = NULL, car_id = NULL WHERE email = '$result[email]'";
    $sql2 = $conn->query($qry2);

    $qry3 = "DELETE FROM hire WHERE client = '$result[email]';";
    $sql3 = $conn->query($qry3);


    if($sql2 && $sql3 && $query4){
        echo "<script type = \"text/javascript\">
                        alert(\"Zahtev izbisan.\");
                        window.location = (\"hired.php\")
                    </script>";
                    exit();
    } else {
        echo "<script type = \"text/javascript\">
                        alert(\"Error.\");
                        window.location = (\"hired.php\")
                    </script>";
                    exit();
    }
