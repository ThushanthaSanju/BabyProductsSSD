<?php
session_start();
if (!isset($_SESSION["loginerror"])) {
    $_SESSION["loginerror"] = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../source/JS/login.js"></script>
</head>

<body>
    <div>
        <?php
        require 'connection.php';
        if (isset($_POST["login"])) {
            $email = $_POST["txtEmail"];
            $password = $_POST["txtPassword"];

            // Use prepared statements and parameterized queries to prevent SQL injection
            $sql = "SELECT password FROM `customer` WHERE `email`=?";
            $_SESSION["loginerror"] = "";

            // Prepare the SQL statement
            $stmt = mysqli_prepare($conn, $sql);

            // Bind parameters
            mysqli_stmt_bind_param($stmt, "s", $email);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Store the result
            mysqli_stmt_bind_result($stmt, $hashedPassword);

            if (mysqli_stmt_fetch($stmt)) {
                // Verify the hashed password
                if (password_verify($password, $hashedPassword)) {
                    $_SESSION["userEmail"] = $email;
                    header('Location:index.php');
                } else {
                    $_SESSION["loginerror"] = "Username or Password Does not match";
                }
            } else {
                $_SESSION["loginerror"] = "Username or Password Does not match";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
        }
        ?>
    </div>

    <?php require 'header.php' ?>
    <br>
    <br><br>

    <div id="signupContainer">
        <div id="title">
            <h2 style="color: red;;">Login</h2>
            <p>If you don't have an account <a href="signUp.php">Sign Up</a></p>
        </div>

        <form id="form2" name="form2" method="post" action="login.php" onsubmit="return validateLogin()">
            <div id="form">
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
    <span id="validatuser"><?php echo "<p style='color:red; text-align:center;'>" . $_SESSION["loginerror"] . "</p>";  ?></span>
    <iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
</body>

</html>
