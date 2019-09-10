<?php
	include '../includes/config.php';
	$id = $_REQUEST['id'];
    $qry = "SELECT * FROM message WHERE msg_id = '$id'";
    $rslt = $conn->query($qry);
    $row = mysqli_fetch_assoc($rslt);
    if($row['status'] == 'Unread'){
        $query = "UPDATE message SET status = 'Read' WHERE msg_id = '$id'";
        $result = $conn->query($query);
        if($result === TRUE){
            echo "<script type = \"text/javascript\">
                        alert(\"Status promenjen.\");
                        window.location = (\"index.php\")
                    </script>";
                    exit();
        }
    } else{
        $query = "UPDATE message SET status = 'Unread' WHERE msg_id = '$id'";
        $result = $conn->query($query);
        if($result === TRUE){
            echo "<script type = \"text/javascript\">
                        alert(\"Status promenjen.\");
                        window.location = (\"index.php\")
                    </script>";
        }
        exit();
    }
    
	
?>
