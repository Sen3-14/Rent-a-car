<?php
	include '../includes/config.php';
    $id = $_REQUEST['id'];

    $qry1 = "SELECT * FROM client WHERE client_id = '$id'";
    $sql = $conn->query($qry1);
    $result = mysqli_fetch_assoc($sql);

    $qry2 = "UPDATE client SET status = 'Denied' WHERE email = '$result[email]'";
    $sql2 = $conn->query($qry2);

    $qry3 = "DELETE FROM hire WHERE client = '$result[email]';";
    $sql3 = $conn->query($qry3);

    if($sql2 && $sql3){
        echo "<script type = \"text/javascript\">
                        alert(\"Zahtev izbisan.\");
                        window.location = (\"hired.php\")
                    </script>";
                    exit();
    } else {
        echo "<script type = \"text/javascript\">
                        alert(\"Error.\");
                        window.location = (\"hired.php\")
                    </script>";
                    exit();
    }
