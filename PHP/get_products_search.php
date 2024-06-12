<?php
include("connection.php");

$search_result = $_GET['search'];

$stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE CONCAT('%', ?, '%')");
$stmt->bind_param("s", $search_result);
$stmt->execute();
$featured_products = $stmt->get_result();
?>
