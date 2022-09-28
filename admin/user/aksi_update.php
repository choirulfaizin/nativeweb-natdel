<?php
    include "../../db/database.php";
    koneksi_buka();
    session_start();
    $pwd_lama = md5($_POST['pwd_lama']);
    $pwd_baru = $_POST['pwd_baru'];
    $confirm = $_POST['confirm'];

    $query1 = mysql_query("SELECT password FROM user WHERE password = '$pwd_lama'");
    $kode = $_SESSION['user'];
    $lama = mysql_num_rows($query1);echo mysql_error();

    if ($lama==0){
?>
<script>alert('Password Lama Salah !!');document.location.href="index.php"</script>
<?php 
    }else if ($pwd_baru!=$confirm){
?>
<script>alert('Password Baru Tidak Cocok !!');document.location.href="index.php"</script>
<?php 
    }else{
        $update = mysql_query("UPDATE user SET password = md5('$confirm') WHERE user='$kode'");
        echo "<script>alert('Password Berhasil Diubah')</script>";
?>
<script>document.location.href="index.php"</script>
<?php
    }
    koneksi_tutup();
?>