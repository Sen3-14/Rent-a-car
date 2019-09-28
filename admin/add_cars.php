<?php
	include '../includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Dodaj vozilo</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
</head>
<body>
<div id="header">
	<div class="shell">

		<?php
			include 'menu.php';
		?>
		</div>
	</div>
</div>

<div id="container">
	<div class="shell">

		<div class="small-nav">
			<a href="index.php">Komandna tabla</a>
			<span>&gt;</span>
                 Dodaj novo vozilo
		</div>

		<br />

		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">

				<div class="box">
					<div class="box-head">
						<h2>Dodaj novo vozilo</h2>
					</div>

					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">
								<p>
									<span class="req">max 100 karaktera</span>
									<label>Ime vozila <span>(Obavezno polje)</span></label>
									<input type="text" class="field size1" name="car_name" required />
								</p>
								<p>
									<span class="req">max 20 karaktera</span>
									<label>Tip vozila <span>(Obavezno polje)</span></label>
									<input type="text" class="field size1" name="car_type" required />
								</p>
								<p>
									<span class="req">max 20 karaktera</span>
									<label>Cena vozila <span>(Obavezno polje)</span></label>
									<input type="text" class="field size1" name="hire_cost" required />
								</p>
								<p>
									<span class="req">Slika</span>
									<label>Slika vozila <span>(Obavezno polje)</span></label>
									<input type="file" class="field size1" name="image" required />
								</p>
								<p>
									<span class="req">Broj modela ovog vozila</span>
									<label>Kapacitet<span>(Obavezno polje)</span></label>
									<input type="text" class="field size1" name="capacity" required />
								</p>

						</div>

						<div class="buttons">
							<input type="submit" class="button" value="potvrdi" name="send" />
						</div>

					</form>
					<?php
							if(isset($_POST['send'])){

								$target_path = "../cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){

								$image = basename($_FILES['image']['name']);
								$car_name = $_POST['car_name'];
								$car_type = $_POST['car_type'];
								$hire_cost = $_POST['hire_cost'];
								$capacity = $_POST['capacity'];

								$qr = "INSERT INTO cars (image, car_name,car_type,hire_cost,capacity,status)
													VALUES ('$image','$car_name','$car_type','$hire_cost','$capacity','Available')";
								$res = $conn->query($qr);
								if($res === TRUE){
									echo "<script type = \"text/javascript\">
											alert(\"Vozilo je uspešno dodato.\");
											window.location = (\"add_vehicles.php\")
											</script>";
									}
								}
								else 'Failed';
							}
						?>
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
