<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About US</title>

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
      font-size: 70px;
      font-weight: bold;
    }

    .text-block h2 {
      text-align: left;
      margin-bottom: -40px;
      margin-top: 100px;
      font-weight: 600;
      font-size: 30px;
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
      <img src="../Source/Images/aboutus.png" alt="About Us" style="width: 90%; float: left;" />
    </div>
    <div class="text-block">
      <h2>Hello!</h2>
      <h1>About Us</h1>
      <div class="para">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur recusandae tempore odio iusto omnis asperiores obcaecati similique, quod magnam laborum quia, ea quasi reiciendis molestias maxime vero possimus sapiente voluptatum! Vitae fugiat, aliquam, voluptates vero praesentium inventore eligendi, sed a deserunt dolore ipsa delectus nulla. Odio tenetur consequuntur reprehenderit molestiae est saepe sint, sed vel maiores optio corrupti officia illum, placeat nihil rem aliquam modi esse exercitationem repellat dolore porro! Ex vero fugiat officia repellendus. Molestiae aliquam illum alias eos consectetur illo possimus praesentium voluptas laboriosam ipsum, architecto ea quia consequatur provident itaque magni repudiandae expedita voluptatibus nisi deleniti optio!</p>
      </div>
    </div>
  </div>
  <div class="footer">
    <?php require 'footer.php' ?>
  </div>
</body>

</html>