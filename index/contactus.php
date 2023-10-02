<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact US</title>
    <script src="https://kit.fontawesome.com/b7ad2a2652.js" crossorigin="anonymous"></script>

    <style>
        .container {
            position: relative;
        }

        .text-block {
            position: absolute;
            vertical-align: middle;
            width: 45%;
        }

        .text-block h1 {
            margin-top: 70px;
            font-size: 50px;
            font-weight: bold;
            text-align: center;
        }



        .img-block {
            position: absolute;
            width: 50%;
            height: 80%;
            left: 50%;
        }

        .para {
            position: absolute;
            line-height: 35px;
            display: table;
            width: 110%;
            box-shadow: 2px 2px 7px #cbcecf, -2px -2px 7px #ffffff;
        }

        .col {
            display: table-column;

        }

        .row {
            display: table-row;
        }

        .para p {
            display: table-cell;
            margin-right: 10px;
            padding-bottom: 20px;
        }

        .para i {
            color: #34D69F;
            text-align: center;
            font-size: xx-large;
            display: table-cell;
            padding: 20px 0px 20px 50px;

        }

        .footer {
            position: relative;
            margin-top: 40%;
        }
    </style>
</head>

<body>
    <?php require 'header.php' ?>
    <?php require 'navbar.php' ?>

    <div class="container">
        <div class="img-block">
            <img src="../Source/Images/contact-us.png" alt="About Us" style="width: 90%; float: left;" />
        </div>
        <div class="text-block">
            <h1>Contact Us</h1>
            <div class="para">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="row">

                    <div style="padding-left: 50px;"><i class="fas fa-map-marker-alt"></i></div>
                    <i class="fas fa-phone"></i>
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="row" style="text-align: center;">
                    <p>
                        42P, Ground Floor
                        <br />Liberty Plaza, 00300
                        <br />
                    </p>
                    <p style="padding-left: 50px;">
                        <abbr title="Phone"><b>Phone</b></abbr>: (123) 456-7890
                    </p>
                    <p style="text-decoration: none; padding-left: 50px;">
                        <abbr title="Email"><b>Email</b></abbr>:
                        <a href="mailto:name@example.com" style="color: #355D94;">contactus@graphex.com </a>
                    </p>
                </div>

            </div>
            <iframe style="position: static; margin:200px 0px 0px 50px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2917.6710891910816!2d79.85255772924964!3d6.912939753928066!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x141db277b60011d8!2sLiberty%20Plaza!5e0!3m2!1sen!2slk!4v1585615647258!5m2!1sen!2slk" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


        </div>
    </div>
    </div>
    </div>
    <div class="footer">
        <?php require 'footer.php' ?>
    </div>
</body>

</html>