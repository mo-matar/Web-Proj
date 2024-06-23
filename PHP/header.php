<?php  ?>

<header>
    <h1>

        <div class="navbar">
            <div>

                <a class="#" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                <a href="search.php"><i class="fa fa-fw fa-search"></i> Search</a>
                <div class="dropdown" style="display: inline">
                    <a href="#" class="categories">
                        <i class="fa fa-bars" aria-hidden="true"></i> Categories
                    </a>
                    <div class="content_dorpdown">
                        <a href="products.php?category=CPU">Processors</a>
                        <a href="products.php?category=GPU">Graphic Cards</a>
                        <a href="products.php?category=memory">Memory</a>
                        <a href="products.php?category=motherboard">Motherboard</a>
                        <a href="products.php?category=powersupply">Power Supply</a>
                        <a href="products.php?category=case">Case</a>
                        <a href="products.php?category=monitor">Monitor</a>
                        <a href="products.php?category=keyboard">Keyboard</a>
                        <a href="products.php?category=mouse">Mouse</a>
                        <a href="products.php?category=cooler">Cpu Cooler</a>
                        <a href="products.php?category=hardDisk">Hard Disk</a>
                        <a href="products.php?category=ssd">SSD</a>
                        <a href="products.php?category=headset">Headset</a>
                        <a href="products.php?category=accessories">Computer Accessories</a>
                        <a href="products.php?category=laptop">Laptop</a>
                        <a href="products.php?category=bags">Bags</a>
                    </div>
                </div>
                <!--                to do : make user go to login if they clicked on cart or other things and they aren't logged in-->
                <a target="_blank" href="https://www.facebook.com"><i class="fa fa-fw fa-envelope"></i> Contact</a>
                <a class="#" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a>
                <?php if (isset($_SESSION["logged_in"])):
                    ?>
                    <a style="justify-self: end" href="account.php"><i class="fa fa-fw fa-user"></i> Account</a>
                    <a style="justify-self: end" href="login.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
                <?php else: ?>
                    <a style="justify-self: end" href="../PHP/login.php" target="_self"><i class="fa fa-fw fa-sign-in"></i> Login</a>
                <?php endif; ?>
            </div>
            <div id="test"></div>
            <!--        <div>-->
            <!--            <img id="may god bless america" src="../IMAGES/logo.png">-->
            <!--        </div>-->
        </div>
    </h1>
</header>
