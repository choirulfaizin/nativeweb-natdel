<?php
    include "../../db/database.php";
    koneksi_buka();
    $id_kategori = $_GET['id_kategori'];
    $nama_barang = mysql_query("SELECT id_barang,nama_barang,id_kategori FROM barang WHERE id_kategori='$id_kategori' order by nama_barang");
    echo"
        <option>Nama Barang</option>";
    while($k = mysql_fetch_array($nama_barang)){
        echo"
            <option value=\"".$k['id_barang']."\">".$k['nama_barang']."</option>\n";
    }
    koneksi_tutup();
?>