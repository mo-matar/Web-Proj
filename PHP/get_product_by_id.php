<?php
include("connection.php");
function processValue($value)
{
    $id = intval($value);

    global $conn;
//    $category = isset($_GET['category']) ? $_GET['category'] : 'CPU'; // Default to CPU if category not set

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $featured_products = $stmt->get_result();
    return $featured_products;
}
?>
