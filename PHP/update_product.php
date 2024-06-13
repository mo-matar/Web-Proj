<?php
include("../PHP/connection.php");
$product_name = '';
$product_price = '';
$product_stock = '';
$product_description = '';
$product_category ='';
$product_image ='';

if (isset($_POST["name"]) && isset($_POST["price"]) &&
    isset($_POST["stock"]) && isset($_POST["description"]) && isset($_POST["category"])){
    if(!empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["stock"]) &&
        !empty($_POST["description"]) && !empty($_POST["category"])){
        try {
            $product_image = $_POST["fileinput"];
            $product_name = $_POST["name"];
            $product_price = $_POST["price"];
            $product_stock = $_POST["stock"];
            $product_description = $_POST["description"];
            $product_category = $_POST["category"];
            $product_id = $_POST["product_id"];
//            echo '<script>alert("error");</script>';
//            echo "product id:".$product_id."<br>";

            $qry = "UPDATE `products` set `name`='".$product_name."', `price`='".$product_price."', `stock_quantity`='".$product_stock."',
             `description`='".$product_description."',`category`='".$product_category."', `image_url`='".$product_image."'".
                " WHERE `product_id` ='".$product_id."';";
            $res=$conn->query($qry);
            $conn ->commit();
            $conn ->close();
//            echo '<script>alert("Product successfully updated");</script>';
            header("location:../admin/admin_products.php");
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
//header("location:../admin/admin_products.php");


?>