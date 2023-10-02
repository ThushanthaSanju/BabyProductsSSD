<div id="wrapper">
        <div id="header">
            <div id="subheader">
                <div class="container">
                  
                    <?php
                    if (isset($_SESSION['adminsUsername'])) {
                        echo '<a href="logout.php">Logout</a>';
                        echo '<a href="product_dashboard.php">Dashboard</a>';
                        echo '<a href="product_View.php">View Product</a>';
                        echo '<a href="order_View.php">View Order</a>';
                        echo '<a href="category_View.php">View Category</a>';
                        echo '<a href="customer_View.php">View Customer</a>';
                        echo '<a href="product_Insert.php">Add Product</a>';
                        echo '<a href="category_Insert.php">Add Category</a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
