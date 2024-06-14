<?php
include("connection.php");

$stmt = "SELECT * FROM orders order by order_status asc ";
$orders = $conn->query($stmt);

function find_user_orders($user_id)
{
    global $conn;
    $stmt = $conn->prepare( "SELECT * FROM orders where customer_id = ? order by order_status asc;");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $orders = $stmt->get_result();
    return $orders;
}
?>
