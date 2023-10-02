<?php
include_once 'connection.php';
if (isset($_SESSION['userEmail'])) {
    $userEmail = $_SESSION['userEmail'];

    $cart_query = "select * from cart where userEmail='$userEmail'";

    $run_cart = mysqli_query($conn, $cart_query);

    $cart_qty = mysqli_num_rows($run_cart);
} else {
    $cart_qty = 0;
}
?>

<head>
    <link href="../source/css/navbar.css" rel="stylesheet" type="text/css" />
</head>
<header>
    <div class="container">



        <nav style="display: table">

            <ul style="display: table-cell;">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contactus.php">Contact Us</a></li>
                <li><a href="showCart.php">Cart</a>
                    <?php echo $cart_qty; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>