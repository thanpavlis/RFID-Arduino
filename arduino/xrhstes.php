<?php
include '../functions.php';

$conn = new mysqli("localhost", "root", "centos@$#18211993", "arduino");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
$conn->query("SET CHARACTER SET 'utf8'");

$sql = "SELECT uid,name,last  FROM xrhstes";
$result = $conn->query($sql);

$conn->close();
?>
<html>
    <head>
        <title>Χρήστες</title>
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
                                    <th>Κίνηση Χρήστη</th>
                                </tr>
                            </thead>
                            <?php
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $counter . '</td>';
                                echo '<td>' . $row["uid"] . '</td>';
                                echo '<td>' . $row["name"] . '</td>';
                                echo '<td>' . $row["last"] . '</td>';
                                echo "<td><a href='kinisi_user.php?user_id=" . $row["uid"] . "'>Κίνηση</a></td>";
                                echo "</tr>";
                                $counter++;
                            }
                        } else {
                            echo "<center><h1>Δεν υπάρχουν εγγεγραμμένοι χρήστες !</h1></center>";
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>