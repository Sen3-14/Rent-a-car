<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
		$query = "DELETE FROM cars WHERE car_id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Vozilo je uspešno izbrisano.\");
					window.location = (\"add_vehicles.php\")
				</script>";
	}
?>
