<?php session_start();
include("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shan Baby Products</title>
  <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
  <link href="../source/css/styleProduct.css?version=51" rel="stylesheet" type="text/css" />

  <link href="../source/css/imgSlider.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php require 'header.php' ?>

  <?php require 'navbar.php' ?>
  <div id="slider">
    <figure>
      <img src="../source/images/slide1.png">
      <img src="../source/images/slide2.png">
      <img src="../source/images/slide3.png">
      <img src="../source/images/slide4.png">
      <img src="../source/images/slide5.png">
    </figure>
  </div>
  <div style="
  margin: 50px 0px 50px 0px;
  text-align: center;
  padding-top: 10px;
  padding-bottom: 60px;
  font-size: 40px;
  color: #05b698;
  height: 70px;
  background-color: #ffffff;
  border-top-color: #05b698;
  border-bottom-color: #05b698;">
    <p>Our Latest Products</p>
  </div>
  <?php getPro(); ?>
  <?php require 'footer.php' ?>
</body>

</html>