<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
		$query = "DELETE FROM message WHERE msg_id = '$id'";
	$result = $conn->query($query);
	if($result === TRUE){
		echo "<script type = \"text/javascript\">
					alert(\"Poruka je uspešno obrisana.\");
					window.location = (\"index.php\")
				</script>";
	}
?>
