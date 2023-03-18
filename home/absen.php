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
        <?php
        $tabel = "admin";
        $data = $db->tampil($db,$tabel);
        if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pembimbing") {

            ?>
            <div style="margin:15px;">
                <a href="?menu=tambah" class="btn btn-success">Tambah</a>
                <a href="?menu=tambahsiswa" class="btn btn-success">Tambah santri</a>
            </div>
            <?php }else { } ?>
        <table class="table bg-light rounded" style="float:left; margin-top:120px; position:absolute;">
            <thead class="fw-bold" >
              <th>NO</th>
              <th>Nis</th>
              <th>Nama</th>
              <td>jk</td>
              <th>tanggal</th>
              <th>Th</th>
              <th>S</th>
              <th>Dh</th>
              <th>Z</th>
              <th>A</th>
              <th>M</th>
              <th>I</th>
              <th>Surat</th>
              <th>Ayat</th>
              <th>Keterangan</th>
              <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pembimbing") {?>
              <th>Opsi &check;</th>
              <?php }else{}?>
            </thead>
            <?php
            $tabel = "tampilan";
            $redirect = "?menu=absen";
            @$where = "id_pencatatan = $_GET[id]";
            
            if (isset($_GET['hapus'])) {
                $tabel = "pencatatan";
                $db->hapus($con, $tabel,$where,$redirect);
            }
            if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pembimbing") {
                $a = $db->tampil($con,$tabel);
            }else{
                $whereAbsen = $_SESSION['id']; 
                $a = $db->tampilAbsen($con, $tabel, $whereAbsen);
            }
                $no = 0;
        
                if ($a == "") {
                    echo "<tr><td>No Record</td></tr>";
                }else {
                    foreach ($a as $r) {
                        $no++;
                    $teks = $r['tahajud'] . $r['subuh'] . $r['dhuha'] . $r['dzuhur'] . $r['ashar'] . $r['magrib'] . $r['isya'];
                        $kata = explode(" ", $teks);
                        $data = array_count_values($kata);
                        foreach ($data as $x => $value) {
                            if($x =="iya"){
                                if ($value == 7) {
                                    $keterangan = "sempurna";
                                }elseif ($value == 6) {
                                    $keterangan = "ayo tingkatkan";
                                }elseif ($value == 5) {
                                    $keterangan = "Jangan males-malesan yaa";
                                }elseif ($value == 4) {
                                    $keterangan = "Jangan biarin setan menghasut";
                                }elseif ($value == 3) {
                                    $keterangan = "Yahh bolong-bolong tuh";
                                }elseif ($value == 2) {
                                    $keterangan = "Yakin nihh";
                                }elseif($value == 1) {
                                    $keterangan = "Inalillahi boii";
                                }else {
                                    $keterangan = "ga ada";
                                }
                            }
                        }
                        
            ?>
            <tbody>
                <td><?php echo $no; ?></td>
                <td><?php echo $r['nis']; ?></td>
                <td><?php echo $r['nama']; ?></td>
                <td><?php echo $r['jk']; ?></td>
                <td><?php echo $r['tanggal']; ?></td>
                <td><?php echo $r['tahajud']; ?></td>
                <td><?php echo $r['subuh']; ?></td>
                <td><?php echo $r['dhuha'] ?></td>
                <td><?php echo $r['dzuhur'] ?></td>
                <td><?php echo $r['ashar'] ?></td>
                <td><?php echo $r['magrib'] ?></td>
                <td><?php echo $r['isya'] ?></td>
                <td><?php echo $r['id_surat'] ?></td>
                <td><?php echo $r['ayat'] ?></td>
                <td><?php echo @$keterangan; ?></td>
                <?php if ($_SESSION['role'] == "admin" || $_SESSION['role'] == "pembimbing") {?>
                <td>
                    <a href="?menu=tambah&edit&id=<?php echo $r['id_pencatatan']; ?>" class="btn btn-success"><i class="i fas fa-edit"></i></a>
                    <a href="?menu=absen&hapus&id=<?php echo $r['id_pencatatan']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                </td>
                <?php }else{}?>
            </tbody>
            <?php } } ?>
        </table>
    </form>
</body>
</html>
