<?php
session_set_cookie_params(0);
session_start();
$_SESSION['product_id']='';
$flag=0;
include('../PHP/get_all_products_from_db.php');
$product_count = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Product Page - Admin HTML Template</title>
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
</head>

<body id="reportsPage">
<nav class="navbar navbar-expand-xl">
    <div class="container h-100">
        <a class="navbar-brand" href="admin_index.php">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
        </a>
        <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="fas fa-bars tm-nav-icon"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
                <li class="nav-item">
                    <a class="nav-link" href="admin_index.php">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="far fa-file-alt"></i>
                        <span> Reports <i class="fas fa-angle-down"></i> </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Daily Report</a>
                        <a class="dropdown-item" href="#">Weekly Report</a>
                        <a class="dropdown-item" href="#">Yearly Report</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="admin_products.php">
                        <i class="fas fa-shopping-cart"></i> Products
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin_accounts.php">
                        <i class="far fa-user"></i> Accounts
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        role="button"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span> Settings <i class="fas fa-angle-down"></i> </span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Billing</a>
                        <a class="dropdown-item" href="#">Customize</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link d-block" href="../PHP/login.php">
                        Admin, <b>Logout</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div style="height: 500px"   class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                        <tr>
                            <th scope="col">&nbsp;</th>
                            <th scope="col">PRODUCT NAME</th>
                            <th scope="col">PRICE</th>
                            <th scope="col">IN STOCK</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
//                        global $featured_products;
                        while ($row = $featured_products->fetch_assoc()) {
                            ?>
                            <tr>
                                <th scope="row"><input type="checkbox" /></th>
                                <td class="tm-product-name"><?php echo $row['name']; ?></td>
                                <td class="hidden" style="display: none"><?php echo $row['product_id']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td><?php echo $row['stock_quantity']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td>
                                    <a href="#" class="tm-product-delete-link row-anchor">
                                        <i class="far fa-trash-alt tm-product-delete-icon">
                                        </i>
                                    </a>
                                </td>
                            </tr>
                            <?php
                            // Increment product count
                            $product_count++;
                        }


                        ?>
<!--                        <tr>-->
<!--                            <th scope="row"><input type="checkbox" /></th>-->
<!--                            <td class="tm-product-name">Lorem Ipsum Product 11</td>-->
<!--                            <td>2,000</td>-->
<!--                            <td>400</td>-->
<!--                            <td>21 Jan 2019</td>-->
<!--                            <td>-->
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
<!--                            </td>-->
<!--                        </tr>-->
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <a
                    href="admin_add-product.php"
                    class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
<!--                <button class="btn btn-primary btn-block text-uppercase">-->
<!--                    Delete selected products-->
<!--                </button>-->
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                <h2 class="tm-block-title">Product Categories</h2>
                <div class="tm-product-table-container">
                    <table class="table tm-table-small tm-product-table">
                        <tbody>
                        <tr class="category-row" data-category="CPU">
                            <td class="tm-product-name">Processor</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="GPU">
                            <td class="tm-product-name">Graphic Card</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="memory">
                            <td class="tm-product-name">Memory</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="motherboard">
                            <td class="tm-product-name">Motherboard</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="powersupply">
                            <td class="tm-product-name">Power Supply</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="case">
                            <td class="tm-product-name">Case</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="monitor">
                            <td class="tm-product-name">Monitor</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="keyboard">
                            <td class="tm-product-name">Keyboard</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="mouse">
                            <td class="tm-product-name">Mouse</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="cooler">
                            <td class="tm-product-name">CPU Cooler</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="hardDisk">
                            <td class="tm-product-name">Hard Disk</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="ssd">
                            <td class="tm-product-name">SSD</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="headset">
                            <td class="tm-product-name">Headset</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="accessories">
                            <td class="tm-product-name">Computer Accessories</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="laptop">
                            <td class="tm-product-name">Laptop</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>
                        <tr class="category-row" data-category="bags">
                            <td class="tm-product-name">Bags</td>
                            <td class="text-center">
<!--                                <a href="#" class="tm-product-delete-link">-->
<!--                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>-->
<!--                                </a>-->
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <button id="showAllProducts" class="btn btn-primary btn-block text-uppercase mb-3">
                    Show All Products
                </button>
<!--                <button class="btn btn-primary btn-block text-uppercase mb-3">-->
<!--                    Add new category-->
<!--                </button>-->
            </div>
        </div>
    </div>
</div>
<footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved.

            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
    </div>
</footer>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script>
    $(function() {
        $(".tm-product-name").on("click", function() {
            // window.location.href = "admin_edit-product.php";
        });
    });
</script>
 <form id="hiddenForm" action="admin_edit-product.php" method="post" style="display: none;">
    <input type="hidden" name="hiddenValue" id="hiddenInput">
</form>
 <form id="hiddenForm2" action="../PHP/delete_product.php" method="post" style="display: none;">
    <input type="hidden" name="hiddenValue2" id="hiddenInput2">
</form>

<script>
    document.querySelectorAll('table tbody tr').forEach(row => {
        // Handle click on the anchor within each row
        const anchor = row.querySelector('.row-anchor');
        anchor.addEventListener('click', (event) => {
            // event.preventDefault(); // Prevent the default anchor behavior (e.g., navigating to a new page)
            event.stopPropagation(); // Stop the event from propagating to the row

            const hiddenValue = row.querySelector('.hidden').textContent;
            document.getElementById('hiddenInput2').value = hiddenValue;
            document.getElementById('hiddenForm2').submit(); // Submit the hiddenForm2
        });

        // Handle click on the rest of the row
        row.addEventListener('click', () => {
            const hiddenValue = row.querySelector('.hidden').textContent;
            document.getElementById('hiddenInput').value = hiddenValue;
            document.getElementById('hiddenForm').submit(); // Submit the otherForm
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listeners to category rows
        document.querySelectorAll('.category-row').forEach(categoryRow => {
            categoryRow.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default behavior of the anchor link if any

                // Get the clicked category from data attribute
                const clickedCategory = categoryRow.dataset.category;

                // Loop through product table rows
                document.querySelectorAll('.tm-product-table tbody tr').forEach(productRow => {
                    const productCategory = productRow.querySelector('td:nth-child(5)').textContent; // Adjust this selector based on your table structure

                    // Check if product category matches clicked category
                    if (productCategory !== clickedCategory) {
                        productRow.style.display = 'none'; // Hide rows that don't match
                    } else {
                        productRow.style.display = ''; // Show rows that match
                    }
                });
            });
        });

        // Reset function to show all products
        function resetProductTable() {
            document.querySelectorAll('.tm-product-table tbody tr').forEach(productRow => {
                productRow.style.display = ''; // Show all rows
            });
        }

        // Add click event listener to 'Show All' button (assuming you have one)
        document.getElementById('showAllProducts').addEventListener('click', function() {
            resetProductTable(); // Call the function to show all products
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add click event listeners to category rows
        document.querySelectorAll('.category-row').forEach(categoryRow => {
            categoryRow.addEventListener('click', (event) => {
                event.preventDefault(); // Prevent default behavior of the anchor link if any

                // Get the clicked category from data attribute
                const clickedCategory = categoryRow.dataset.category;

                // Loop through product table rows
                document.querySelectorAll('.tm-product-table tbody tr').forEach(productRow => {
                    const productCategory = productRow.querySelector('td:nth-child(6)').textContent; // Adjust this selector based on your table structure

                    // Check if product category matches clicked category
                    if (productCategory !== clickedCategory) {
                        productRow.style.display = 'none'; // Hide rows that don't match
                    } else {
                        productRow.style.display = ''; // Show rows that match
                    }
                });
            });
        });

        // Reset function to show all products
        function resetProductTable() {
            document.querySelectorAll('.tm-product-table tbody tr').forEach(productRow => {
                productRow.style.display = ''; // Show all rows
            });
        }

        // Add click event listener to 'Show All' button
        document.getElementById('showAllProducts').addEventListener('click', function() {
            resetProductTable(); // Call the function to show all products
        });
    });
</script>


</body>
</html>