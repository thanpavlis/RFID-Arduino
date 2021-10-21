<?php

if (isset($_POST['uid'])) {
    $conn = new mysqli("localhost", "root", "centos@$#18211993", "arduino");
    $sql = "SELECT uid FROM xrhstes WHERE uid='" . $_POST['uid'] . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {//iparxei to uid
        $sql = "SELECT count(*) as 'number' FROM kinisi WHERE uid='" . $_POST['uid'] . "'";
        $row = $conn->query($sql)->fetch_assoc();
        if ($row["number"] % 2 == 0) {//o xrhsths erxetai sto ktirio
            echo "1"; 
            $sql = "INSERT INTO kinisi(uid,timestamp,eidos) VALUES ('" . $_POST['uid'] . "',now(),'1')";
        } else {//o xrhsths einai mesa kai thelei na figei
            echo "0";
            $sql = "INSERT INTO kinisi(uid,timestamp,eidos) VALUES ('" . $_POST['uid'] . "',now(),'0')";
        }
        $conn->query($sql);
    } else {//den iparxei to uid
        echo "2";
    }
    $conn->close();
}
?>