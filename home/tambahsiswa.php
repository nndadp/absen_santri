<?php
    $field = array(
        'nis' => @$_POST['nis'],
        'nama' => @$_POST['nama'],
        'jk' => @$_POST['jk'],
        'id_rayon' => @$_POST['id_rayon'],
        'id_rombel' => @$_POST['id_rombel'],
        'no_hp' => @$_POST['no'],
        'id' => @$_POST['nis'],
        'username' => substr(@$_POST['nama'],0,5)."@ponpesalikrom.sch.id",
        'nama' => @$_POST['nama'],
        'password' => substr(@$_POST['nama'],0,5).@$_POST['nis'],
        'status' => "siswa");

        @$where = "nis = $_GET[id]";
        $tabel = "siswa,admin";
        $redirect = "?menu=absen";
        if (isset($_POST['simpan'])) {
            $db->simpan($con, $tabel, $field,$redirect);  
        }
        if (isset($_GET['edit'])) {
           @$rd = $db->edit($con, $tabel, $where);
        }
        if (isset($_POST['ubah'])) {
            $db->ubah($con, $tabel, $field, $where, $redirect);
        }
        
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Absen</title>
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
    <div class="container">
        <div class="row g-0">
            <div class="col">
                <form action="" method="POST">
                <h1>Tambah</h1>
                
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nis</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nis" placeholder="Masukkan Nis">
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-7">
                <input required type="radio" class="btn-check" <?php if(@$rd['jk']=="L"){ echo "checked";} ?> name="jk" value="L" id="l" autocomplete="off" >
                <label class="btn btn-outline-dark" for="l">L</label>
                <input required type="radio" class="btn-check" <?php if(@$rd['jk']=="P"){ echo "checked";} ?> name="jk" value="P" id="p" autocomplete="off" >
                <label class="btn btn-outline-dark" for="p">P</label>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Rayon</label>
                <div class="col-sm-7">
                    <select name="id_rayon" class="form-control" id="">
                        <?php if(@$_GET['id'] == ""){ ?>
                        <option value="">--Pilih Rayon--</option>
                        <?php }else{?>
                        <option value="<?= @$rd['id_rayon']; ?>"><?php echo @$rd['rayon']; ?></option>
                        <?php } ?>
                    <?php
                    
                      $tabel = "rayon";
                      $a = $db->tampil($con, $tabel);
                        foreach ($a as $r){
                            
                    ?> 
                        <option value="<?= $r['id_rayon']; ?>"><?php echo $r['rayon']; ?></option>
                        
                        <?php }?>
                    </select>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Rombel</label>
                <div class="col-sm-7">
                    <select name="id_rombel" class="form-control" id="">
                        <?php if(@$_GET['id'] == ""){ ?>
                        <option value="">--Pilih Rombel--</option>
                        <?php }else{?>
                        <option value="<?= @$rd['id_rombel']; ?>"><?php echo @$rd['rombel']; ?></option>
                        <?php } ?>
                    <?php
                    
                      $tabel = "rombel";
                      $a = $db->tampil($con, $tabel);
                        foreach ($a as $r){
                            
                    ?> 
                        <option value="<?= $r['id_rombel']; ?>"><?php echo $r['rombel']; ?></option>
                        
                        <?php }?>
                    </select>
                </div>
                </div>
                <div class="mb-3 row py-3 input-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">No HP</label>
                <div class="col-sm-7">
                    <input required type="Text" value="<?php echo @$rd['ayat'] ?>" name="no" class="form-control" id="inputPassword">
                </div>
                </div>
                <?php if(@$_GET['id'] == ""){ ?>
                <button class="btn btn-primary btn-lg" name="simpan">Input Data</button>
                <?php }else{?>
                <button class="btn btn-success btn-lg" name="ubah">Edit Data</button>
                <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>