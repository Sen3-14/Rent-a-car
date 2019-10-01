<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	$car = $_REQUEST['car'];
	$query = "UPDATE client SET status = 'Approved' WHERE client_id = '$id'";
	$result = $conn->query($query);

	$qry = "SELECT * FROM client";
	$rslt = $conn->query($qry);
    $row = mysqli_fetch_assoc($rslt);
    $mail = $row['email'];

	$query1 = "UPDATE hire SET status = 'Approved' WHERE client = '$mail'";
	$result1 = $conn->query($query1);
    
   	if($result == TRUE && $result1 == TRUE){
		$sql = "SELECT * FROM cars WHERE car_id='$car'";
		$sqlquery = $conn->query($sql);
		$row = mysqli_fetch_assoc($sqlquery);
	    $a=$row['availability'];
		$b = --$a;
		if($b == 0){
		$qr = "UPDATE cars SET availability = $b, status = 'unavailable' WHERE car_id='$car'";
		} else {
			$qr = "UPDATE cars SET availability = $b WHERE car_id='$car'";	
		}
		$query3 = $conn->prepare($qr);
		$query3->execute();
		if(!$query3) { echo "error 3";}
		echo "<script type = \"text/javascript\">
		alert(\"Status promenjen.\");
		window.location = (\"client_requests.php\")
		</script>";
?>
		<meta content="4; client_requests.php" http-equiv="refresh" />
	<?php
	} else {
		echo "error";
		exit();
	}
?>
