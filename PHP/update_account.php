<?php
include("connection.php");
include("find_user.php");
session_start();
$username = '';
$fname='';
$mname='';
$lname='';
$email='';
$pass='';
$address='';
$phone='';
$cardnum = '';
$paymenttype = '';
$user_id=find_id($_SESSION['uname']);
//echo "ID:".$user_id;

if (isset($_POST["fname"]) && isset($_POST["mname"]) && isset($_POST["lname"]) && isset($_POST["email"]) &&
     isset($_POST["uname"]) && isset($_POST["pass"]) && isset($_POST["phone"]) && isset($_POST["street"])){
    if(!empty($_POST["fname"]) &&!empty($_POST["mname"]) &&!empty($_POST["lname"])  &&
        !empty($_POST["email"]) &&!empty($_POST["uname"]) &&  !empty($_POST["pass"]) &&
        !empty($_POST["phone"]) && !empty($_POST["street"])){
        try {
            $fname = $_POST["fname"];
            $mname = $_POST["mname"];
            $lname = $_POST["lname"];
            $username = $_POST['uname'];
            $email = $_POST['email'];
            $password = $_POST['pass'];
            $phone = $_POST['phone'];
            $address = $_POST['street'];
            $qry = "UPDATE `customers` set `username`='".$username."', `email`='".$email."', `password_hash`='".$password."',
            `phone`='".$phone."',`address`='".$address."',`first_name`='".$fname."',`middle_name`='".$mname."',`last_name`='".$lname."'".
                " WHERE `customer_id` ='".$user_id."';";

            if (
                isset($_POST["payment_option"])
            ){
                if (
                    !empty($_POST["payment_option"])
                ) {
                    $paymenttype = $_POST["payment_option"];
                    $cardnum = $_POST["cardnum"];
                    $qry = "UPDATE `customers` set `username`='".$username."', `email`='".$email."', `password_hash`='".$password."',
                    `phone`='".$phone."',`address`='".$address."',`first_name`='".$fname."',`middle_name`='".$mname."',`last_name`='".$lname."',`card_number`='".$cardnum."',`card_type`='".$paymenttype."'".
                        " WHERE `customer_id` ='".$user_id."';";
                }}

            $res=$conn->query($qry);
            $conn ->commit();
            $conn ->close();
//            echo '<script>alert("Product successfully updated");</script>';
            header("location:index.php");
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }
}
//header("location:cart.php");


?>