<?php
session_start();

// Generate a random CSRF token if it doesn't exist in the session
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a 256-bit random token
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../source/JS/login.js"></script>
</head>

<body>
    <div>
        <?php
        require 'connection.php';

        // Check if the CSRF token in the form matches the one in the session
        if (isset($_POST["login"])) {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                $_SESSION["loginerror"] = "CSRF Token Validation Failed. Please try again.";
                header('Location: login.php');
                exit();
            }

            $email = $_POST["txtEmail"];
            $password = $_POST["txtPassword"];

            // Prepare the SQL statement with placeholders
            $sql = "SELECT * FROM `customer` WHERE `email`=? AND `password`=?";
            
            $_SESSION["loginerror"] = ""; // Initialize the session variable
            
            // Prepare the SQL statement
            $stmt = mysqli_prepare($conn, $sql);

            // Check for a prepare error
            if ($stmt === false) {
                die('Error: ' . mysqli_error($conn));
            }

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ss", $email, $password);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Store the result
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                $_SESSION["userEmail"] = $email;
                header('Location: index.php');
                mysqli_close($conn);
            } else {
                $_SESSION["loginerror"] = "Username or Password Does not match";
            }
        }
        ?>

    </div>

    <?php require 'header.php' ?>
    <br>
    <br><br>

    <div id="signupContainer">
        <div id="title">
            <h2 style="color: red;">Login</h2>
            <p>If you don't have an account <a href="signUp.php">Sign Up</a></p>
           
        </div>
        <a href="../callback.php">Login with Google</a>
        <form id="form2" name="form2" method="post" action="login.php" onsubmit="return validateLogin()">
            <div id="form">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <p class="formLable">Email</p>
                <input class="inputField" type="text" name="txtEmail" id="txtEmail" /><br>
                <p class="formLable">Password</p>
                <input class="inputField" type="password" name="txtPassword" id="txtPassword" /><br>
                <input id="btnSubmit" type="submit" name="login" value="Login" onclick="validateLogin()" />
            </div>
        </form>
    </div>
    <div style="text-align: center; font-size: 12px; margin-top: -20px;">
        <label id="vEmail"></label>
        <label id="vPassword"></label>
    </div>
    <!-- Check if the "loginerror" key exists in the session before displaying it -->
    <span id="validateUser"><?php echo isset($_SESSION["loginerror"]) ? "<p style='color:red; text-align:center;'>" . $_SESSION["loginerror"] . "</p>" : ""; ?></span>
    <iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
</body>

</html>
