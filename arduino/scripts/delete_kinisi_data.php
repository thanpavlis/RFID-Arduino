<?php

$conn = new mysqli("localhost", "root", "centos@$#18211993", "arduino");

$sql = "DELETE FROM kinisi";
$conn->query($sql);

$conn->close();

echo "O pinakas kinisi adeiase !";
?>