<?php
session_start();

// Generate a random CSRF token if it doesn't exist in the session
if (!isset($_SESSION['admin_csrf_token'])) {
    $_SESSION['admin_csrf_token'] = bin2hex(random_bytes(32)); // Generate a 256-bit random token
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin LogIn</title>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../source/JS/login.js"></script>
</head>

<body>

    <!-- show page header -->

    <?php require 'header.php' ?>

    <!-- admin login -->
    <div>
    <?php
    require 'connection.php';

    // Initialize the adminLoginerror key in the session if it doesn't exist
    if (!isset($_SESSION["adminLoginerror"])) {
        $_SESSION["adminLoginerror"] = "";
    }

    if (isset($_POST["adminLogin"])) {
        // Validate CSRF token
        if (!isset($_POST['admin_csrf_token']) || $_POST['admin_csrf_token'] !== $_SESSION['admin_csrf_token']) {
            $_SESSION["adminLoginerror"] = "CSRF Token Validation Failed. Please try again.";
            header('Location: adminLogin.php');
            exit();
        }

        $username = $_POST["txtEmail"];
        $password = $_POST["txtPassword"];

        $sql = "SELECT * FROM `admin` WHERE `adminUsername`='" . $username . "' and `adminPassword`='" . $password . "'";

        // Remove the line where you initialize the session variable, as it's already initialized above
        // $_SESSION["adminLoginerror"] = "";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION["adminsUsername"] = $username;
            header('Location: product_dashboard.php');
            mysqli_close($conn);
        } else {
            $_SESSION["adminLoginerror"] = "Username or Password Does not match";
        }
    }
    ?>
    </div>
    <br>
    <br><br>

    <div id="signupContainer">
        <div id="title">
            <h2>Admin Login</h2>
        </div>

        <form id="form2" name="form2" method="post" action="adminLogin.php">
            <div id="form">
                <input type="hidden" name="admin_csrf_token" value="<?php echo $_SESSION['admin_csrf_token']; ?>">
                <p class="formLable">Email</p>
                <input class="inputField" type="text" name="txtEmail" id="txtEmail" /><br>
                <p class="formLable">Password</p>
                <input class="inputField" type="password" name="txtPassword" id="txtPassword" /><br>
                <input id="btnSubmit" type="submit" name="adminLogin" value="Login" />

            </div>
        </form>
    </div>
    <div style="text-align: center; font-size: 12px; margin-top: -20px;">
        <label id="vEmail"></label>
        <label id="vPassword"></label>
    </div>
    <span id="validatuser"><?php echo "<p style='color:red; text-align:center;'>" . $_SESSION["adminLoginerror"] . "</p>";  ?></span>
    <iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
</body>

</html>