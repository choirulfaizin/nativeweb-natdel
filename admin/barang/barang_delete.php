<?php
    include "../../db/database.php";
    koneksi_buka();
    $id = $_GET['id'];
	$res = mysql_query("select file from barang where id_barang='".$_GET['id']."'");
	$d=mysql_fetch_object($res);
	if (strlen($d->file)>3)
	{
        if (file_exists($d->file)) unlink($d->file);
	}
	$sql =  mysql_query("delete from barang where id_barang ='$id'");
	if ($sql){
?>
    <script>document.location.href="index.php"</script>
<?php
    }
    koneksi_tutup();
?>