<?php
include("connection.php");
$stmt = "SELECT * FROM products order by category asc ";
$featured_products = $conn->query($stmt);
?>
