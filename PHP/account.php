<?php
session_start();
$uname=$_SESSION['uname'];
$fname='';
$mname='';
$lname='';
$email='';
$pass='';
$address='';
$phone='';
include ("find_user.php");
$user=find($uname);
while ($row = $user->fetch_assoc()) {
    $fname=$row['first_name'];
    $mname=$row['middle_name'];
    $lname=$row['last_name'];
    $email=$row['email'];
    $pass=$row['password_hash'];
    $address=$row['address'];
    $phone=$row['phone'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="../CSS/account.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../JS/backgroundScript.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d5fa305551.js" crossorigin="anonymous"></script>
</head>
<body>
<img src="../IMAGES/login.png">
<?php include('header.php');?>

<main>
    <form action="update_account.php" method="post">
    <div class="contain" style="left: 15%">


            <label class="labels" for="fname">Name</label>
            <input class="text_name" type="text" id="fname" name="fname" required placeholder="First" value="<?php echo $fname?>">
            <input class="text_name" type="text" id="mname" name="mname" required placeholder="Middle" value="<?php echo $mname?>">
            <input class="text_name" type="text" id="lname" name="lname" placeholder="Last" required value="<?php echo $lname?>">


            <label class="labels" for="email">Email</label>
            <input class="inputs" required type="email" name="email" id="email" placeholder="example@mail.com" value="<?php echo $email?>">



            <label class="labels" for="uname">Username</label>
            <input class="inputs" type="text" id="uname" name="uname" required value="<?php echo $uname?>">



            <label class="labels" for="pass">Password</label>
            <input class="inputs" type="password" id="pass" name="pass" required>



    </div>

    <div class="contain" style="right: 18%;">

            <div>
                <Label class="labels">Address/Contact info</Label>
            </div>

            <div>
                <input class="inputs" required type="text" name="street" id="street" placeholder="Street, Area code, Building code" value="<?php echo $address?>">
            </div>
            <div>
                <input class="inputs" required type="text" name="phone" id="phone" placeholder="Phone Number" value="<?php echo $phone?>">
            </div>

            <div>
                <a href="https://postcode.palestine.ps/" target="_blank">Don't know your area code?</a>
            </div>

            <div>
                <label for="City">City:</label>
                <select name="City" id="City">
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
                <input class="inputs" type="month"  name="expdate" id="expdate" placeholder="Expiry date">
            </div>

            <div>
                <input class="inputs" type="password" name="code" id="code" placeholder="Security code">
            </div>

    </div>
        <input type="submit" value="Confirm">
    </form>
    <a class="orders_history" href="user_orders.php"><button id="orders_history_btn">View Order History</button></a>

</main>
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
<footer style="position: absolute">
    <p>&copy; 2024 Never Forget</p>
</footer>
<script src="../JS/slideshow.js"></script>
</body>
</html>