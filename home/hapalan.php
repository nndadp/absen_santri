<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/css/all.css">
    <link rel="stylesheet" href="css/css/solid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/css/fontawesome.css">
    <link rel="stylesheet" href="css/css2/bootstrap.css">
    <script src="css/js/all.js"></script>
    <script src="css/js/solid.js"></script>
    <script src="css/js/fontawesome.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
</head>
<body>
    <form action="post">
        <table class="table bg-light rounded ">
            <thead class="fw-bold" >
              <th>NO</th>
              <th>ID</th>
              <th>Nama surat</th>
              <th>juz</th>
              <th>Jumlah ayat</th>
            </thead>
            <?php
            $tabel = "bacaan_quran";
                $a = $db->tampil($db, $tabel);
                $no = 0;
        
                if ($a == "") {
                    echo "<tr><td>No Record</td></tr>";
                }else {
                    foreach ($a as $r) {
                        $no++;
            ?>
            <tbody>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['id_surat']; ?></td>
                <td><?php echo $r['surat']; ?></td>
                <td><?php echo $r['juz']; ?></td>
                <td><?php echo $r['jml_ayat']; ?></td>
                
            </tbody>
            <?php } }?>
        </table>
        <table class="table bg-light" style="position: fixed;">
            <thead style="margin-top: 15%;">
                <th>Kode sholat</th>
                <th>Sholat</th>
            </thead>
            <tbody>
                <tr>
                    <td>th</td>
                    <td>Tahajud</td>
                </tr>
                <tr>
                    <td>S</td>
                    <td>Subuh</td>
                </tr>
                <tr>
                    <td>Dh</td>
                    <td>Dhuha</td>
                </tr>
                <tr>
                    <td>Z</td>
                    <td>Dzuhur</td>
                </tr>
                <tr>
                    <td>A</td>
                    <td>Ashar</td>
                </tr>
                <tr>
                    <td>M</td>
                    <td>Magrib</td>
                </tr>
                <tr>
                    <td>I</td>
                    <td>Isya</td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>
