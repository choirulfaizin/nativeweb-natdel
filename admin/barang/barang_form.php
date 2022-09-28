<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html lang="en">
    <head>
        <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/css/fileinput.min%20(2).css" rel="stylesheet">
        <?php include "../include/style.php" ?>
    </head>
    <?php include "../../db/database.php" ?>
    <body>
        <div id="wrapper">
            <?php include "../include/navbar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Tambah Data Barang
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-dashboard"></i>
                                        Barang
                                    </a>
                                </li>
                                <li class="active">Forms</li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Barang</h3>
                                </div>
                                <div class="panel-body">
                                    <form action="barang_insert.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size:14px;text-align:right;">Nama Barang :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama_barang" placeholder="Nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label"
                                                   style="font-size: 14px;text-align: right;">Kategori :</label>
                                            <div class="col-sm-9">
                                                <select name="id_kategori" required="required" class="form-control" id="text">
                                                    <option value="nama_kategori" selected="selected">
                                                        <?php
                                                            koneksi_buka();
                                                            $sql = mysql_query("select * from kategori");
                                                            while($kategori = mysql_fetch_array($sql))
                                                            {
                                                                echo"
                                                                <option value='$kategori[nama_kategori]'>$kategori[nama_kategori]</option>";
                                                            }
                                                            koneksi_tutup();
                                                        ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="text" class="col-sm-3 control-label" style="font-size:14px;text-align:right;">Satuan :</label>
                                            <div class="col-sm-9">
                                                <select name="id_satuan" required="required" class="form-control" id="text">
                                                    <option value="nama_satuan" selected="selected">
                                                        <?php
                                                            koneksi_buka();
                                                            $sql = mysql_query("select * from satuan");
                                                            while($satuan = mysql_fetch_array($sql))
                                                            {
                                                                echo"
                                                                <option value='$satuan[nama_satuan]'>$satuan[nama_satuan]</option>";
                                                            }
                                                            koneksi_tutup();
                                                        ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Jenis :</label>
                                            <div class="col-sm-9">
                                                <select name="jenis_barang" class="form-control" id="text" required>
                                                    <option></option>
                                                    <option>Bahan Baku</option>
                                                    <option>Bahan Jadi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Harga :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="harga_jual" placeholder="Harga" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Status :</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-control" id="text" required>
                                                    <option></option>
                                                    <option>Promo</option>
                                                    <option>Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Gambar :</label>
                                            <div class="col-sm-9">
                                                <input id="file-0" class="file" name="gambar_barang" type="file" class="form-control"
                                                       multiple data-min-file-count="1">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div style="text-align:right;padding-right: 15px;">
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        style="background-color:#00395E;border-color:#00395E;">Tambah</button>
                                                <a href="index.php">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            style="background-color:#C0392B;border-color:#C0392B;">
                                                        Batal
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3"></div>
                    </div><!--row-->
                </div>
            </div><!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php include "../include/script.php" ?>
        <script src="../../assets/js/fileinput.min.js"></script>
        <script src="../../assets/js/fileinput_locale_de.js"></script>
        <script src="../../assets/js/fileinput_locale_LANG.js"></script>
        <script>
            $("#file-0").fileinput({
                'allowedFileExtensions' : ['jpg', 'png','gif'],
            });
            $("#file-1").fileinput({
                uploadUrl: '#', // you must set a valid URL here else you will get an error
                allowedFileExtensions : ['jpg', 'png','gif'],
                overwriteInitial: false,
                maxFileSize: 1000,
                maxFilesNum: 10,
                //allowedFileTypes: ['image', 'video', 'flash'],
                slugCallback: function(filename) {
                    return filename.replace('(', '_').replace(']', '_');
                }
            });
            /*
            $(".file").on('fileselect', function(event, n, l) {
            alert('File Selected. Name: ' + l + ', Num: ' + n);
            });
            */
        </script>
    </body>
</html>
<?php } ?>