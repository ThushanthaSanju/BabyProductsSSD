<?php
session_start();

// Generate a random CSRF token if it doesn't exist in the session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a 256-bit random token
}

require("connection.php");
include("functions.php");

function sanitizeInput($input) {
    // Use htmlspecialchars to convert special characters to HTML entities
    return htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
}

if (isset($_GET['pro_id'])) {
    $product_id = sanitizeInput($_GET['pro_id']);

    // Use prepared statements to prevent SQL injection
    $get_product = "SELECT * FROM product WHERE productID=?";
    $stmt = mysqli_prepare($conn, $get_product);
    mysqli_stmt_bind_param($stmt, "s", $product_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row_product = mysqli_fetch_array($result)) {
        $pro_title = sanitizeInput($row_product['productName']);
        $pro_price = sanitizeInput($row_product['unitPrice']);
        $pro_desc = sanitizeInput($row_product['description']);
        $pro_img = sanitizeInput($row_product['imageLocation']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link href="../source/css/navbar.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/insertProduct.css" rel="stylesheet" type="text/css" />
    <link href="../source/css/styleProduct.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php require 'header.php' ?>
    <?php require 'navbar.php' ?>
    <div class="cat_panel">
        <div class="cat_title">
            <h3>Product Categories</h3>
        </div>
        <div class="cat_body">
            <ul>
                <li>
                    <a class='Ctitle' href="products.php"> All Products </a>
                </li>
                <?php getCat(); ?>
            </ul>
        </div>
    </div>

    <div class="tble" style="display: table; padding-left: 40px; padding-top: 50px;">
        <div class="row" style="display: table-row;">
            <div class="img" style="
                display: table-cell; width:60%; 
                margin-left: 50px;">
                <img style="
                width: 100%;" src="../source/Images/product_images/<?php echo $pro_img; ?>">
            </div>
            <div class="details" style="
                display: table-cell;  ">
                <div class="box" style="margin-bottom: 50px; width:40%; padding: 50px; vertical-align: middle; float:left; margin-left: 120px; text-align: center; 
                box-shadow: 5px 5px 7px #cbcecf, -5px -5px 7px #ffffff; border-radius: 10px; ">
                    <h3 style="padding-bottom: 20px"> <?php echo $pro_title; ?></h3>

                    <?php add_cart(); ?>

                    <form method="post" action="productDetail.php?add_cart=<?php echo $product_id; ?>" class="form">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <label style="font-size: 18px;">Product Quantity</label><br><br>
                        <input name="quantity" type="text" value="1" style="text-align: center;" required>
                        <p class="price">RS: <?php echo $pro_price; ?></p>
                        <input name="submit" value="Add to Cart" type="submit" class="btn">
                    </form>
                </div>
            </div>
        </div>
        <div class="row" style="display: table-row;">
            <div class="details" style="display: table-cell;">
                <h3>Product Description</h3>
                <p> <?php echo $pro_desc; ?></p>
            </div>
        </div>
    </div>

    <?php require 'footer.php' ?>
</body>

</html>
