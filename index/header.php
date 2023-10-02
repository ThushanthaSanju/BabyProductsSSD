<head>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />

</head>

<div id="wrapper">
    <div id="header">
        <div id="subheader">
            <div class="container">
                <p>Welcome to Shan Baby Shop</p>

                <a href="adminLogin.php">Admin Log</a>

                <?php
                if (!isset($_SESSION['userEmail'])) {
                    echo '<a href="login.php">Login</a>';
                    echo '<a href="signUp.php">Sign Up</a>';
                } else {
                    echo '<a href="logout.php">Logout</a>';
                    echo '<a href="customerprofile.php">Profile</a>';
                }
                ?>

            </div>
        </div>

        <div id="mainheader">
            <div id="logo">
                <a href="index.php"><img id="logofile" src="../source/images/logo.png"></a>
            </div>
        </div>
    </div>
</div>