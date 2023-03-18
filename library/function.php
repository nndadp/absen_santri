<?php
require_once 'config/connection.php';
class main{
    private $db;
    function __construct($db){
        $this->_db = $db;
    }

    public function login(){
        if(isset($_POST['login'])) {
            $user = addslashes(strip_tags($_POST['user']));
            $pw = addslashes(strip_tags($_POST['pass']));

            if(!empty($user) AND !empty($pw)) {
                $sql = $this->_db->prepare("SELECT * FROM `admin` WHERE username = :user AND password = :pass");
                $sql->execute(array('user' => $user, 'pass' => $pw));
                if($sql->rowCount()) {
                    $data = $sql->fetch();
                        session_start();
                    if($data['role'] == "admin") {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['username'] = true;
                        $_SESSION['role'] = "admin";
                        header("Refresh:0; url=home_admin.php");
                    }elseif ($data['role'] == "siswa") {
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['username'] = true;
                        $_SESSION['role'] = "siswa";
                        header("Refresh:0; url=home_siswa.php");
                    }elseif($data['role'] == 'pembimbing'){
                        $_SESSION['username'] = $data['username'];
                        $_SESSION['username'] = true;
                        $_SESSION['role'] = "pembimbing";
                        header("Refresh:0; url=home_pembimbing.php");
                    }
                }else{
                    echo "<script>alert('username or password are wrong');</script>";    
                }
            }else{
                echo "<script>alert('please enter username and password');</script>";
            }
        }
    }
    public function is_loggedin(){
        
            if ($_SESSION['username'] == false) {
                echo "<script> alert('Login dulu'); document.location.href='index.php' </script>"; 
                return false;
            }else {
                return true;
            }
        }

    public function tampil($db,$tabel){
        $go = $this->_db->prepare("SELECT * FROM $tabel");
        $go->execute();

        if ($go->rowCount() > 0 ) {
            while ($row = $go->fetch(PDO::FETCH_ASSOC))
            $isi[] = $row;
            return @$isi;
        }
    }
    
    function simpan($con, $tabel, array $field, $redirect){
        $sql = "INSERT INTO $tabel SET ";

        foreach($field as $key =>$value){
            $sql.=" $key = '$value',";
        }

        $sql = rtrim($sql,',');
        $jalan = mysqli_query($con,$sql);
        if($jalan){
            echo "<script>alert('Data berhasil disimpan');document.location.href='$redirect'</script>";
        }else{
            echo $sql;
            // echo "<script>alert('Gagal disimpan');document.location.href='$redirect'</script>";
        }
    }
    public function tampilAbsen($db, $tabel, $where){
        $go = $this->_db->prepare("SELECT * FROM $tabel where nis = $where");
        $go->execute();

        if ($go->rowCount() > 0 ) {
            while ($row = $go->fetch(PDO::FETCH_ASSOC))
            $isi[] = $row;
            return @$isi;
        }
    }
    function hapus($con, $tabel, $where, $redirect){
        $sql = "DELETE FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        if($jalan){
            echo "<script>alert('Data berhasil dihapus');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Data gagal dihapus');document.location.href='$redirect'</script>";
        }
    }
    function edit($con, $tabel, $where){
        $sql = "SELECT * FROM $tabel WHERE $where";
        $jalan = mysqli_query($con, $sql);
        $tampung = mysqli_fetch_assoc($jalan);
        return $tampung;
    }
 
    function ubah($con, $tabel, array $field, $where, $redirect){
        $sql="UPDATE $tabel SET ";
        foreach($field as $key => $value){
            $sql.=" $key = '$value',";
        }
        $sql = rtrim($sql,',');
        $sql.=" WHERE $where";
        $jalan = mysqli_query($con,$sql);

        if($jalan){
            echo "<script>alert('Data Berhasil Diubah');document.location.href='$redirect'</script>";
        }else{
            echo "<script>alert('Data Gagal Diubah');document.location.href='$redirect'</script>";
        }
    }

}
 function tampil($con, $tabel){
    $sql = "SELECT * FROM $tabel GROUP BY nis='$_SESSION[id]'";
    $jalan = mysqli_query($con, $sql);
    while($data = mysqli_fetch_assoc($jalan))
        $isi[] = $data;
    return @$isi;
}


?>