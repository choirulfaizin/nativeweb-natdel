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
                                Data Barang
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i>
                                    Barang
                                </li>
                            </ol>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Welcome to AWResto Admin</strong>
                                by Feel free to use this template for your admin needs!
                                We are using a few different plugins to handle the dynamic tables and charts,
                                so make sure you check out the necessary documentation links provided.
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <a href="barang_form.php">
                        <button class="btn btn-primary" role="button" style="background-color:#00395E;border-color:#00395E;">Tambah Barang</button>
                    </a>
                    <!--<form class="form_control" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <br>
                        <div class='col-lg-3 col-md-6'>
                            <input class="form-control" type="search" name="q" value="<?php if (isset($_GET['q'])){ echo $_GET['q']; } ?>"
                                   placeholder="Cari . . . . ">
                        </div>
                    </form>-->
                    <br><br>
                    <div class='row'>
                        <?php
                            include "../../db/database.php";
                            koneksi_buka();
                            $dataPerPage = 8;
                            if(isset($_GET['page']))
                            {
                                $noPage = $_GET['page'];
                            }
                            else $noPage = 1;
                            $offset = ($noPage -1) * $dataPerPage;
                            if (isset($_GET['q'])){
                                $query = mysql_query("SELECT barang.*, kategori.nama_kategori, satuan.nama_satuan FROM
                                (barang LEFT JOIN kategori on barang.id_kategori=kategori.id_kategori) LEFT JOIN satuan
                                on barang.id_satuan=satuan.id_satuan WHERE LIKE '%$_GET[q]%' OR  LIKE '%$_GET[q]%'");
                                $result = mysql_query($query);

                                if ($jml>0){

                                    $no=1;
                                    while($dt = mysql_fetch_array($result)) {

                                        echo "
                                        <div class='col-lg-3 col-md-6'>
                                            <div class='panel panel-primary'>
                                                <div class='panel-heading'>
                                                    <h3 class='panel-title' style='font-size: 23px;text-align: center;font-family: serif;'>
                                                        Menu $no
                                                    </h3>
                                                </div>
                                                <div class='panel-body' style='padding:0px;'>
                                                    <div id='morris-bar-chart' style='position:relative;-webkit-tap-highlight-color:rgba(0,0,0,0);'>
                                                        <div class='thumbnail'>
                                                            <img src='../../assets/img/gambar_barang/". $dt['file']."' class='img-rounded zoom' style='height:208px;'>
                                                            <br>
                                                            <div class='caption' style='text-align: center;'>
                                                                <p>
                                                                    <a href='barang_detail.php?id=".$dt['id_barang']."'
                                                                    class='btn btn-primary btn-xs' role='button'>
                                                                        <i class='fa fa-eye fa-lg'></i>
                                                                        Detail
                                                                    </a>
                                                                    <a href='barang_edit.php?id=".$dt['id_barang']."'
                                                                    class='btn btn-success btn-xs' role='button'>
                                                                        <i class='fa fa-edit fa-lg'></i>
                                                                        Edit
                                                                    </a>
                                                                    <a href='barang_delete.php?id=".$dt['id_barang']."'
                                                                    class='btn btn-danger btn-xs' role='button'>
                                                                        <i class='fa fa-trash-o fa-lg'></i>
                                                                        Hapus
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>";
                                        $no++;
                                    }
                                } else {
                                    echo "<h6>Pencarian $_GET[q] tidak ditemukan</h6>";
                                }
                            }
                            else {
                                $sql = mysql_query("SELECT barang.*, kategori.nama_kategori, satuan.nama_satuan FROM (barang LEFT JOIN
                                kategori on barang.id_kategori=kategori.id_kategori) LEFT JOIN satuan on barang.id_satuan=satuan.id_satuan
                                ORDER BY nama_barang ASC LIMIT $offset, $dataPerPage");
                                $no=1;
                                while($r = mysql_fetch_array($sql))
                                {
                                    echo "
                                    <div class='col-lg-3 col-md-6'>
                                        <div class='panel panel-primary'>
                                            <div class='panel-heading'>
                                                <h3 class='panel-title' style='font-size: 23px;text-align: center;font-family: serif;'>Menu $no</h3>
                                            </div>
                                            <div class='panel-body' style='padding:0px;'>
                                                <div id='morris-bar-chart' style='position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);'>
                                                    <div class='thumbnail'>
                                                        <img src='../../assets/img/gambar_barang/". $r['file']."' class='img-rounded zoom' style='height:208px;'>
                                                        <br>
                                                        <div class='caption' style='text-align: center;'>
                                                            <p>
                                                                <a href='barang_detail.php?id=".$r['id_barang']."'
                                                                class='btn btn-primary btn-xs' role='button'>
                                                                    <i class='fa fa-eye fa-lg'></i>
                                                                    Detail
                                                                </a>
                                                                <a href='barang_edit.php?id=".$r['id_barang']."'
                                                                class='btn btn-success btn-xs' role='button'>
                                                                    <i class='fa fa-edit fa-lg'></i>
                                                                    Edit
                                                                </a>
                                                                <a href='barang_delete.php?id=".$r['id_barang']."'
                                                                class='btn btn-danger btn-xs' role='button'>
                                                                    <i class='fa fa-trash-o fa-lg'></i>
                                                                    Hapus
                                                                </a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                    $no++;
                                }
                            }
                            koneksi_tutup();
                        ?>
                        </div><!-- row -->
                    <?php
                        koneksi_buka();
                        $query = "SELECT COUNT(*) AS jumData FROM barang";
                        $hasil = mysql_query($query);
                        $data = mysql_fetch_array($hasil);

                        $jumData = $data['jumData'];
                        $jumPage = ceil($jumData/$dataPerPage);

                        // menampilkan navigasi paging
                        echo "<ul class='pager'>";
                        if ($noPage > 1)
                            echo "
                            <li>
                                <a href='".$_SERVER['PHP_SELF']."?page=".($noPage-1)."'>
                                    <span class='glyphicon glyphicon-chevron-left'></span>
                                    Prev
                                </a>
                            </li>";
                        for($page = 1; $page <= $jumPage; $page++)
                        {
                            if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage))
                            {
                                $showPage = $page;
                                if (($showPage == 1) && ($page != 1))
                                    echo "
                                    <li class='disabled'>
                                        <a href='#'>...</a>
                                    </li>";
                                if (($showPage != ($jumPage - 0)) && ($page == $jumPage))
                                    echo "
                                    <li class='disabled'>
                                        <a href='#'>...</a>
                                    </li>";
                                if ($page == $noPage)
                                    echo "
                                    <li class='active'>
                                        <a href='#'>".$page."</a>
                                    </li>";
                                else
                                    echo "
                                    <li>
                                        <a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a>
                                    </li>";
                            }
                        }

                        if ($noPage < $jumPage)
                            echo "
                            <li>
                                <a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>
                                    Next
                                    <span class='glyphicon glyphicon-chevron-right'></span>
                                </a>
                            </li>";

                        echo "</ul>";
                        koneksi_tutup();
                    ?>
                </div>
            </div><!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php include "../include/script.php" ?>
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