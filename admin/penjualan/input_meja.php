<?php
require '../../db/database.php';

// buat koneksi ke database mysql
koneksi_buka();

// proses menghapus data mahasiswa
if(isset($_POST['hapus'])) {
	mysql_query("DELETE FROM meja WHERE no_meja=".$_POST['hapus']);
} else {
	// deklarasikan variabel
	$no_meja	= $_POST['id'];
	$status	= $_POST['status'];

    // validasi agar tidak ada data yang kosong
    if($no_meja!="" && $status!="") {
		// proses ubah data mahasiswa
        if($no_meja == 0)
        {
			mysql_query("UPDATE meja SET status = '$status' WHERE no_meja = '$no_meja'");
		}
    }
}

// tutup koneksi ke database mysql
koneksi_tutup();

?>
