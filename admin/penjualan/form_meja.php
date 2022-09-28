<style type="text/css">
    .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
        cursor: not-allowed;
        background-color: rgba(245, 245, 245, 0.73);
        opacity: 1;
    }
</style>
<?php
// panggil file koneksi.php
require '../../db/database.php';

// buat koneksi ke database mysql
koneksi_buka();

// tangkap variabel kd_mhs
$no_meja = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan kd_mhs
$data = mysql_fetch_array(mysql_query("
SELECT * FROM meja WHERE no_meja=".$no_meja
));

// jika kd_mhs > 0 / form ubah data
if($no_meja> 0) { 
	$status = $data['status'];
}

?>
<form class="form-horizontal" id="form-mahasiswa">
	<div class="control-group">
		<label class="control-label" for="no_meja">No Meja</label>
		<div class="controls">
			<input type="text" id="no_meja" class="form-control" name="no_meja" value="<?php echo $no_meja ?>" disabled>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="status">Status</label>
		<div class="controls">
			<select class="form-control" name="status">
				<?php 
				// tampilkan untuk form ubah mahasiswa
				if($no_meja > 0) { ?>
					<option value="<?php echo $status ?>"><?php echo $status ?></option>
				<?php } ?>
				<option value="Kosong">Kosong</option>
				<option value="Terpakai">Terpakai</option>
				<option value="Terpesan">Terpesan</option>
			</select>
		</div>
	</div>
</form>

<?php
// tutup koneksi ke database mysql
koneksi_tutup();
?>
