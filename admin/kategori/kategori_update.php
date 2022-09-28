<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_kategori = $_POST['id_kategori'];
    $nama_kategori = $_POST['nama_kategori'];

    $query = mysql_query("update kategori set nama_kategori='$nama_kategori' where id_kategori='$id_kategori'") or die(mysql_error());
    if ($query) {
        header('location:index.php');
    }
    koneksi_tutup();
?>