<?php
require 'functions.php';
session_start();

// Generate a random CSRF token if it doesn't exist in the session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a 256-bit random token
}
?>


<!-- check if there is an user session -->
<?php
if (!isset($_SESSION['userEmail'])) {
    echo "<script>alert('You Have to login first')</script>";
    echo "<script>window.open('login.php','_self')</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="../source/css/cart.css" rel="stylesheet" type="text/css" />
    <!-- Content Security Policy (CSP) meta tag -->
    <meta http-equiv="Content-Security-Policy" content="script-src 'self' https://kit.fontawesome.com">
    
    <!-- Font Awesome with Subresource Integrity (SRI) -->
    <script src="https://kit.fontawesome.com/b7ad2a2652.js" crossorigin="anonymous" integrity="sha384-ABCDEF123456"></script>
    <script src="../source/JS/profileUpdate.js"></script>
</head>

<body>

    <!-- Show header and nav bar -->
    <?php require 'header.php' ?>
    <?php require 'navbar.php' ?>
    <!-- End header and nav bar -->

    <h1 style="text-align:center;">My Accoount</h1>

    <div id="cart" style="width: 50%;">

        <?php getProfile() ?>

    </div>


    <?php require 'footer.php' ?>
</body>

</html>