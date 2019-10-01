<?php
 include '../includes/config.php';
$output = '';

if(isset($_POST["query"]))
{
    $search = $_POST["query"];
	$query = "SELECT * FROM message
	WHERE client_id LIKE '%".$search."%'";
} else {
    $query = "SELECT * FROM message ORDER BY 'time'";
}

$result = $conn->query($query);

if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered" style="text-align: center;" style="overflow:scroll;">
					<form action="sendReply.php" method="POST">
					<tr>
                            <th>E-mail</th>
							<th>Poruka</th>
							<th>Vreme</th>
							<th>Status</th>
							<th>Kontrole</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["client_id"].'</td>
				<td>'.$row["message"].'</td>
				<td>'.$row["time"].'</td>
				<td>'.$row["status"].'</td>
				<td width="21%">
				<a href="javascript:sureToApprove('.$row["msg_id"].')" class="ico del">Obriši</a>
				<a href="javascript:changeStatus('.$row["msg_id"].')" class="ico edit">Označi</a>
				<a href="javascript:sendMessage('.$row["msg_id"].')" class="add-button"><span>Pošalji odgovor</span></a>
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