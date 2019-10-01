<?php
 include '../includes/config.php';
$output = '';
if(isset($_POST["query"]))
{
    $search = $_POST["query"];
	$query = "SELECT client.client_id,client.fname,client.lname,client.phone,client.email,cars.car_name
			  FROM client JOIN cars ON client.car_id=cars.car_id WHERE (client.status = 'Approved' AND client.fname LIKE '%".$search."%') OR (client.status = 'Approved' AND client.lname LIKE '%".$search."%') OR (client.status = 'Approved' AND client.email LIKE '%".$search."%') OR (client.status = 'Approved' AND cars.car_name LIKE '%".$search."%')";

} else {
    $query = "SELECT client.client_id,client.fname,client.lname,client.phone,client.email,cars.car_name
										FROM client JOIN cars ON client.car_id=cars.car_id WHERE client.status = 'Approved'";
}

$result = $conn->query($query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered" style="text-align: center;">
					<form action="sendReply.php" method="POST">
					<tr>
              <th>ID klijenta</th>
							<th>Ime</th>
							<th>Prezime</th>
                            <th>E-mail</th>
                            <th>Telefon</th>
                            <th>Vozilo</th>
							<th>Kontrole</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
        <td>'.$row["client_id"].'</td>
				<td>'.$row["fname"].'</td>
				<td>'.$row["lname"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["car_name"].'</td>
                <td>
                   <a href="javascript:deleteRequest('.$row['client_id'].')" class="ico del">Izbriši</a>
                </td>
			</tr>
			</form>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
