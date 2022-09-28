<?php
    include "../../db/database.php";
    koneksi_buka();
    $user = $_POST['user'];
    $password = $_POST['password'];

    $query = mysql_query("update user set user='$user', password=md5('$password') where user='$user'") or die(mysql_error());
    if ($query) {
        header('location:index.php');
    }else{
        echo "ERROR";
    }
    koneksi_tutup();
?>