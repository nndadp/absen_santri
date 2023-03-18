<?php
    include 'library/function.php';
    $db = new main($conn);
    $db->login();
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pondok Pesantren AL-IKROM</title>
    <link rel="stylesheet" href="css/css/solid.css">
    <link rel="stylesheet" href="css/log.in.css">
    <link rel="stylesheet" href="css/css/fontawesome.css">
    <link rel="stylesheet" href="css/css2/bootstrap.css">
    <script src="css/js/solid.js"></script>
    <script src="css/js/fontawesome.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&family=Pushster&display=swap" rel="stylesheet">
</head>
<body>
    <section class="login py-5 bg-light">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5" style="background-image: url(img/hiya.png); height: 440px;">
                </div>
                <div class="col-lg-7 text-center py-5">
                    <h1>Login</h1>
                    <form action="" name="login" method="post">
                        <div class="form-row py-3 pt-5">
                            <div class="offset-1 col-lg-10">
                                <input type="text" name="user" class="inp px-3" placeholder="Masukkan Username">
                            </div>
                            <div class="form-row py-3">
                                <div class="offset-1 col-lg-10">
                                    <input type="password" class="inp px-3" name="pass" placeholder="Masukkan Password" id="">
                                </div>
                            </div>
                            <div class="form-row py-5">    
                                <div class="offset-1 col-lg-10">
                                    <input type="submit" value="Login" name="login" class="btn1">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="css/js/bootstrap.bundle.js"></script>
</body>
</html>