<?php
session_start();
//unset($_SESSION['cart']); // Clear the cart session
// $_SESSION['cart'] = []; // Alternatively, reset to an empty array
echo "Cart has been cleared for testing purposes.";
// Check whether the user came to this page using the hidden form or not (clicked on add to cart button)
if (isset($_POST['add_to_cart'])) {

    // Initialize the cart array if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Sanitize and validate input data
    $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);
    $product_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $product_price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $product_image = filter_input(INPUT_POST, 'image_url', FILTER_SANITIZE_URL);
    $product_quantity = filter_input(INPUT_POST, 'product_quantity', FILTER_SANITIZE_NUMBER_INT);

    // Check for valid inputs
    if ($product_id && $product_name && $product_price && $product_image && $product_quantity) {

        // Check if the product has already been added to the cart
        if (!array_key_exists($product_id, $_SESSION['cart'])) {
            // Product not in cart, add it
            $product_array = [
                'product_id' => $product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_image' => $product_image,
                'product_quantity' => $product_quantity
            ];

            $_SESSION['cart'][$product_id] = $product_array;
        } else {
            // Product is already in the cart
            echo '<script>alert("Product already added to cart");</script>';
            // Optionally, you can redirect the user back to the previous page
            // echo '<script>window.location = "index.php"</script>';
        }
    } else {
        echo '<script>alert("Invalid product data");</script>';
    }

    // Calculate the total
    calculateTotalCart();

} else if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    // Calculate the total
    calculateTotalCart();

} else if (isset($_POST['edit_quantity'])) {
    // Get id and quantity from the form below
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    // Get the current product array from the session
    $product_array = $_SESSION['cart'][$product_id];
    // Update the product quantity in the array
    $product_array['product_quantity'] = $product_quantity;
    // Return array back to its place
    $_SESSION['cart'][$product_id] = $product_array;
    // Calculate the total
    calculateTotalCart();

} else {
    // User tried to get to this page from somewhere else
    // Optionally, redirect them to the index or another appropriate page
}

function calculateTotalCart() {
    $total = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $price = $value['product_price'];
        $quantity = $value['product_quantity'];
        $total += $price * $quantity;
    }
    $_SESSION['total'] = $total;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../CSS/cart.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../JS/cart.js"></script>
    <script src="../JS/backgroundScript.js"></script>
    <script src="https://kit.fontawesome.com/d5fa305551.js" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var cartIsEmpty = <?php echo empty($_SESSION['cart']) ? 'true' : 'false'; ?>;
            var placeOrderButton = document.getElementById('placeOrderButton');
            if (cartIsEmpty) {
                placeOrderButton.disabled = true;
            }
        });
    </script>
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

<main class="content">
    <div class="container">
        <div class="info">
            <h1 style="text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3); position: sticky; top: 0; background: #8dd1fd; z-index: 1;">Order Summary</h1>
            <?php
            // Ensure $_SESSION['cart'] exists and is an array
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    ?>
                    <div class="item">
                        <img src="../IMAGES/<?php echo $value['product_image']; ?>" class="icon">
                        <p class="product_info"><?php echo $value['product_name']; ?></p>
                        <p class="product_price">Subtotal: <?php echo $value['product_quantity'] * $value['product_price'];?></p>

                        <form method="POST" action="cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                            <input type="number" name="product_quantity" style="width: 5%" value="<?php echo $value['product_quantity']; ?>" max="10">
                            <input type="submit" class="edit-btn" value="edit" name="edit_quantity">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                            <input type="submit"  class="remove-btn" name="remove_product" value="remove">
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo '<p>Your cart is empty.</p>';
            }
            ?>
            <div class="total">
                <p style="position: absolute; left: 0px; padding-left: 7px">Total:</p>
                <p style="padding-right: 7px"><?php echo $_SESSION['total']; ?></p>
            </div>
        </div>

        <div class="payment">
            <h1>Payment information</h1>
            <form method="POST" action="place_order.php">
                <div>
                    <input class="inputs" required type="text" name="name" id="usernameid" placeholder="user name">
                </div>
                <div>
                    <input class="inputs" required type="text" name="address" id="street" placeholder="Street, Area code">
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
                    <label for="cash"><i class="fa-solid fa-money-bill"></i></label>
                    <input class="radio" type="radio" value="Cash" name="payment_option" id="cash">
                    <label for="visa"><i class="fa-brands fa-cc-visa"></i></label>
                    <input class="radio" type="radio" value="Visa" name="payment_option" id="visa">
                    <label for="mastercard"><i class="fa-brands fa-cc-mastercard"></i></label>
                    <input class="radio" type="radio" value="Mastercard" name="payment_option" id="mastercard">
                </div>
                <div>
                    <input class="inputs" required type="text" name="card_number" id="cardnum" placeholder="Card number">
                </div>
                <div>
                    <input class="inputs" required type="month" name="order_date" id="expdate" placeholder="Expiry date">
                </div>
                <div>
                    <input class="inputs" required type="password" name="code" id="code" placeholder="Security code">
                </div>
                <div>
                    <input type="hidden" name="total_amount" value="<?php echo $_SESSION['total']; ?>">
                    <input type="submit" id="placeOrderButton" name="place_order" style="background-color: rgba(255, 222, 114, 0.92); border-radius: 15px; padding: 10px 30px 10px 30px" value="Place Order">
                </div>
            </form>
        </div>
    </div>
</main>

<footer>
    <p>&copy; 2024 Never Forget</p>
</footer>
<script src="../JS/slideshow.js"></script>
</body>
</html>