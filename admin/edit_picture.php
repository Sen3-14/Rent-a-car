<?php
$id = $_GET['id'];
include '../includes/config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Promeni sliku</title>
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


		<br />

		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">

				<div class="box">
					<div class="box-head">
						<h2>Promena slike</h2>
					</div>

					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">
								<p>
									<span class="req">Slika</span>
									<label>Slika vozila</label>
									<input type="file" class="field size1" name="image" required />
								</p>
						</div>

						<div class="buttons">
							<input type="submit" class="button" value="potvrdi" name="edit" />
						</div>

					</form>
					<?php
							if(isset($_POST['edit'])){

								$target_path = "../cars/";
								$target_path = $target_path . basename ($_FILES['image']['name']);
								if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)){
								$image = basename($_FILES['image']['name']);

								$query1 = "UPDATE cars SET image = NULL WHERE car_id='$id';";
                $res1 = $conn->query($query1);

                $query2 = "UPDATE cars SET image='$image' WHERE car_id='$id';";
                $res2 = $conn->query($query2);

								if($res2 === TRUE){
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
