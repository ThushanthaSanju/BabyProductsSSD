<?php session_start();
require("connection.php");
include("functions.php");
?>

<?php

if (isset($_GET['pro_id'])) {

    $product_id = $_GET['pro_id'];

    $get_product = "select * from product where productID='$product_id'";

    $run_product = mysqli_query($conn, $get_product);

    $row_product = mysqli_fetch_array($run_product);

    $pro_title = $row_product['productName'];

    $pro_price = $row_product['unitPrice'];

    $pro_desc = $row_product['description'];

    $pro_img = $row_product['imageLocation'];
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
            <h3>
                Product Categories
            </h3>
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

    <div class="tble" style="display: table;  padding-left: 40px; padding-top: 50px;">
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