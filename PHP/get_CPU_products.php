<?php
include("connection.php");
$stmt = $conn->prepare("SELECT * FROM products WHERE category = 'CPU'");
$stmt->execute();
$featured_products = $stmt->get_result();
?>