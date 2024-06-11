 <!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../CSS/cpu.css">
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

<main style="padding: 100px" class="content">
    <div align="center" style="overflow: hidden">
        <table style="">
            <tr>
                <?php
                // Include your database connection and fetch data
                include('get_CPU_products.php');

                // Counter to track the number of products per row
                $products_per_row = 3;
                $product_count = 0;

                // Loop through each product and generate the HTML for the product card
                while ($row = $featured_products->fetch_assoc()) {
                ?>
                <td>
                    <div class="card">
                        <div class="imgBox">
                            <a href="product.html">
                                <img src="../IMAGES/<?php echo $row['image_url']?>" class="mouse"> </a>
                        </div>
                        <div class="contentBox">
                            <h3><?php echo $row['name']; ?></h3>
                            <h2 class="price"><?php echo $row['price']; ?></h2>
                            <a href="<?php echo "product.php?product_id=". $row['product_id'];?>" class="buy">Buy Now</a>
                        </div>
                    </div>
                </td>
                    <?php
                    // Increment product count
                    $product_count++;

                    // Check if it's time to start a new row
                    if ($product_count % $products_per_row == 0) {
                        echo "</tr><tr>"; // Close and start a new row
                    }
                }
                ?>
            </tr>

<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/amd1.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!---->
<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/pentium.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!--            </tr>-->

<!--            <tr>-->
<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/cpu.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!---->
<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/cpu.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!---->
<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/cpu.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!--            </tr>-->

<!--            <tr>-->
<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/cpu.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!---->
<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/cpu.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!---->
<!--                <td>-->
<!--                    <div class="card">-->
<!--                        <div class="imgBox">-->
<!--                            <img src="../IMAGES/cpu.png" class="mouse">-->
<!--                        </div>-->
<!--                        <div class="contentBox">-->
<!--                            <h3>intel i7 9700k</h3>-->
<!--                            <h2 class="price">72.<small>54</small> $</h2>-->
<!--                            <a href="#" class="buy">Buy Now</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </td>-->
<!--            </tr>-->
        </table>
    </div>
</main>

<footer>
    <p>&copy; 2024 Never Forget</p>
</footer>
<script src="../JS/slideshow.js"></script>
</body>
</html>
