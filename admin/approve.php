<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
	$query = "UPDATE client SET status = 'Approved' WHERE client_id = '$id'";
	$result = $conn->query($query);
	
	$qry = "SELECT * FROM client";
	$rslt = $conn->query($qry);
    $row = mysqli_fetch_assoc($rslt);
	

	$query1 = "UPDATE hire SET status = 'Approved' WHERE client = '$row[email]'";
	$result1 = $conn->query($query1);

		if($result == TRUE && $result1 == TRUE){
		echo "<script type = \"text/javascript\">
		alert(\"Status promenjen.\");
		window.location = (\"client_requests.php\")
		</script>";
	?>
		<meta content="4; client_requests.php" http-equiv="refresh" />
	<?php
	}
?>
