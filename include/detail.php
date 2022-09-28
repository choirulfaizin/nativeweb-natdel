<?php
// panggil file koneksi.php
require '../db/database.php';

// buat koneksi ke database mysql
koneksi_buka();

// tangkap variabel kd_mhs
$id_barang = $_POST['id'];

// query untuk menampilkan mahasiswa berdasarkan kd_mhs
$data = mysql_fetch_array(mysql_query("
SELECT * FROM barang WHERE id_barang=".$id_barang
));

// jika kd_mhs > 0 / form ubah data
if($id_barang> 0) {
	$nama_barang = $data['nama_barang'];
	$id_kategori = $data['id_kategori'];
	$id_satuan = $data['id_satuan'];
	$jenis_barang = $data['jenis_barang'];
	$harga_jual = $data['harga_jual'];
	$status = $data['status'];
	$file = $data['file'];
}

?>
<div class="table-responsive" id="form-mahasiswa">
    <table class="table table-hover table-striped">
        <tbody>
            <tr>
                <td align="right">ID Barang</td>
                <td>:</td>
                <td><?php echo $id_barang ?></td>
            </tr>
            <tr>
                <td align="right">Nama</td>
                <td>:</td>
                <td><?php echo $nama_barang ?></td>
            </tr>
            <tr>
                <td align="right">Kategori</td>
                <td>:</td>
                <td><?php echo $id_kategori ?></td>
            </tr>
            <tr>
                <td align="right">Satuan</td>
                <td>:</td>  
                <td><?php echo $id_satuan ?></td>
            </tr>
            <tr>
                <td align="right">Jenis</td>
                <td>:</td>  
                <td><?php echo $jenis_barang ?></td>
            </tr>
            <tr>
                <td align="right">Harga</td>
                <td>:</td>  
                <td><?php echo $harga_jual ?></td>
            </tr>
            <tr>
                <td align="right">Status</td>
                <td>:</td>  
                <td><?php echo $status ?></td>
            </tr>
            <tr>
                <td align="right">Gambar</td>
                <td>:</td>
                <td>
                    <?php
                        echo"
                        <img src='assets/img/gambar_barang/". $file."' class='img-rounded zoom'
                        style='width:150px;height:100px;'>";
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php
// tutup koneksi ke database mysql
koneksi_tutup();
?>
