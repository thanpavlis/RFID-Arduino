<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Europe/Athens');

$conn = new mysqli("localhost", "root", "centos@$#18211993", "ideas");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES 'utf8'");
$conn->query("SET CHARACTER SET 'utf8'");

$sql = "SELECT now() as 'today';";
$result = $conn->query($sql);
$conn->close();


if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    echo "Σημερινή ημερομηνία και ώρα : " . date('d/m/Y H:i:s', strtotime($row['today'])) . " <br>";
    echo "Σημερινή ημερομηνία και ώρα : " . $row['today'] . " \n";
}
?>

<html>
    <head>
        <script>
            setTimeout(function () {
                window.location.reload(1);
            }, 1000);
        </script>
    </head>
</html>