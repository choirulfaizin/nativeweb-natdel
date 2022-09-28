<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html lang="en">
    <head>
        <?php include "../include/style.php" ?>
        <link href="../../assets/css/fileinput.min%20(2).css" rel="stylesheet">
    </head>
    <body>
        <div id="wrapper">
            <?php include "../include/navbar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Edit Data Barang
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-dashboard"></i>
                                        Barang
                                    </a>
                                </li>
                                <li class="active">Edit</li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Edit Barang</h3>
                                </div>
                                <?php
                                    include "../../db/database.php";
                                    koneksi_buka();
                                    $id_barang = $_GET['id'];
                                    $dt = mysql_fetch_array(mysql_query("SELECT barang.*, kategori.nama_kategori, satuan.nama_satuan
                                    FROM (barang LEFT JOIN kategori on barang.id_kategori=kategori.id_kategori) LEFT JOIN satuan
                                    on barang.id_satuan=satuan.id_satuan WHERE id_barang = '$id_barang'"));
                                    koneksi_tutup();
                                ?>
                                <div class="panel-body">
                                    <form action="barang_update.php" method="post" enctype="multipart/form-data"
                                          class="form-horizontal" role="form">
                                        <input type="hidden" value="<?php echo"$dt[id_barang]" ?>" name="id_barang">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:right;">ID Barang :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="id_barang" value="<?php echo"$dt[id_barang]" ?>"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:right;">Nama :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama_barang" value="<?php echo"$dt[nama_barang]" ?>"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size:14px;text-align:right;">Kategori :</label>
                                            <div class="col-xs-9">
                                                <select name="id_kategori" class="form-control">
                                                    <option value="<?php echo $dt['id_kategori']; ?>">
                                                        <?php echo $dt['id_kategori']; ?>
                                                        <?php
                                                            koneksi_buka();

                                                            $sql = mysql_query("select * from kategori");
                                                            while($kategori = mysql_fetch_array($sql))
                                                            {
                                                                echo "
                                                                <option value='$kategori[nama_kategori]'>$kategori[nama_kategori]</option>";
                                                            }
                                                            koneksi_tutup();
                                                        ?>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size:14px;text-align:right;">Satuan :</label>
                                            <div class="col-xs-9">
                                                <select name="id_satuan" class="form-control">
                                                    <option value="<?php echo $dt['id_satuan']; ?>">
                                                    <?php echo $dt['id_satuan']; ?>
                                                    <?php
                                                        koneksi_buka();

                                                        $sql = mysql_query("select * from satuan");
                                                        while($satuan = mysql_fetch_array($sql))
                                                        {
                                                            echo "
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
                                                <select name="jenis_barang" class="form-control" id="text">
                                                    <option value="<?php echo $dt['jenis_barang']; ?>">
                                                        <?php echo $dt['jenis_barang']; ?>
                                                    <option>Bahan Baku</option>
                                                    <option>Bahan Jadi</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Harga :</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="harga_jual" type="text" value="<?php echo"$dt[harga_jual]" ?>"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Status :</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-control" id="text">
                                                    <option value="<?php echo $dt['status']; ?>">
                                                        <?php echo $dt['status']; ?>
                                                    <option>Promo</option>
                                                    <option>Tidak</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Gambar Lama :</label>
                                            <div class="col-sm-9">
                                                <?php echo"
                                                    <img src='../../assets/img/gambar_barang/". $dt['file']."' class='img-rounded zoom'
                                                     style='width:150px;height:100px;'>";
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Gambar Baru :</label>
                                            <div class="col-sm-9">
                                                <input id="file-0" class="file" name="gambar_barang" type="file" class="form-control">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div style="text-align:right;padding-right: 15px;">
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        style="background-color:#00395E;border-color:#00395E;">Edit</button>
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
                        <div class="col-lg-2"></div>
                    </div><!--row-->
                </div>
            </div><!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    <?php include "../include/script.php" ?>
    <script src="../../assets/js/fileinput.js"></script>
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
    <script src="../../assets/js/zoomerang.js"></script>
    <script>
        Array.prototype.forEach.call(document.querySelectorAll('p'), function (p, i) {
                            
        })
        Zoomerang
        .config({
            bgColor: '#000',
            bgOpacity: .90,
            onOpen: openCallback,
            onClose: closeCallback
        })
        .listen('.zoom')
        
        function openCallback (el) {
            console.log('zoomed in on: ')
            console.log(el)
        }
            
        function closeCallback (el) {
            console.log('zoomed out on: ')
            console.log(el)
        }
    </script>
    </body>
</html>
<?php } ?>