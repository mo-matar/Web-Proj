<?php
include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hiddenValue = intval($_POST['hiddenValue2']);
//    echo "value is".$hiddenValue;
    try {
        $qry="DELETE FROM products WHERE product_id=".$hiddenValue." ";
        $res=$conn->query($qry);
        $conn ->commit();
        $conn ->close();
        header("location:../admin/admin_products.php");
    }
    catch (Exception $e) {}
}
?>
