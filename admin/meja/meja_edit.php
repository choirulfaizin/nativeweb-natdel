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
                                Edit Data Meja
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <span class="glyphicon glyphicon-inbox"></span>
                                        Meja
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
                                    <h3 class="panel-title">Form Edit Meja</h3>
                                </div>
                                <?php
                                    include "../../db/database.php";
                                    koneksi_buka();
                                    $id_meja = $_GET['id'];
                                    $dt = mysql_fetch_array(mysql_query("SELECT * FROM meja WHERE id_meja = '$id_meja'"));
                                    koneksi_tutup();
                                ?>
                                <div class="panel-body">
                                    <form action="meja_update.php" method="post" enctype="multipart/form-data"
                                          class="form-horizontal" role="form">
                                        <input type="hidden" value="<?php echo"$dt[id_meja]" ?>" name="id_meja">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:start;">ID Meja :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="id_meja" value="<?php echo"$dt[id_meja]" ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:start;">No Meja :</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="no_meja" value="<?php echo"$dt[no_meja]" ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:start;">Status :</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-control" id="text" required>
                                                    <option><?php echo"$dt[status]" ?></option>
                                                    <option>Kosong</option>
                                                    <option>Terpakai</option>
                                                    <option>Terpesan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label" style="font-size: 14px;text-align:start;">Ket :</label>
                                            <div class="col-sm-9">
                                                <textarea name="ket" value="<?php echo"$dt[ket]" ?>" cols="50" rows="3"
                                                          class="form-control"><?php echo"$dt[ket]" ?></textarea>

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