<?php
	session_start();
      if(isset($_SESSION['status-admin']) == 1){
?>
<div id="top">
			<h1><a href="#">Administrator</a></h1>
			<div id="top-navigation">
				Zdravo
			<a href="#"><strong><?php echo $_SESSION['user']; ?></strong></a>
				<span>|</span>
				<a href="logout.php">Odjavi se</a>
			</div>
		</div>
<div id="navigation">
			<ul>
			    <li><a href="add_vehicles.php"><span>Upravljanje vozilima</span></a></li>
			    <li><a href="client_requests.php"><span>Zahtevi za zakazivanje</span></a></li>
				<li><a href="index.php"><span>Poruke</span></a></li>
				<li><a href="guess_msg.php"><span>Poruke gostiju</span></a></li>
				<li><a href="clients.php"><span>Klijenti</span></a></li>
				<li><a href="hired.php"><span>Iznajmljena vozila</span></a></li>
			</ul>
		</div>
<?php
} else {
	header("Location: ../index.php");
	exit();
}
?>
