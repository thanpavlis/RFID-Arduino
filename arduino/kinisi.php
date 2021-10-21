<?php
include '../functions.php';
date_default_timezone_set('Europe/Athens');

$conn = new mysqli("localhost", "root", "centos@$#18211993", "arduino");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
$conn->query("SET CHARACTER SET 'utf8'");

$sql = "SELECT uid,name,last FROM xrhstes";
$result = $conn->query($sql);

$users = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[$row["uid"]] = array();
        $users[$row["uid"]]["name"] = $row["name"];
        $users[$row["uid"]]["last"] = $row["last"];
    }
}

$sql = "SELECT uid,timestamp,eidos FROM kinisi";
$result = $conn->query($sql);
$conn->close();
?>
<html>
    <head>
        <title>Κίνηση Χρηστών</title>
        <?php styles(); ?>
        <style>
            td,th{
                text-align: center;
            }
        </style>
    </head> 
    <body>
        <br>
        <div class="container">
            <div class="row">
                <div class="box">
                    <?php if ($result->num_rows > 0) { ?>
                        <table id="clients" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>UID(UserID)</th>
                                    <th>Όνομα</th>
                                    <th>Επώνυμο</th>
                                    <th>Timestamp</th>
                                    <th>Είδος Κίνησης</th>
                                </tr>
                            </thead>
                            <?php
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $counter . '</td>';
                                echo '<td>' . $row["uid"] . '</td>';
                                echo '<td>' . $users[$row["uid"]]["name"] . '</td>';
                                echo '<td>' . $users[$row["uid"]]["last"] . '</td>';
                                echo '<td>' . date('d/m/Y H:i:s', strtotime($row['timestamp'])) . '</td>';
                                if ($row["eidos"] == 1) {
                                    echo '<td>ΑΦΙΞΗ</td>';
                                } else {
                                    echo '<td>ΑΝΑΧΩΡΗΣΗ</td>';
                                }
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<center><h1>Δεν υπάρχει κίνηση χρηστών !</h1></center>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>