<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <style>
        .fcontainer {
            background-color: #05B698;
            color: white;
            margin-top: 40px;
        }

        .fcontainer a {
            color: white;
        }

        .ftable {
            display: table;
            width: 100%;
        }

        .frow {
            display: table-row;
        }

        .fcol1 {
            display: table-column;
            margin: 10px 20px 10px 20px;
            width: 20%;
        }

        .fcol2 {
            display: table-column;
            margin: 10px 20px 10px 20px;
            width: 40%;
        }

        .fcol3 {
            display: table-column;
            margin: 10px 20px 10px 20px;
            width: 40%;
        }

        .flogo {
            padding: 0px 0px 0px 0px;
            display: table-cell;
            vertical-align: middle;
            width: fit-content;
        }

        .flinks {
            padding: 10px 20px 10px 20px;
            display: table-cell;
            vertical-align: middle;
        }

        .fcontact {
            padding: 10px 20px 10px 20px;
            display: table-cell;
            vertical-align: middle;
            list-style: none;
        }

        .fcontact a {

            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="fcontainer">
        <div class='ftable'>
            <div class='fcol1'></div>
            <div class='fcol2'></div>
            <div class='fcol3'></div>
            <div class='frow'>
                <div class='flogo'>
                    <img src='../source/Images/footerlogo.png' width='100%'>
                </div>
                <div class='flinks' style="padding-left: 8%;">
                    <div class="frow">
                        <div class="flinks">
                            <p>
                                <abbr title="Email"><b>Address</b></abbr>:<br>
                                42P, Ground Floor
                                <br />Liberty Plaza, 00300
                                <br />
                            </p>
                        </div>
                        <div class="flinks">
                            <p style="padding-left: 50px;">
                                <abbr title="Phone"><b>Phone</b></abbr>: (123) 456-7890
                            </p>
                            <p style="text-decoration: none; padding-left: 50px;">
                                <abbr title="Email"><b>Email</b></abbr>:
                                <a href="mailto:name@example.com">contactus@graphex.com </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class='fcontact' style="padding-left: 10%;">
                    <div class=" frow">
                        <div class="fcontact" style="width: 50%;">
                            <li style="margin-bottom: 8px;"><a href=" index.php">Home</a></li>
                            <li style="margin-bottom: 8px;"><a href=" products.php">Products</a></li>

                            <li style="margin-bottom: 8px;"><a href=" showCart.php">Cart</a>
                        </div>
                        <div class="fcontact" style="width: 50%;">
                            <li style="margin-bottom: 2px;"><a href="aboutus.php">About Us</a></li>
                            <li style="margin-bottom: 2px;"><a href="contactus.php">Contact Us</a></li>
                            <li style="margin-bottom: 2px;"><a href="privacy.php">Privacy & Policy</a></li>
                            <li style="margin-bottom: 2px;"><a href="terms.php">Terms & Conditions</a></li>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

</body>

</html>