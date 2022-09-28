<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_satuan = $_POST['id_satuan'];
    $nama_satuan = $_POST['nama_satuan'];

    $query = mysql_query("update satuan set nama_satuan='$nama_satuan' where id_satuan='$id_satuan'") or die(mysql_error());
    if ($query) {
        header('location:index.php');
    }
    koneksi_tutup();
?>