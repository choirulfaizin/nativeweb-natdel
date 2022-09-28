<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html lang="en">
    <head>
        <?php include "../include/style.php" ?>
    </head>
    <body>
        <div id="wrapper">
            <?php include "../include/navbar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Edit Data Satuan
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <span class="glyphicon glyphicon-tasks"></span>
                                        Satuan
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
                                    <h3 class="panel-title">Form Edit Satuan</h3>
                                </div>
                                <?php
                                    include "../../db/database.php";
                                    koneksi_buka();
                                    $id_satuan = $_GET['id'];
                                    $dt = mysql_fetch_array(mysql_query("SELECT * FROM satuan WHERE id_satuan = '$id_satuan'"));
                                    koneksi_tutup();
                                ?>
                                <div class="panel-body">
                                    <form action="satuan_update.php" method="post" enctype="multipart/form-data"
                                          class="form-horizontal" role="form">
                                        <input type="hidden" value="<?php echo"$dt[id_satuan]" ?>" name="id_satuan">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:start;">ID Satuan :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="id_satuan" value="<?php echo"$dt[id_satuan]" ?>"
                                                       disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:start;">Nama :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nama_satuan" value="<?php echo"$dt[nama_satuan]" ?>"
                                                       required>
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
    </body>
</html>
<?php } ?>