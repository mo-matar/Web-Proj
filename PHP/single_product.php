<?php
session_start();
include('connection.php');
if(isset($_GET['product_id'])){
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $_GET['product_id']);
    $stmt->execute();


    $product = $stmt->get_result();
}
else{//no product id was given
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../CSS/product.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../JS/backgroundScript.js"></script>

</head>
<body>
<?php include('header.php');?>
computer_store
<main style="padding: 100px; padding-bottom: 29.5px; overflow: hidden; width: 100%" class="content" >
    <?php
        while($row = $product->fetch_assoc()){//loop over one single product
            //since $product stores an array?>

    <div align="center">
        <img id="product_img" src="../IMAGES/<?php echo $row['image_url']; ?>">
        <p style="font-weight: bold; font-size: 60px"><?php echo $row['name']; ?></p>
        <p><?php echo $row['description'] ?></p>
        <br>
        <br>
        <form method="POST" action="cart.php">
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
            <input type="hidden" name="image_url" value="<?php echo $row['image_url']; ?>">
            <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="stock_quantity" value="<?php echo $row['stock_quantity']; ?>">
            <input type="number" name="product_quantity" id="qty" min="1" value="1" max="<?php echo $row['stock_quantity']; ?>">
            <button id="buy" type="submit" name="add_to_cart">Add to cart</button>
        </form>


        <p id="price">Product price: $<?php echo $row['price']; ?></p>
    </div>
    <?php }?>
</main>

<footer>
    <p>&copy; 2024 Never Forget</p>
</footer>
<script src="../JS/slideshow.js"></script>
</body>
</html>
