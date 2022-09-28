<?php
// panggil berkas koneksi.php
require '../db/database.php';

// buat koneksi ke database mysql
koneksi_buka();

?>

<table class="table table-condensed table-bordered table-hover" cellpadding="0" cellspacing="0">
<thead>
	<tr>
		<th style="width:20px">No</th>
		<th>ID Barang</th>
		<th>Nama Barang</th>
		<th>Kategori</th>
		<th>Satuan</th>
		<th>Jenis Barang</th>
		<th>Harga Jual</th>
		<th>Status</th>
		<th>File</th>
		<th></th>
	</tr>
</thead>
<tbody>
	<?php 
		$i = 1;
		$query = mysql_query("SELECT * FROM barang");
		
		// tampilkan data mahasiswa selama masih ada
		while($data = mysql_fetch_array($query)) {
	?>
	<tr>
		<td><?php echo $i ?></td>
		<td><?php echo $data['id_barang'] ?></td>
		<td><?php echo $data['nama_barang'] ?></td>
		<td><?php echo $data['id_kategori'] ?></td>
		<td><?php echo $data['id_satuan'] ?></td>
		<td><?php echo $data['jenis_barang'] ?></td>
		<td><?php echo $data['harga_jual'] ?></td>
		<td><?php echo $data['status'] ?></td>
		<td><?php echo $data['file'] ?></td>
		<td>
			<a href="#dialog-mahasiswa" id="<?php echo $data['id_barang'] ?>" class="ubah" data-toggle="modal">
				<i class="icon-pencil"></i>
			</a>
			<a href="#" id="<?php echo $data['id_barang'] ?>" class="hapus">
				<i class="icon-trash"></i>
			</a>
		</td>
	</tr>
	<?php
		$i++;
		}
	?>
</tbody>
</table>

<?php 
// tutup koneksi ke database mysql
koneksi_tutup(); 
?>