<?php
session_start();
include('connection.php');
if (isset($_POST['place_order'])){
    /*1 get user info and store it in db*/
    $name = $_POST['name'];
    $date = date("Y-m-d H:i:s");
    $phone = $_POST['card_number'];
    $address = $_POST['address'];
    $total = $_SESSION['total'];
    $order_status = "Pending";
    $user_id = 3;//for now, will change later

    $stmt = $conn->prepare("INSERT INTO orders (total_amount,customer_id,order_date,order_status)
                            VALUES (?,?,?,?);");
    $stmt->bind_param("diss", $total, $user_id, $date, $order_status);

    $stmt->execute();
    /*2 issue new order and store order info in db*/

    $order_id = $conn->insert_id;//this returns the id of the inserted oreder
    echo $order_id;
    /*3 get products from cart from session*/

    //$_SESSION['cart'];//array that has key(product id) => value(info about product, price, description, etc)
    foreach ($_SESSION['cart'] as $key => $value) {
        $product = $_SESSION['cart'][$key];//returns array with the product
        $product_id = $product['product_id'];
        $product_price = $product['product_price'];
        $product_quantity = $product['product_quantity'];
        $product_name = $product['product_name'];
        $product_image = $product['product_image'];

        /*4 store each single item in order_items table*/
        $stmt2 = $conn->prepare(
            "INSERT INTO order_items (order_id,product_id,unit_price,
                                            product_name,quantity)
                                            VALUES(?,?,?,?,?);"
                            );
        $stmt2->bind_param("iidsi", $order_id, $product_id, $product_price,
                                $product_name, $product_quantity);
        $stmt2->execute();
    }




    /*5 remove everything from cart --> delayed until payment is done*/
    //unset($_SESSION['cart']);
    /*6 inform user whether everything is fine or there is a problem*/
    header('location:payment.php?order_status="order placed successfully"');

}
?>
