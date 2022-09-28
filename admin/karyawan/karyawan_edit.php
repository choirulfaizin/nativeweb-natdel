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
                                Edit Data Karyawan
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-group fa-lg"></i>
                                        Karyawan
                                    </a>
                                </li>
                                <li class="active">Edit</li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Form Edit Karyawan</h3>
                                </div>
                                <?php
                                    include "../../db/database.php";
                                    koneksi_buka();
                                    $id_karyawan = $_GET['id'];
                                    $dt = mysql_fetch_array(mysql_query("SELECT * FROM karyawan WHERE id_karyawan = '$id_karyawan'"));
                                    koneksi_tutup();
                                ?>
                                <div class="panel-body">
                                    <form action="karyawan_update.php" method="post" enctype="multipart/form-data"
                                          class="form-horizontal" role="form">
                                        <input type="hidden" value="<?php echo"$dt[id_karyawan]" ?>" name="id_karyawan">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:right;">ID Karyawan :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="id_karyawan" value="<?php echo"$dt[id_karyawan]" ?>"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:right;">Nama :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama_karyawan" value="<?php echo"$dt[nama_karyawan]" ?>"
                                                       required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Alamat :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="alamat" value="<?php echo"$dt[alamat]" ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Telp :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="telepon" value="<?php echo"$dt[telepon]" ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Foto :</label>
                                            <div class="col-sm-9">
                                                <?php echo"
                                                            <img src='$dt[foto_karyawan]' class='img-rounded zoom' style='width:150px;height:100px;'>"
                                                        ?>
                                                <input id="file-0" class="file" name="foto_karyawan" type="file"
                                                       class="form-control" value="<?php echo"$dt[foto_karyawan]" ?>" required>
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
                        <div class="col-lg-3"></div>
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
    </body>
</html>
<?php } ?>