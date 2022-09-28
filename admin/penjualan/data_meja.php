<?php
    // panggil berkas koneksi.php
    require '../../db/database.php';

    // buat koneksi ke database mysql
    koneksi_buka();
    $query = mysql_query("SELECT * FROM meja");

    // tampilkan data mahasiswa selama masih ada
    while($dt = mysql_fetch_array($query)) {
?>

<div class='col-lg-3 col-md-6'>
    <a href="#dialog-mahasiswa" id="<?php echo $dt['no_meja'] ?>" class="ubah" data-toggle="modal">
        <div class='panel panel-primary threed'>
            <div class='panel-heading' style='padding-bottom: 28px;padding-top: 37px;'>
                <div class='row' style='padding: 7px;'>
                    <div class='col-xs-3'>
                        <span class='glyphicon glyphicon-inbox fa-5x'></span>
                    </div>
                    <div class='col-xs-9 text-right'>
                        <div class='huge' style='font-size: 32px;'>Meja <?php echo $dt['no_meja'] ?></div>
                        <div>
                            <h4><?php echo $dt['status'] ?></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class='panel-footer' style='padding: 12px;'>
                <span class='pull-left' style='font-size: 18px;'><?php echo $dt['ket'] ?></span>
                <span class='pull-right'></span>
                <div class='clearfix'></div>
            </div>
        </div>
    </a>
</div>

<?php
    }
    // tutup koneksi ke database mysql
    koneksi_tutup(); 
?>