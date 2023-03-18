<?php
    $field = array(
        'nama' => @$_POST['nama'],
        'tanggal'=> date("d-m-y"),
        'subuh' => @$_POST['sb'],
        'dzuhur' => @$_POST['dz'],
        'ashar' => @$_POST['as'],
        'magrib' => @$_POST['mg'],
        'isya' => @$_POST['is'],
        'dhuha' => @$_POST['dh'],
        'tahajud' => @$_POST['th'],
        'id_surat' => @$_POST['id_surat'],
        'ayat' => @$_POST['ayat'],
        'jk' => @$_POST['jk']);

        @$where = "id_pencatatan = $_GET[id]";

        $tabel = "pencatatan";
        $ayats = @$_POST['ayat'];
        $redirect = "?menu=absen";
        if (isset($_POST['simpan'])) {
            $tbl = "bacaan_quran";
            $ayat = mysqli_query($con, "SELECT `jml_ayat` FROM $tbl");
            $go = mysqli_fetch_assoc($ayat);
            if ($ayats >= $go) {
                echo "<script> alert('Ayat melebihi') </script>";
            }else {
            $db->simpan($con, $tabel, $field,$redirect);
            }
        }
        if (isset($_GET['edit'])) {
           @$rd = $db->edit($con, $tabel, $where);
        }
        if (isset($_POST['ubah'])) {
            $tbl = "bacaan_quran";
            $ayat = mysqli_query($con, "SELECT `jml_ayat` FROM $tbl");
            if ($ayats > $ayat) {
                echo "<script> alert('Ayat melebihi') </script>";
            }else {
            $db->ubah($con, $tabel, $field, $where, $redirect);
            }
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
</head>
<body>
    <div class="container">
        <div class="row g-0">
            <div class="col">
                <form action="" method="POST">
                <br><br><h1>Tambah</h1><br><br><br>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-7">
                    <select name="nama" class="form-control" id="">
                        <?php if(@$_GET['id'] == ""){ ?>
                        <option value="">Masukkan Nama</option>
                        <?php }else{?>
                        <option value="<?=@$rd['nama'];?>"><?php echo @$rd['nama']; ?></option>
                        <?php } ?>
                    <?php
                    
                      $tabel = "siswa";
                      $a = $db->tampil($con, $tabel);
                        foreach($a as $r){
                            
                    ?> 
                        <option value="<?= $r['nama'];?>"><?php echo $r['nama']; ?></option>
                        
                        <?php }?>
                    </select>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-7">
                        <div id="myselection" class="col"> 
                            <input   type="radio" class="btn-check" <?php if(@$rd['jk']=="L"){ echo "checked";} ?> name="jk" value="L" id="l" autocomplete="off" >
                        </div>
                        <label class="btn btn-outline-dark" for="l">L</label>
                        <label class="btn btn-outline-dark" for="p">P</label>

                        <div id="selection" class="col">
                            <input type="radio" class="btn-check" <?php if(@$rd['jk']=="P"){ echo "checked";} ?> name="jk" value="P" id="p" autocomplete="off" >
                        </div>
                    </div>
                </div>
                <?php if(@$_GET['id'] == ""){}else{ ?>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">tanggal</label>
                <div class="col-sm-7 ">
                    <input   type="date" value="<?php echo @$rd['tanggal'] ?>" aria-label="last name" name="tanggal"  class="form-control col-sm-3" id="">
                </div>
                </div>
                <?php } ?>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Tahajud</label>
                    <div class="col">
                        <input   type="radio" class="btn-check" <?php if(@$rd['tahajud']=="iya"){ echo "checked";} ?> name="th" value="iya" id="1" autocomplete="off" >
                        <label class="btn btn-outline-success" for="1">Iya</label>
                        <input   type="radio" class="btn-check" <?php if(@$rd['tahajud']=="tidak"){ echo "checked";} ?> name="th"  value="tidak" id="2" autocomplete="off" >
                        <label class="btn btn-outline-danger" for="2">Tidak</label>
                        <input   type="radio" class="btn-check" <?php if(@$rd['tahajud']=="Haid"){ echo "checked";} ?> name="th"  value="Haid" id="15" autocomplete="off" >
                        <label id="showHaid" class="btn btn-outline-secondary myDiv" for="15">Haid</label>
                    </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Subuh</label>
                <div class="col-sm-7">
                <input   type="radio" class="btn-check" <?php if(@$rd['subuh']=="iya"){ echo "checked";} ?> name="sb" value="iya" id="3" autocomplete="off" >
                <label class="btn btn-outline-success" for="3">Iya</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['subuh']=="tidak"){ echo "checked";} ?> name="sb" value="tidak" id="4" autocomplete="off" >
                <label class="btn btn-outline-danger" for="4">Tidak</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['subuh']=="Haid"){ echo "checked";} ?> name="sb" value="Haid" id="16" autocomplete="off" >
                <label id="showHaid" class="btn btn-outline-secondary myDiv" for="16">Haid</label>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Dhuha</label>
                <div class="col-sm-7">
                <input   type="radio" class="btn-check" <?php if(@$rd['dhuha']=="iya"){ echo "checked";} ?> name="dh" value="iya" id="5" autocomplete="off" >
                <label class="btn btn-outline-success" for="5">Iya</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['dhuha']=="tidak"){ echo "checked";} ?> name="dh" value="tidak" id="6" autocomplete="off" >
                <label class="btn btn-outline-danger" for="6">Tidak</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['dhuha']=="Haid"){ echo "checked";} ?> name="dh" value="Haid" id="17" autocomplete="off" >
                <label id="showHaid" class="btn btn-outline-secondary myDiv" for="17">Haid</label>
            </div>
            </div>
            <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">dzuhur</label>
                <div class="col-sm-7">
                <input   type="radio" class="btn-check" <?php if(@$rd['dzuhur']=="iya"){ echo "checked";} ?> name="dz" value="iya" id="7" autocomplete="off" >
                <label class="btn btn-outline-success" for="7">Iya</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['dzuhur']=="tidak"){ echo "checked";} ?> name="dz" value="tidak" id="8" autocomplete="off" >
                <label class="btn btn-outline-danger" for="8">Tidak</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['dzuhur']=="Haid"){ echo "checked";} ?> name="dz" value="Haid" id="18" autocomplete="off" >
                <label id="showHaid" class="btn btn-outline-secondary myDiv" for="18">Haid</label>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Ashar</label>
                <div class="col-sm-7">
                <input   type="radio" class="btn-check" <?php if(@$rd['ashar']=="iya"){ echo "checked";} ?> name="as" value="iya" id="9" autocomplete="off" >
                <label class="btn btn-outline-success" for="9">Iya</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['ashar']=="tidak"){ echo "checked";} ?> name="as" value="tidak" id="10" autocomplete="off" >
                <label class="btn btn-outline-danger" for="10">Tidak</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['ashar']=="Haid"){ echo "checked";} ?> name="as" value="Haid" id="19" autocomplete="off" >
                <label id="showHaid" class="btn btn-outline-secondary myDiv" for="19">Haid</label>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Magrib</label>
                <div class="col-sm-7">
                <input   type="radio" class="btn-check" <?php if(@$rd['magrib']=="iya"){ echo "checked";} ?> name="mg" value="iya" id="11" autocomplete="off" >
                <label class="btn btn-outline-success" for="11">Iya</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['magrib']=="tidak"){ echo "checked";} ?> name="mg" value="tidak" id="12" autocomplete="off" >
                <label class="btn btn-outline-danger" for="12">Tidak</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['magrib']=="Haid"){ echo "checked";} ?> name="mg" value="Haid" id="20" autocomplete="off" >
                <label id="showHaid" class="btn btn-outline-secondary myDiv" for="20">Haid</label>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Isya</label>
                <div class="col-sm-7">
                <input   type="radio" class="btn-check" <?php if(@$rd['isya']=="iya"){ echo "checked";} ?> name="is" value="iya" id="13" autocomplete="off" >
                <label class="btn btn-outline-success" for="13">Iya</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['isya']=="tidak"){ echo "checked";} ?> name="is" value="tidak" id="14" autocomplete="off" >
                <label class="btn btn-outline-danger" for="14">Tidak</label>
                <input   type="radio" class="btn-check" <?php if(@$rd['isya']=="Haid"){ echo "checked";} ?> name="is" value="tidak" id="21" autocomplete="off" >
                <label id="showHaid" class="btn btn-outline-secondary myDiv" for="21">Haid</label>
                </div>
                </div>
                <div class="mb-3 row py-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Hafalan</label>
                <div class="col-sm-7">
                    <select name="id_surat" class="form-control" id="">
                        <?php if(@$_GET['id'] == ""){ ?>
                        <option value="">--Pilih surat--</option>
                        <?php }else{?>
                        <option value="<?= @$rd['id_surat']; ?>"><?php echo @$rd['id_surat']; ?></option>
                        <?php } ?>
                    <?php
                    
                      $tabel = "bacaan_quran";
                      $a = $db->tampil($con, $tabel);
                        foreach ($a as $r){
                            
                    ?> 
                        <option value="<?= $r['id_surat']; ?>"><?php echo $r['id_surat'] . " | " . $r['surat']; ?></option>
                        
                        <?php }?>
                    </select>
                </div>
                </div>
                <div class="mb-3 row py-3 input-group">
                    <label for="inputPassword" class="col-sm-2 col-form-label">ayat</label>
                <div class="col-sm-7">
                    <input   type="Text" value="<?php echo @$rd['ayat'] ?>" name="ayat" class="form-control" id="inputPassword">
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#showHaid").show();
        $('#myselection').on('change', function(){
            var demovalue = $(this).val(); 
            console.log(demovalue)
            $("label.myDiv").hide();
            $("#show" + demovalue).hide();
        });
        $('#selection').on('change', function(){
            var demovalue = $(this).val(); 
            console.log(demovalue)
            $("label.myDiv").show();
            $("#show" + demovalue).hide();
        });

    });
</script>