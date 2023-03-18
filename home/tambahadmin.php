<?php
        if (@$_POST['id_rayon'] == "admin") {
            $ad = "@Admin.sch.id";
        }else{
            $ad = "@Pembimbing.sch.id";
        }
        $field = array(
            'id' => @$_POST['nis'],
            'username' => str_replace(" ","",@$_POST['nama'].$ad),
            'nama' => @$_POST['nama'],
            'password' => @$_POST['no'],
            'role' => @$_POST['id_rayon']
        );

        @$where = "nis = $_GET[id]";
        $redirect = "?menu=absen";
        $tabel = "admin";
        if (isset($_POST['simpan'])) {
            $db->simpan($con, $tabel, $field, $redirect);  
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
    <link rel="stylesheet" href="../css/css/all.css">
    <link rel="stylesheet" href="../css/css/solid.css">
    <link rel="stylesheet" href="../css/css/fontawesome.css">
    <link rel="stylesheet" href="../css/css2/bootstrap.css">
    <script src="../css/js/all.js"></script>
    <script src="../css/js/solid.js"></script>
    <script src="../css/js/fontawesome.js"></script>
</head>
<body>
    <div class="container">
        <div class="row g-0">
            <div class="col">
                <form action="" method="POST">
                <h1>Tambah</h1>
                
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">id</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nis" placeholder="Masukkan id">
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-7">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Role</label>
                <div class="col-sm-7">
                    <select name="id_rayon" class="form-control" id="">
                        <?php if(@$_GET['id'] == ""){ ?>
                        <option value="">-- Pilih Role--</option>
                        <?php }else{?>
                        <option value="<?= @$rd['role']; ?>"><?php echo @$rd['role']; ?></option>
                        <?php } ?>
                        <option value="admin">Admin</option>
                        <option value="pembimbing">Pembimbing</option>
                    </select>
                </div>
                </div>
                <?php if(@$_GET['id'] == ""){ ?>
                <div class="mb-3 row py-3 input-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><?php if(@$_GET['id']== "") { ?>Password <?php }else{?> Masukkan Password Lama <?php } ?></label>
                <div class="col-sm-7">
                    <input required type="password" value="<?php echo @$rd['password'] ?>" name="no" class="form-control" id="inputPassword">
                </div>
                </div>
                 <?php }else{?>
                <div class="mb-3 row py-3 input-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Masukkan Password Baru</label>
                <div class="col-sm-7">
                    <input required type="Text" value="<?php echo @$rd['password'] ?>" name="no" class="form-control" id="inputPassword">
                </div>
                </div>
                <?php } ?>
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