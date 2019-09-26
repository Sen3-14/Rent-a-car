<?php
	include '../includes/config.php';
    $id = $_REQUEST['id'];
    
    $qry1 = "DELETE FROM client WHERE client_id = '$id'";
    $sql = $conn->query($qry1);
    
    if($sql){
        echo "<script type = \"text/javascript\">
                        alert(\"Klijent izbisan.\");
                        window.location = (\"clients.php\")
                    </script>";
                    exit();
    } else {
        exit();
    }