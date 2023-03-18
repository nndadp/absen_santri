<?php
include 'library/function.php';
$db = new main($conn);
$db->is_loggedin();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman admin</title>
    <link rel="stylesheet" href="css/css/all.css">
    <link rel="stylesheet" href="css/css/solid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/css/fontawesome.css">
    <link rel="stylesheet" href="css/css2/bootstrap.css">
    <script src="css/js/all.js"></script>
    <script src="css/js/solid.js"></script>
    <script src="css/js/fontawesome.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function () {
            $('#icon').click(function () {
                $('ul').toggleClass('show');
            });
        });
    </script>
</head>
<body>
    <nav>
        <div class="col logo">
            <img src="img/icon.png" style="height:45px; width: 45px">
            <label for="">WISAGA</label>
        </div>
        <ul>
            <li><a href="?menu=home">Home</a></li>
            <li><a href="?menu=absen">Absen</a></li>
            <li><a href="?menu=tambahadmin">Account</a></li>
            <li><a href="?menu=hafalan">Hafalan</a></li>
            <li><a href="?menu=logout" onclick="return confirm('Logout?')">Log Out</a></li>
        </ul>
        <label id="icon" for="">
            <i class="fas fa-bars"></i>
        </label>
    </nav>
    <section>
        
    </section>
</body>
</html>
<?php
        $menu = @$_GET['menu'];

        switch ($menu) {
            case 'absen':
                include 'home/absen.php';
                break;

            case 'hafalan':
                include 'home/hapalan.php';
                break;

            case 'tambah':
                include 'home/tambah.php';
                break;

            case 'tambahsiswa':
                include 'home/tambahsiswa.php';
                break;

            case 'tambahadmin':
                include 'home/tambahadmin.php';
                break;

            case 'akun':
                include 'home/akun.php';
                break;

            case 'logout':
                include 'logout.php';
                break;
            
        }
        ?>
