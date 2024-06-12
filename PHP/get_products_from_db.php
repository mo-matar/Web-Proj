<?php
include("connection.php");

$category = isset($_GET['category']) ? $_GET['category'] : 'CPU'; // Default to CPU if category not set

$stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
$stmt->bind_param("s", $category);
$stmt->execute();
$featured_products = $stmt->get_result();
?>
