<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_meja = $_POST['id_meja'];
    $no_meja = $_POST['no_meja'];
    $ket = $_POST['ket'];
    $status = $_POST['status'];

    $query = mysql_query("update meja set no_meja='$no_meja', ket='$ket', status='$status' where id_meja='$id_meja'") or die(mysql_error());
    if ($query) {
        header('location:index.php');
    }
    koneksi_tutup();
?>