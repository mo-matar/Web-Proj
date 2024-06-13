<?php
include("../PHP/connection.php");
include("../PHP/find_user.php");
$username = '';
$email = '';
$password = '';
$phone = '';
$address ='';

if (isset($_POST["name"]) && isset($_POST["email"]) &&
    isset($_POST["password"]) && isset($_POST["phone"]) && isset($_POST["address"])){
    if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) &&
        !empty($_POST["phone"]) && !empty($_POST["address"])){
        try {
            $username = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $user_id=find_id($username);

            $qry = "UPDATE `customers` set `username`='".$username."', `email`='".$email."', `password_hash`='".$password."',
             `phone`='".$phone."',`address`='".$address."'".
                " WHERE `customer_id` ='".$user_id."';";
            $res=$conn->query($qry);
            $conn ->commit();
            $conn ->close();
//            echo '<script>alert("Product successfully updated");</script>';
            header("location:../admin/admin_accounts.php");
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
//header("location:../admin/admin_products.php");


?>