<?php
	include '../includes/config.php';
    $id = $_REQUEST['id'];

		$qry1 = "SELECT * FROM client WHERE client_id = '$id'";
    $sql = $conn->query($qry1);
    $result = mysqli_fetch_assoc($sql);
		$vozilo = $result['car_id'];
		if($vozilo !== NULL) {
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
		$query4->execute(); }

    $qry1 = "DELETE FROM client WHERE client_id = '$id'";
    $sql = $conn->query($qry1);

    if($sql){
        echo "<script type = \"text/javascript\">
                        alert(\"Klijent izbisan.\");
                        window.location = (\"clients.php\")
                    </script>";
                    exit();
    } else {
        exit();
    }
?>
