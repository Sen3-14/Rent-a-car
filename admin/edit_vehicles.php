<?php
	include '../includes/config.php';
	  $car_id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Podesi vozilo</title>
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
                 Podesi vozilo
		</div>

		<br />

		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">

				<div class="box">
					<div class="box-head">
						<h2>Podesi vozilo</h2>
					</div>

					<form action="" method="post" enctype="multipart/form-data">

						<div class="form">
                <p style="color:red;">Popunite polja čije vrednosti želite da promenite (ostali podaci se neće menjati)</p>
                <p style="color:red;">Obratite pažnju prilikom menjanja kapaciteta/dostupnosti vozila (ako povećate kapacitet, dostupnost se neće menjati)</p>
								<p>
									<span class="req">max 100 karaktera</span>
									<label>Ime vozila</label>
									<input type="text" class="field size1" name="car_name" />
								</p>
								<p>
									<span class="req">max 20 karaktera</span>
									<label>Tip vozila</label>
									<input type="text" class="field size1" name="car_type" />
								</p>
								<p>
									<span class="req">max 20 karaktera</span>
									<label>Cena vozila </label>
									<input type="text" class="field size1" name="hire_cost" />
								</p>
								<p>
									<span class="req">Ukupan broj vozila ovog modela</span>
									<label>Kapacitet</label>
									<input type="number" class="field size1" name="capacity" />
								</p>
                <p>
									<span class="req">Broj dostupnih vozila ovog modela</span>
									<label>Dostupnost</label>
									<input type="number" class="field size1" name="availability" />
								</p>
								<a href="edit_picture.php?id=<?php echo $car_id; ?>" class="loginbutton1"
                    style="font-size:150%;">Promeni sliku</a>

						</div>

						<div class="buttons">
							<input type="submit" class="button" value="potvrdi" name="edit" />
						</div>

					</form>
<?php


          if(isset($_POST['edit'])){

						$car_name = $_POST['car_name'];
						$car_type = $_POST['car_type'];
						$hire_cost = $_POST['hire_cost'];
						$capacity = $_POST['capacity'];
						$availability = $_POST['availability'];


            if(!empty($car_name)){
              $query2 = "UPDATE cars SET car_name='$car_name' WHERE car_id='$car_id';";
              $res2 = $conn->query($query2);
            }

            if(!empty($car_type)){
              $query3 = "UPDATE cars SET car_type='$car_type' WHERE car_id='$car_id';";
              $res3 = $conn->query($query3);
            }

            if(!empty($hire_cost)){
              $query4 = "UPDATE cars SET hire_cost ='$hire_cost' WHERE car_id='$car_id';";
              $res4 = $conn->query($query4);
            }

            if(!empty($capacity)){
              $query5 = "UPDATE cars SET capacity='$capacity' WHERE car_id='$car_id';";
              $res5 = $conn->query($query5);
             }

            if(!empty($availability)){
              $query6 = "UPDATE cars SET availability='$availability' WHERE car_id='$car_id';";
              $res6 = $conn->prepare($query6);
							$res6->execute();
            }


              echo "<script type = \"text/javascript\">
                  alert(\"Vozilo je uspešno podešeno.\");
                  window.location = (\"add_vehicles.php\")
                  </script>";

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
