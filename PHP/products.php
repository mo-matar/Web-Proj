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
<?php include('header.php');?>

<main style="padding: 100px" class="content">
    <div align="center" style="overflow: hidden">
        <table style="">
            <tr>
                <?php
                // Include your database connection and fetch data
                if(isset($_GET['category']))
                    include('get_products_from_db.php');
                else if(isset($_GET['search']))
                    include('get_products_search.php');

                // Counter to track the number of products per row
                $products_per_row = 3;
                $product_count = 0;

                // Loop through each product and generate the HTML for the product card
                while ($row = $featured_products->fetch_assoc()) {
                ?>
                <td>
                    <div class="card">
                        <div class="imgBox">
                            <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>">
                                <img src="../IMAGES/<?php echo $row['image_url']?>" class="mouse"> </a>
                        </div>
                        <div class="contentBox">
                            <h3><?php echo $row['name']; ?></h3>
                            <h2 class="price">$<?php echo $row['price']; ?></h2>
                            <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>" class="buy">Buy Now</a>
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
        </table>
    </div>
</main>

<footer>
    <p>&copy; 2024 Never Forget</p>
</footer>
<script src="../JS/slideshow.js"></script>
</body>
</html>
