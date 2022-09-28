<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html>
    <head>
        <?php include "../include/style.php" ?>
        <style type="text/css">
            body > div
            {
                transition:all 0.3s ease;

            }

            .threed:hover
            {
                box-shadow:
                    2px 3px #888,
                    3px 3px #888,
                    4px 4px #888;
                -webkit-transform: translateX(-5px);
                transform: translateX(-5px);
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <?php include "../include/navbar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Pilih Meja
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-exchange fa-lg"></i>
                                        Penjualan
                                    </a>
                                </li>
                                <li class="active">Meja</li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <br>
                    <div class='row'>
                        <?php
                            include "../../db/database.php";
                            koneksi_buka();
                            $sql = mysql_query("SELECT * FROM meja ORDER BY id_meja ASC");
                            while($dt = mysql_fetch_array($sql))
                            {
                                echo "
                                <div class='col-lg-3 col-md-6'>
                                    <a href='penjualan_transaksi.php'>
                                        <div class='panel panel-primary threed'>
                                            <div class='panel-heading' style='padding-bottom: 28px;padding-top: 37px;'>
                                                <div class='row' style='padding: 7px;'>
                                                    <div class='col-xs-3'>
                                                        <span class='glyphicon glyphicon-inbox fa-5x'></span>
                                                    </div>
                                                    <div class='col-xs-9 text-right'>
                                                        <div class='huge'>Meja $dt[no_meja]</div>
                                                        <div>
                                                            <h4>Status</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='panel-footer' style='padding: 12px;'>
                                                <span class='pull-left' style='font-size: 18px;'>$dt[ket]</span>
                                                <span class='pull-right'></span>
                                                <div class='clearfix'></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>";
                            }
                            koneksi_tutup();
                        ?>
                    </div><!-- .row -->
                </div>
            </div>
        </div>
        <?php include "../include/script.php" ?>
    </body>
</html>
<?php } ?>