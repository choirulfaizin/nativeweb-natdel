<?php
    include "../../db/database.php";
    koneksi_buka();
    $user = $_POST['user'];
    $password = md5($_POST['password']);

    $hasil  = mysql_query("SELECT * FROM user WHERE user='$user' AND password='$password'");
    $hitung = mysql_num_rows($hasil);
    $data   = mysql_fetch_array($hasil);

    if (empty($user) && empty($password)) {
            header('location:../index.php?error=1');
            break;
        } else if (empty($user)) {
            header('location:../index.php?error=2');
            break;
        } else if (empty($password)) {
            header('location:../index.php?error=3');
            break;
        }elseif ($hitung > 0){
        session_start();
        $_SESSION['user'] = $data['user'];
        $_SESSION['password'] = $data['password'];

        header("location:../barang/index.php");
    }else{
        header("location:../index.php?login=user");
}
    koneksi_tutup();
?>