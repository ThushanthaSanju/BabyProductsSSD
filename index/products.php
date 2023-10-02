<?php session_start();
require("connection.php");
include("functions.php");
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
    <div class="product_desc" style="
        padding: 20px;
        margin: 50px;
        display: table-row;

        ">
        <?php

        if (!isset($_GET['cat'])) {

            echo "

            <div class='box' style='padding:20px; margin-left:50px; margin-top:40px; margin-right:20px; border-radius:10px;   box-shadow: 5px 5px 7px #cbcecf, -5px -5px 7px #ffffff;'>
                <h1>All Products</h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo deleniti accusamus, consequuntur illum quasi ut. Voluptate a, ipsam repellendus ut fugiat minima? Id facilis itaque autem, officiis veritatis perferendis, quaerat!
                </p>
            </div>

            ";
        } else {
            echo "
            <div class='products'>
            ";
            getpcatpro();

            echo "</div>";
        }



        ?>
    </div>

    <div class="products">
        <?php
        if (!isset($_GET['cat'])) {
            add_cart();
            getPro();
        } ?>
    </div>

    <?php require 'footer.php' ?>
</body>

</html>