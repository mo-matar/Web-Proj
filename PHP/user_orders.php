<?php
session_set_cookie_params(0);
session_start();
$flag=0;
if($_SESSION['logged_in'] != true){
    header("location:login.php");
}
include('get_orders.php');
$orders= find_user_orders($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Online Shop</title>
    <link rel="stylesheet" href="../CSS/main%20style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/user_orders.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../JS/backgroundScript.js"></script>
<!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />-->
<!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">-->
<!--    <link rel="stylesheet" href="../admin/css/fontawesome.min.css">-->
<!--    <link rel="stylesheet" href="../admin/css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="../admin/css/templatemo-style.css">-->
</head>
<body>
<?php include('header.php');?>
<main style="padding-top: 75px" class="content">

    <div style="margin-top: 3%" class="col-12 tm-block-col">
        <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">
            <h2 style="text-align: center;font-size: 30px; margin-bottom: 4px" class="tm-block-title">Orders List</h2>
            <table style="text-align: center;" class="table">
                <thead>
                <tr>
                    <th scope="col">ORDER NO.</th>
                    <th scope="col">CUSTOMER ID</th>
                    <th scope="col">ORDER DATE</th>
                    <th scope="col">TOTAL AMOUNT</th>
                    <th scope="col">STATUS</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $orders->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><b><?php echo $row['order_id']; ?></b></th>
                        <td>
                            <div class="tm-status-circle moving">
                            </div><?php echo $row['customer_id']; ?>
                        </td>
                        <td><b><?php echo $row['order_date']; ?></b></td>
                        <td><b><?php echo $row['total_amount']; ?></b></td>
                        <td><b><?php echo $row['order_status']; ?></b></td>
                    </tr>
                <?php   }?>
                </tbody>
            </table>
        </div>
    </div>


</main>
<footer style="position: absolute;bottom: 0px">
    <p>&copy; 2024 Never Forget</p>
</footer>
<script src="../JS/slideshow.js"></script>
</body>
</html>
