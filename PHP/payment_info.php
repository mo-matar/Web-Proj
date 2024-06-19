<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['valid']) || $_SESSION['valid'] == 0) {
    header("location:signup.php");
    exit(); // Important to prevent further execution
}



$cardnum = '';
$address = '';
$paymenttype = '';
$phone='';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["city"]) && isset($_POST["street"]) && isset($_POST["phone"])
    ) {
        if (
            !empty($_POST["city"]) && !empty($_POST["street"]) && !empty($_POST["phone"])
        ) {
            $phone = $_POST["phone"];
            $address = $_POST["street"] . ", " . $_POST["city"];
            if (
                isset($_POST["payment_option"])
            ){
            if (
                !empty($_POST["payment_option"])
            ) {
                $paymenttype = $_POST["payment_option"];
                $cardnum = $_POST["cardnum"];
            }}
            try {
                $db = new mysqli("localhost", "root", "", "computer_store");
                if ($db->connect_error) {
                    throw new Exception("Connection failed: " . $db->connect_error);
                }
                $qry = "UPDATE `customers` SET `address`=?, `card_number`=?, `card_type`=?, `phone`=? WHERE `username` = ?";
                $stmt = $db->prepare($qry);
                if ($stmt === false) {
                    throw new Exception("Prepare failed: " . $db->error);
                }
                $stmt->bind_param("sssss", $address, $cardnum, $paymenttype, $phone, $_SESSION['uname']);
                if (!$stmt->execute()) {
                    throw new Exception("Execute failed: " . $stmt->error);
                }
                $stmt->close();
                $db->close();
                echo "Success";
                $_SESSION["address"] = $address;
                $_SESSION['logged_in'] = true;
                header("location:index.php");
                exit(); // Important to prevent further execution
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Information</title>
    <script src="https://kit.fontawesome.com/d5fa305551.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/payment_info_style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
<img src="../IMAGES/login.png">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <div>
        <Label class="labels">Address/Contact info</Label>
    </div>
    <div>
        <input class="inputs" required type="text" name="street" id="street" placeholder="Street, Area code, Building code">
    </div>
    <div>
        <input class="inputs" required type="text" name="phone" id="phone" placeholder="Phone Number">
    </div>
    <div>
        <a href="https://postcode.palestine.ps/" target="_blank">Don't know your area code?</a>
    </div>
    <div>
        <label for="City">City:</label>
        <select name="city" id="City">
            <option value="Jerusalem">Jerusalem</option>
            <option value="Bethlehem">Bethlehem</option>
            <option value="Hebron">Hebron</option>
            <option value="Jericho">Jericho</option>
            <option value="Ramallah">Ramallah</option>
            <option value="Nablus">Nablus</option>
            <option value="Tulkarem">Tulkarem</option>
            <option value="Jenin">Jenin</option>
            <option value="Ghaza">Ghaza</option>
        </select>
    </div>
    <div>
        <Label class="labels">Payment options</Label>
    </div>
    <div>
        <label for="cash"><i class="fa-solid fa-money-bill"></i></label>
        <input required class="radio" type="radio" value="Cash" name="payment_option" id="cash" onclick="disable()">
        <label for="visa"><i class="fa-brands fa-cc-visa"></i></label>
        <input required class="radio" type="radio" value="Visa" name="payment_option" id="visa" onclick="enable()">
        <label for="mastercard"><i class="fa-brands fa-cc-mastercard"></i></label>
        <input required class="radio" type="radio" value="Mastercard" name="payment_option" id="mastercard" onclick="enable()">
    </div>
    <div>
        <input class="inputs" type="text" name="cardnum" id="cardnum" placeholder="Card number">
    </div>
    <div>
        <input class="inputs" type="month" name="expdate" id="expdate" placeholder="Expiry date">
    </div>
    <div>
        <input class="inputs" type="password" name="code" id="code" placeholder="Security code">
    </div>
    <div>
        <input type="submit" value="Confirm">
<!--        --><?php //if (isset($_SESSION["logged_in"])):
//            ?>
<!--            <a style="justify-self: end" href="login.php"> Confirm</a>-->
<!--        --><?php //else: ?>
<!--            <a style="justify-self: end" href="login.php" target="_self"> Confirm</a>-->
<!--        --><?php //endif; ?>
    </div>
</form>
<script>
    function disable() {
        document.getElementById('cardnum').disabled=true
        document.getElementById('expdate').disabled=true
        document.getElementById('code').disabled=true
        document.getElementById('cardnum').required=false
        document.getElementById('expdate').required=false
        document.getElementById('code').required=false
        document.getElementById('cardnum').value=''
        document.getElementById('expdate').value=''
        document.getElementById('code').value=''
    }

    function enable() {
        document.getElementById('cardnum').disabled=false
        document.getElementById('expdate').disabled=false
        document.getElementById('code').disabled=false
        document.getElementById('cardnum').required=true
        document.getElementById('expdate').required=true
        document.getElementById('code').required=true
    }
</script>
</body>
</html>
