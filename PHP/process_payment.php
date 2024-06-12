<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        include("connection.php");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Start transaction
        $conn->autocommit(FALSE);

        try {
            // Assuming order_id is passed via session or a hidden input field
            $order_id = $_SESSION['order_id'];
            $order_status = 'paid';

            // Update order status to 'paid'
            $sql_update_order = "UPDATE orders SET order_status = ? WHERE order_id = ?";
            $stmt_update_order = $conn->prepare($sql_update_order);
            $stmt_update_order->bind_param('si', $order_status, $order_id);

            if (!$stmt_update_order->execute()) {
                throw new Exception("Failed to update order status for order ID: $order_id");
            }

            // Update stock quantity for each product in the cart
            foreach ($_SESSION['cart'] as $product_id => $product) {
                $quantity_in_cart = $product['product_quantity'];

                $sql_update_stock = "UPDATE products SET stock_quantity = stock_quantity - ? WHERE product_id = ? AND stock_quantity >= ?";
                $stmt_update_stock = $conn->prepare($sql_update_stock);
                $stmt_update_stock->bind_param('iii', $quantity_in_cart, $product_id, $quantity_in_cart);

                if (!$stmt_update_stock->execute()) {
                    throw new Exception("Failed to update stock for product ID: $product_id");
                }
            }

            // Commit transaction
            $conn->commit();

            // Clear the cart
            unset($_SESSION['cart']);

            // Redirect to success page
            echo "<script>alert('Payment Successful')</script>";
            header("Location: index.php?message=Payment successful");
        } catch (Exception $e) {
            // Rollback transaction if any error occurs
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        } finally {
            $conn->close();
        }
    } else {
        header("Location: cart.php?message=Your cart is empty");
    }
} else {
    header("Location: index.php");
}
?>
