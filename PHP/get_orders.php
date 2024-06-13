<?php
include("connection.php");

$stmt = "SELECT * FROM orders order by order_status asc ";
$orders = $conn->query($stmt);
?>
