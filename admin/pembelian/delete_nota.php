<?php
    include "database.php";
    koneksi_buka();
    $id = $_GET['id'];
    $hasil = mysql_query("DELETE FROM pembelian WHERE id_pembelian = '$id'");

        if ($hasil){
            //echo "sukses";
?>
<script>document.location.href="pembelian_transaksi.php"</script>
<?php
        } else {
            echo "Gagal karena : ".mysql_error();
        }
    koneksi_tutup();
?>