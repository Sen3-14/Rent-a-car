<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	$car = $_REQUEST['car'];
	$query = "UPDATE client SET status = 'Approved' WHERE client_id = '$id'";
	$result = $conn->query($query);

	$qry = "SELECT * FROM client";
	$rslt = $conn->query($qry);
    $row = mysqli_fetch_assoc($rslt);


	$query1 = "UPDATE hire SET status = 'Approved' WHERE client = '$row[email]'";
	$result1 = $conn->query($query1);

		if($result == TRUE && $result1 == TRUE){
		$qr = "UPDATE cars SET availability=availability - 1 WHERE car_name='$car'";
		$query3 = $conn->prepare($qr);
		$query3->execute();
		echo "<script type = \"text/javascript\">
		alert(\"Status promenjen.\");
		window.location = (\"client_requests.php\")
		</script>";
	?>
		<meta content="4; client_requests.php" http-equiv="refresh" />
	<?php
	}
?>
