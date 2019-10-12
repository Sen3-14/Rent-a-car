<?php
 include '../includes/config.php';
$output = '';

if(isset($_POST["query"]))
{
    $search = $_POST["query"];
	$query = "SELECT * FROM client WHERE client.fname LIKE '%".$search."%'
    OR client.lname LIKE '%".$search."%'
    OR client.email LIKE '%".$search."%'
    OR client.locat LIKE '%".$search."%'
    OR client.phone LIKE '%".$search."%'";

} else {
    $query = "SELECT * FROM client";
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
                            <th>Pol</th>
                            <th>E-mail</th>
                            <th>Telefon</th>
                            <th>Mesto</th>
                            <th>Broj racuna</th>
							<th>Kontrole</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["fname"].'</td>
                <td>'.$row["lname"].'</td>
                <td>'.$row["gender"].'</td>
                <td>'.$row["email"].'</td>
                <td>'.$row["phone"].'</td>
                <td>'.$row["locat"].'</td>
                <td>'.$row["mpesa"].'</td>

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
