<?php
    include "../../db/database.php";
    koneksi_buka();
    $user = $_POST['user'];
    $password = $_POST['password'];

    $query = mysql_query("insert user set user='$user', password=md5('$password')") or die(mysql_error());

    if ($query) {
        header('location:index.php');
    }
    koneksi_tutup();
?>