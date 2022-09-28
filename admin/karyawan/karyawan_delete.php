<?php
    include "../../db/database.php";
    koneksi_buka();
    $id = $_GET['id'];
	$res = mysql_query("select foto_karyawan from karyawan where id_karyawan='".$_GET['id']."'");
	$d=mysql_fetch_object($res);
	if (strlen($d->foto_karyawan)>3)
    {
        if (file_exists($d->foto_karyawan)) unlink($d->foto_karyawan);
    }	
	$sql =  mysql_query("delete from karyawan where id_karyawan ='$id'");
	if ($sql){
?>
    <script>document.location.href="index.php"</script>
<?php
    }
    koneksi_tutup();
?>