<?php
	session_start();
	session_destroy();
	echo "<script type = \"text/javascript\">
	alert(\"Uspešno ste se odjavili.\");
	window.location = (\"../index.php\")
	</script>";
	exit();
?>
