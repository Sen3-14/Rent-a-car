<?php
 include '../includes/config.php';
$output = '';
if(isset($_POST["query"]))
{
    $search = $_POST["query"];
	$query = "SELECT client.mpesa,client.client_id,client.fname,client.lname,client.phone,client.email,cars.car_name,cars.hire_cost,client.status
			  FROM client JOIN cars ON client.car_id=cars.car_id WHERE (client.status = 'waiting' AND client.fname LIKE '%".$search."%') OR (client.status = 'waiting' AND client.lname LIKE '%".$search."%') OR (client.status = 'waiting' AND client.email LIKE '%".$search."%')";

} else {
    $query = "SELECT client.mpesa,client.client_id,client.fname,client.lname,client.phone,client.email,cars.car_name,cars.hire_cost,client.status
										FROM client JOIN cars ON client.car_id=cars.car_id WHERE client.status = 'waiting'";
}

$result = $conn->query($query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered" style="text-align: center;">
					<form action="sendReply.php" method="POST">
					<tr>
							<th>Ime</th>
							<th>Prezime</th>
                            <th>E-mail</th>
                            <th>Telefon</th>
                            <th>Vozilo</th>
                            <th>MPESA</th>
							<th>Status</th>
							<th>Kontrole</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["fname"].'</td>
				<td>'.$row["lname"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["car_name"].'</td>
                <td>'.$row["mpesa"].'</td>
                <td>'.$row["status"].'</td>
                <td>
                    $rit= '.$row['car_name'].';
                   <a href="javascript:deleteRequest('.$row['client_id'].')" class="ico del">Izbriši</a>
                   <a href="javascript:sureToApprove('.$row['client_id'].', '.$row['car_name'].')"class="ico edit">Odobri</a>
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
