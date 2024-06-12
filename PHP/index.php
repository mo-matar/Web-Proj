<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Online Shop</title>
    <link rel="stylesheet" href="../CSS/main%20style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../JS/backgroundScript.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<?php include('header.php');?>
<main style="padding-top: 75px" class="content">
    <div align="center">
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides fade">
                <div class="numbertext">1 / 4</div>
                <img src="../IMAGES/playstation-banner.png" style="width:100%; height: 500px;" >
                <div class="text"></div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 4</div>
                <img src="../IMAGES/ROG-Ally-2023-RC71L-banner-1.png" style="width:100%; height: 500px;">
                <div class="text"></div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <img src="../IMAGES/Wireless-Controller-banner.png" style="width:100%; height: 500px;">
                <div class="text"></div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 4</div>
                <iframe style="width:100%; height:500px"
                        src="https://www.youtube.com/embed/MXDb6pAnFBg?si=n2dXSa6nW0dvcQke"
                        title="YouTube video player" frameborder="0" allow="accelerometer; autoplay;
                        clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen ></iframe>
                <div class="text"></div>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

            <!-- The dots/circles -->
            <div class="dots" style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(4)"></span>
            </div>
        </div>
        <br>
        <!--   #############################################################################################     -->

        <div class="bottom-benefit-section">
            <div class="container">

                <div class="benefit-col">
                    <div class="ico-wrap">
                        <span class="material-symbols-outlined" style="padding-right: 10px">
                        workspace_premium
                        </span>
                    </div>
                    <div class="text-wrap" style="padding-left: 15px">
                        <strong class="title-text">كفالة مضمونة </strong>
                        <span>الكفالة  الرسمية للجميع المنتجات مضمونة </span>
                    </div>
                </div>

                <div class="benefit-col">
                    <div class="ico-wrap">
                        <span class="material-symbols-outlined">
                        payments
                        </span>
                    </div>
                    <div class="text-wrap" style="padding-left: 15px">
                        <strong class="title-text">الدفع نقدا عند التسليم</strong>
                        <span>يمكنك الدفع نقدا عند التسليم.</span>
                    </div>
                </div>

                <div class="benefit-col">
                    <div class="ico-wrap">
                    <span class="material-symbols-outlined">
                    acute
                    </span>
                    </div>
                    <div class="text-wrap" style="padding-left: 15px">
                        <strong class="title-text">توصيل سريع </strong>
                        <span>توصيل من يوم  الى ثلاثة ايام لجميع مناطق الضفة و القدس </span>
                    </div>
                </div>


            </div>
        </div>
        <!---->
        <table cellspacing="40px">
            <tr>
                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/cpu.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>PROCESSORS</h3>
                            <a href="products.php?category=CPU" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/gpu.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>GRAPHICS CARD</h3>
                            <a href="products.php?category=GPU" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/ram.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Memory</h3>
                            <a href="products.php?category=memory" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/motherboard.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Motherboard</h3>
                            <a href="products.php?category=motherboard" class="browse">Browse</a>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/power.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Power supply</h3>
                            <a href="products.php?category=powersupply" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/case.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Case</h3>
                            <a href="products.php?category=case" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/monitor.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Monitor</h3>
                            <a href="products.php?category=monitor" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/keyboard.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Keyboard</h3>
                            <a href="products.php?category=keyboard" class="browse">Browse</a>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/mouse.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Mouse</h3>
                            <a href="products.php?category=mouse" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/cooler.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Cpu cooler</h3>
                            <a href="products.php?category=cooler" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/harddrive.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Hard disk</h3>
                            <a href="products.php?category=hardDisk" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/ssd.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Ssd</h3>
                            <a href="products.php?category=memory" class="browse">Browse</a>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/headset.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Headset</h3>
                            <a href="products.php?category=headset" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/pcacc.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Computer accessories</h3>
                            <a href="products.php?category=accessories" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/laptop.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Laptop</h3>
                            <a href="products.php?category=laptop" class="browse">Browse</a>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="card">
                        <div class="imgBox">
                            <img src="../IMAGES/laptopacc.png" class="mouse">
                        </div>
                        <div class="contentBox">
                            <h3>Bags</h3>
                            <a href="products.php?category=bags" class="browse">Browse</a>
                        </div>
                    </div>
                </td>
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
