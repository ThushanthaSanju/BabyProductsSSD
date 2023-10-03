<?php
header('X-Content-Type-Options: nosniff');
header_remove('X-Powered-By');
session_start();
include('functions.php');

if (!isset($_SESSION["loginerror"])) {
    $_SESSION["loginerror"] = "";
}

if (isset($_POST['create'])) {
    // Get user input and sanitize it
    $txtfName = filter_input(INPUT_POST, 'txtfName', FILTER_SANITIZE_STRING);
    $txtlName = filter_input(INPUT_POST, 'txtlName', FILTER_SANITIZE_STRING);
    $txtPhone = filter_input(INPUT_POST, 'txtPhone', FILTER_SANITIZE_STRING);
    $txtAddress = filter_input(INPUT_POST, 'txtAddress', FILTER_SANITIZE_STRING);
    $txtCity = filter_input(INPUT_POST, 'txtCity', FILTER_SANITIZE_STRING);
    $txtPostal = filter_input(INPUT_POST, 'txtPostal', FILTER_SANITIZE_STRING);
    $txtCountry = filter_input(INPUT_POST, 'txtCountry', FILTER_SANITIZE_STRING);
    $txtEmail = filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_EMAIL);
    $txtPassword = $_POST['txtPassword'];
    $txtCPassword = $_POST['txtCPassword'];

    $hashedPassword = password_hash($txtPassword, PASSWORD_DEFAULT);

    try {
        $pdo = new PDO('mysql:host=localhost:3306;dbname=shanbaby', 'root', '');
        
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query with placeholders
        $sql = "INSERT INTO customers (first_name, last_name, phone, address, city, postal_code, country, email, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(1, $txtfName, PDO::PARAM_STR);
        $stmt->bindParam(2, $txtlName, PDO::PARAM_STR);
        $stmt->bindParam(3, $txtPhone, PDO::PARAM_STR);
        $stmt->bindParam(4, $txtAddress, PDO::PARAM_STR);
        $stmt->bindParam(5, $txtCity, PDO::PARAM_STR);
        $stmt->bindParam(6, $txtPostal, PDO::PARAM_STR);
        $stmt->bindParam(7, $txtCountry, PDO::PARAM_STR);
        $stmt->bindParam(8, $txtEmail, PDO::PARAM_STR);
        $stmt->bindParam(9, $hashedPassword, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        // Redirect the user to a success page or perform any other necessary actions
        header("Location: success.php");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shan Baby Products</title>
    <link href="../source/css/style.css" rel="stylesheet" type="text/css" />
    <script src="../source/JS/signup.js"></script>
</head>

<body>
    <?php require 'header.php' ?>
    <br>
    <br><br>

    <div id="signupContainer">
        <div id="title">
            <h2>Sign Up</h2>
            <p>If you already have an account <a href="login.php">Login</a></p>
        </div>
        <?php addCustomer() ?>
        <form id="form1" name="form1" method="post" action="signUp.php" onsubmit="return validateSignUp()">
            <div id="form">
                <p class="formLable">First Name</p>
                <input class="inputField" type="text" name="txtfName" id="txtfName" /><br>
                <p class="formLable">Last Name</p>
                <input class="inputField" type="text" name="txtlName" id="txtlName" /><br>
                <p class="formLable">Phone Number</p>
                <input class="inputField" type="text" name="txtPhone" id="txtPhone" /><br>
                <p class="formLable">Address</p>
                <input class="inputField" type="text" name="txtAddress" id="txtAddress" /><br>
                <p class="formLable">City</p>
                <input class="inputField" type="text" name="txtCity" id="txtCity" /><br>
                <p class="formLable">Postal Code</p>
                <input class="inputField" type="text" name="txtPostal" id="txtPostal" /><br>
                <p class="formLable">Country</p>
                <input class="inputField" type="text" name="txtCountry" id="txtCountry" /><br>
                <p class="formLable">Email</p>
                <input class="inputField" type="text" name="txtEmail" id="txtEmail" /><br>
                <p class="formLable">Password</p>
                <input class="inputField" type="password" name="txtPassword" id="txtPassword" /><br>
                <p class="formLable">Confirm Password</p>
                <input class="inputField" type="password" name="txtCPassword" id="txtCPassword" /><br>

                <input id="btnSubmit" type="submit" name="create" value="Sign Up" />
                <input type="reset" name="btnReset" id="btnReset" value="Reset" />

            </div>
        </form>
    </div>
    <iframe name="hiddenFrame" width="0" height="0" style="display: none;"></iframe>
    <div id="errors">
        <label id="fnameErro"></label>
        <label id="lnameErro"></label>
        <label id="phoneErro"></label>
        <label id="addrErro"></label>
        <label id="cityErro"></label>
        <label id="countryErro"></label>
        <label id="postalErro"></label>
        <label id="emailErro"></label>
        <label id="pwdErro"></label>
        <label id="rePwdErro"></label>
    </div>
</body>

</html>
