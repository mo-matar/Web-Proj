<?php
include("connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Value = $_POST['name'];
//    echo "value is".$hiddenValue;
    try {
        $qry="DELETE FROM customers WHERE username='".$Value."';";
        $res=$conn->query($qry);
        $conn ->commit();
        $conn ->close();
        header("location:../admin/admin_accounts.php");
    }
    catch (Exception $e) {}
}
?>
