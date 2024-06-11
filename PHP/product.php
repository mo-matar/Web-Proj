<?php
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
<header>
    <h1>

        <div class="navbar">
            <div>
                <a class="#" href="index.html"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
                <div class="dropdown" style="display: inline">
                    <a href="#" class="categories">
                        <i class="fa fa-bars" aria-hidden="true"></i> Categories
                    </a>
                    <div class="content_dorpdown">
                        <a href="cpu.html">Processors</a>
                        <a href="cpu.html">Graphic Cards</a>
                        <a href="cpu.html">Memory</a>
                        <a href="cpu.html">Motherboard</a>
                        <a href="cpu.html">Power Supply</a>
                        <a href="cpu.html">Case</a>
                        <a href="cpu.html">Monitor</a>
                        <a href="cpu.html">Keyboard</a>
                        <a href="cpu.html">Mouse</a>
                        <a href="cpu.html">Cpu Cooler</a>
                        <a href="cpu.html">Hard Disk</a>
                        <a href="cpu.html">SSD</a>
                        <a href="cpu.html">Headset</a>
                        <a href="cpu.html">Computer Accessories</a>
                        <a href="cpu.html">Laptop</a>
                        <a href="cpu.html">Laptop Accessories</a>
                    </div>
                </div>
                <a target="_blank" href="https://www.facebook.com"><i class="fa fa-fw fa-envelope"></i> Contact</a>
                <a class="#" href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
                <a style="justify-self: end" href="login.html" target="_self"><i class="fa fa-fw fa-user"></i> Login</a>
            </div>
            <div id="test"></div>
            <!--        <div>-->
            <!--            <img id="may god bless america" src="../IMAGES/logo.png">-->
            <!--        </div>-->
        </div>
    </h1>
</header>

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
            <input type="number" name="product_quantity" id="qty" min="1" value="1">
            <button id="buy" type="submit" name="add_to_cart">Add to cart</button>
        </form>

        <p id="price">Product price: <?php echo $row['price']; ?></p>
    </div>
    <?php }?>
</main>

<footer>
    <p>&copy; 2024 Never Forget</p>
</footer>
<script src="../JS/slideshow.js"></script>
</body>
</html>
