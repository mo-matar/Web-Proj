    <?php
session_start();
if (!isset($_GET['order_status'])) {
    header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="../CSS/confirm_payment.css">
    <script src="https://kit.fontawesome.com/d5fa305551.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
<img src="../IMAGES/login.png" alt="Background Image">
<div class="cont">
    <div class="card px-4">
        <p class="h8 py-3"><?php echo $_GET['order_status']; ?></p>
        <div class="row gx-3">
            <div class="col-12">
                <br>
            </div>
            <div class="col-12">
                <br>
                <i style="transform: scale(4,4)" class="fa-sharp fa-regular fa-circle-check"></i>
                <br>
            </div>
            <div class="col-6">
                <br>
            </div>
            <div class="col-6">
            </div>
            <div class="col-12">
                <div class="btn btn-primary mb-3">
                    <form method="POST" action="process_payment.php">
                        <input class="submitPayment" type="submit" value="<?php echo $_GET['payment_option']; ?>  $<?php echo $_SESSION['total']; ?>">
                        <span  class="fas fa-arrow-right"></span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<a class="orders_history" href="user_orders.php"><button id="orders_history_btn">View Order History</button></a>
</body>
</html>
