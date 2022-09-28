<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html>
    <head>
        <?php include "../include/style.php" ?>
        <link href="../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <script src="../../assets/js/jq/jquery.js"></script>
        <script src="../../assets/js/jq/jquery.ui.datepicker.js"></script>
        <script type="text/javascript">
            //mendeksripsikan variabel yang akan digunakan
            var id_pembelian;
            var tgl_pembelian;
            var total;
            var id_barang;
            var id_supplier;
            var id_karyawan;
            var alamat;
            var telepon;
            var nama_barang;
            var id_kategori;
            var id_satuan;
            var harga_jual;
            var jumlah_beli;
            var diskon;
            $(function(){
                //meload file pk dengan operator ambil barang dimana nantinya
                //isi yg akan masuk di combo box
                $("#nama_barang").load("pk.php","op=ambilbarang");
                $("#id_supplier").load("pk.php","op=ambilbarang2");
                $("#id_karyawan").load("pk.php","op=ambilbarang3");

                //meload isi tabel
                $("#barang").load("pk.php","op=barang");

                //mengkosongkan input text dengan masing2 id berikut
                $("#id_barang").val("");
                $("#id_kategori").val("");
                $("#id_satuan").val("");
                $("#harga_jual").val("");
                $("#jumlah_beli").val("");
                $("#diskon").val("");

                //jika ada perubahan di kode barang
                $("#nama_barang").change(function(){
                    id_barang=$("#nama_barang").val();

                    //tampilkan status loading dan animasinya
                    $("#status").html("loading. . .");
                    $("#loading").show();

                    //lakukan pengiriman data
                    $.ajax({
                        url:"proses1.php",
                        data:"op=ambildata&id_barang="+id_barang,
                        cache:false,
                        success:function(msg){
                            data=msg.split("|");

                            //masukan isi data ke masing - masing field
                            $("#id_barang").val(data[0]);
                            $("#id_kategori").val(data[1]);
                            $("#id_satuan").val(data[2]);
                            $("#harga_jual").val(data[5]);
                            $("#jumlah_beli").focus();
                            $("#diskon").focus();
                            //hilangkan status animasi dan loading
                            $("#status").html("");
                            $("#loading").hide();
                        }
                    });
                });

                //jika ada perubahan di id_supplier barang
                $("#id_supplier").change(function(){
                    id_supplier=$("#id_supplier").val();

                    //tampilkan status loading dan animasinya
                    $("#status").html("loading. . .");
                    $("#loading").show();

                    //lakukan pengiriman data
                    $.ajax({
                        url:"proses2.php",
                        data:"op=ambildata2&id_supplier="+id_supplier,
                        cache:false,
                        success:function(msg){
                            data=msg.split("|");

                            //masukan isi data ke masing - masing field
                            $("#telepon").val(data[3]);
                            $("#alamat").val(data[1]);
                            //hilangkan status animasi dan loading
                            $("#status").html("");
                            $("#loading").hide();
                        }
                    });
                });

                //jika ada perubahan di id_karyawan barang
                $("#id_karyawan").change(function(){
                    id_karyawan=$("#id_karyawan").val();

                    //tampilkan status loading dan animasinya
                    $("#status").html("loading. . .");
                    $("#loading").show();

                    //lakukan pengiriman data
                    $.ajax({
                        url:"proses3.php",
                        data:"op=ambildata3&id_karyawan="+id_karyawan,
                        cache:false,
                        success:function(msg){
                            data=msg.split("|");

                            //masukan isi data ke masing - masing field
                            $("#telepon").val(data[3]);
                            $("#alamat").val(data[1]);
                            //hilangkan status animasi dan loading
                            $("#status").html("");
                            $("#loading").hide();
                        }
                    });
                });

                //jika tombol tambah di klik
                $("#tambah").click(function(){
                    id_barang=$("#nama_barang").val();
                    jumlah_beli=$("#jumlah_beli").val();
                    diskon=$("#diskon").val();
                    if(id_barang=="ID Barang"){
                        alert("ID Barang harus diisi !!");
                        exit();
                    }else if(jumlah_beli < 1){
                        alert("Jumlah tidak boleh 0 !!");
                        $("#jumlah_beli").focus();
                        exit();
                    }else if(diskon < 0){
                        alert("Diskon harus diisi !!");
                        $("#diskon_2").focus();
                        exit();
                    }
                    nama_barang=$("#id_barang").val();
                    id_kategori=$("#id_kategori").val();
                    id_satuan=$("#id_satuan").val();
                    harga_jual=$("#harga_jual").val();

                    $("#status").html("Sedang diproses. . .");
                    $("#loading").show();

                    $.ajax({
                        url:"pk.php",
                        data:"op=tambah&id_barang="+id_barang+"&nama_barang="+nama_barang+"&id_kategori="+id_kategori+
                        "&id_satuan="+id_satuan+"&harga_jual="+harga_jual+"&diskon="+diskon+"&jumlah_beli="+jumlah_beli,
                        cache:false,
                        success:function(msg){
                            if(msg=="Sukses"){
                                $("#status").html("Berhasil disimpan. . .");
                            }else{
                                $("#status").html("ERROR. . .");
                            }
                            $("#loading").hide();
                            $("#id_barang").val("");
                            $("#id_kategori").val("");
                            $("#id_satuan").val("");
                            $("#harga_jual").val("");
                            $("#diskon").val("");
                            $("#jumlah_beli").val("");
                            $("#nama_barang").load("pk.php","op=ambilbarang");
                            $("#barang").load("pk.php","op=barang");
                        }
                    });
                });

                //jika tombol proses diklik
                $("#proses").click(function(){
                    id_pembelian=$("#id_pembelian").val();
                    tgl_pembelian=$("#tgl_pembelian").val();
                    no_nota=$("#no_nota").val();

                    $.ajax({
                        url:"pk.php",
                        data:"op=proses&id_pembelian="+id_pembelian+"&id_supplier="+id_supplier+"&id_karyawan="+id_karyawan+
                        "&total="+total+"&no_nota="+no_nota+"&tgl_pembelian="+tgl_pembelian,
                        cache:false,
                        success:function(msg){
                            if(msg=='Sukses'){
                                $("#status").html('Transaksi Pembelian berhasil. . .');
                                alert('Transaksi Berhasil. . .');
                                exit();
                            }else{
                                $("#status").html('Transaksi Gagal !!');
                                alert('Transaksi Gagal !!');
                                exit();
                            }
                            $("#nama_barang").load("pk.php","op=ambilbarang");
                            $("#barang").load("pk.php","op=barang");
                            $("#id_supplier").load("pk.php","op=ambilbarang2");
                            $("#id_karyawan").load("pk.php","op=ambilbarang3");
                            $("#loading").hide();
                            $("#id_kategori").val("");
                            $("#id_satuan").val("");
                            $("#id_barang").val("");
                            $("#harga_jual").val("");
                            $("#diskon").val("");
                            $("#jumlah_beli").val("");
                        }
                    });
                });                   

                $("#id_kategori").change(function(){
                    var id_kategori = $("#id_kategori").val();
                    $.ajax({
                        url: "ambilbarang.php",
                        data: "id_kategori="+id_kategori,
                        cache: false,
                        success: function(msg){
                            $("#nama_barang").html(msg);
                        }
                    });
                });
            });
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <?php include "../../db/database.php" ?>
    <body>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-44426473-2', 'hmelius.com');
            ga('send', 'pageview');
        </script>
        <div id="wrapper">
            <?php include "../include/navbar.php" ?>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Tambah Transaksi Pembelian
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="pembelian_transaksi.php">
                                        <i class="fa fa-exchange fa-lg"></i>
                                        Pembelian
                                    </a>
                                </li>
                                <li class="active">Transaksi</li>
                            </ol>
                        </div>
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                                koneksi_buka();
                                $p=isset($_GET['act'])?$_GET['act']:null;
                                switch($p){
                                    default:
                                    echo"
                                    <tr>
                                        <td>
                                            <a href='?page=pembelian&act=tambah' class='btn btn-primary' style='background:#3498DB;border:#3498DB;'>
                                                <b>Input Transaksi</b>
                                            </a>
                                        </td>
                                        <br><br>
                                    </tr>
                                    <div class='table-responsive'>
                                        <table class='table table-hover table-striped'>
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Pembelian</th>
                                                    <th>Tgl Pembelian</th>
                                                    <th>Karyawan</th>
                                                    <th>Supplier</th>
                                                    <th>No Nota</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                                    $query=mysql_query("SELECT pembelian.*, supplier.nama_supplier, karyawan.nama_karyawan
                                    FROM (pembelian LEFT JOIN supplier on pembelian.id_supplier=supplier.id_supplier)
                                    LEFT JOIN karyawan on pembelian.id_karyawan=karyawan.id_karyawan order by id_pembelian desc");
                                    $no=1;
                                    while($r=mysql_fetch_array($query))
                                    {
                                        echo"
                                        <tr>
                                            <td>$no</td>
                                            <td>$r[id_pembelian]</td>
                                            <td>$r[tgl_pembelian]</td>
                                            <td>$r[nama_karyawan]</td>
                                            <td>$r[nama_supplier]</td>
                                            <td>$r[no_nota]</td>
                                            <td>".number_format($r['total'],2,',','.')."</td>
                                            <td>
                                                <a class='btn btn-danger' type='button' style='background:#E74C3C;border:#E74C3C'
                                                href='delete_nota.php?id=".$r['id_pembelian']."'>
                                                    <span class='glyphicon glyphicon-trash'></span>
                                                </a>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                    echo"</tbody></table></div>";
                                    
                                    break;
                                    case "tambah";
                                    $tgl=date('Y-m-d');
                                    $no=mysql_fetch_array(mysql_query("SELECT pembelian.*, supplier.nama_supplier, karyawan.nama_karyawan
                                    FROM (pembelian LEFT JOIN supplier on pembelian.id_supplier=supplier.id_supplier)
                                    LEFT JOIN karyawan on pembelian.id_karyawan=karyawan.id_karyawan order by id_pembelian desc LIMIT 1"));
                                    $angka=$no['id_pembelian']+1;
                                    $nota=$no['no_nota']+1001;
                                    echo"
                                    <div class='panel panel-info' style='border-color: rgba(100, 123, 144, 0.39);'>
                                        <div class='panel-heading' style='background-color: rgba(100, 123, 144, 0.39);
                                        border-color: rgba(100, 123, 144, 1);'>
                                            <h3 class='panel-title' style='color: rgba(100, 123, 144, 1);'>Tambah Transaksi Penjualan</h3>
                                        </div>
                                        <div class='panel-body'>";
                                    echo"
                                    <div class='panel panel-default table-responsive'>
                                        <div class='panel-heading'>
                                            <div class='row'>
                                                <div class='col-xs-3 col-md-3'>
                                                    <form class='form-group'>
                                                        <div class='form-group'>
                                                            <label class='col-sm-6 control-label' style='font-family: serif;font-size: 14px;'>
                                                                No Nota :
                                                            </label>
                                                            <label class='col-xs-6 control-label' style='font-size:15px;'>
                                                                $nota
                                                            </label>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class='col-xs-3 col-md-3'></div>
                                                <div class='col-xs-3 col-md-3'></div>
                                                <div class='col-xs-3 col-md-3'></div>
                                            </div>
                                        </div>
                                        <div class='panel-body'>
                                            <div class='col-xs-6 col-md-6'>
                                                <form class='form-horizontal'>
                                                    <div class='form-group'>
                                                        <label class='col-sm-3 control-label'>ID Penjualan</label>
                                                        <div class='col-xs-8'>
                                                            <input type='text' id='id_penjualan' class='form-control' value='$angka' disabled>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label class='col-sm-3 control-label'>Tgl Penjualan</label>
                                                        <div class='col-xs-8'>
                                                            <div class='input-group date form_date col-md-15' data-date=''
                                                            data-date-format='yyyy-MM-dd' data-link-field='dtp_input2' data-link-format='yyyy-MM-dd'>
                                                                <input type='text' id='tgl_pembelian' class='form-control' value='$tgl' disabled>
                                                                <span class='input-group-addon'>
                                                                    <span class='glyphicon glyphicon-calendar'></span>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='col-xs-6 col-md-6'>
                                                <form class='form-horizontal'>
                                                    <div class='form-group'>
                                                        <label class='col-sm-3 control-label'>Supplier</label>
                                                        <div class='col-xs-8'>
                                                            <select class='form-control' name='id_supplier' id='id_supplier'></select>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label class='col-sm-3 control-label'>Petugas</label>
                                                        <div class='col-xs-8'>
                                                            <select class='form-control' name='id_karyawan' id='id_karyawan'></select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='col-xs-5 col-md-2'></div>
                                        </div>
                                    </div>";
                                    echo'
                                    <span style="font-style:oblique;font-family:cursive;" id="status"></span>
                                    <br>
                                    <legend></legend>
                                    <div class="panel panel-default table-responsive">
                                        <table id="barang" class="table table-hover table-striped">
                                            <form method="post">
                                                <div class="panel-heading">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <select name="id_kategori" class="form-control" id="id_kategori">
                                                                <option>Nama Kategori</option>';
                                    $nama_kategori = mysql_query("SELECT * FROM kategori ORDER BY nama_kategori");
                                    while($p=mysql_fetch_array($nama_kategori)){
                                        echo"
                                        <option value=\"$p[nama_kategori]\">$p[nama_kategori]</option>\n";
                                    }
                                    echo'
                                                            </select>
                                                        </div>
                                                        <input type="hidden" class="form-control" id="id_barang" placeholder="Nama Barang" readonly>
                                                        <div class="col-md-2">
                                                            <select name="nama_barang" class="form-control" id="nama_barang">
                                                                <option>Nama Barang</option>';
                                    $nama_barang = mysql_query("SELECT * FROM barang ORDER BY nama_barang");
                                    while($p=mysql_fetch_array($nama_kategori)){
                                        echo"
                                        <option value=\"$p[nama_barang]\">$p[nama_barang]</option>\n";
                                    }
                                    echo'
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" class="form-control" id="id_satuan" placeholder="Satuan" disabled>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" class="form-control" id="harga_jual" placeholder="Harga">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text" class="form-control" id="diskon" placeholder="Diskon">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <input type="text" class="form-control" id="jumlah_beli" placeholder="Jumlah">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button id="tambah" class="btn" style="margin-left:-13px;
                                                            background:rgba(0, 100, 255, 0.87);border: #006EFF;">
                                                                <b>
                                                                    <font color="white">Tambah</font>
                                                                </b>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-1"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <div class="form-action">
                                                <div class="btn-toolbar">
                                                    <button class="btn btn-primary" id="proses">
                                                        <b>
                                                            <font color="white">Proses</font>
                                                        </b>
                                                    </button>
                                                    <button class="btn btn-info">
                                                        <a href="#">
                                                            <b>
                                                                <font color="white">Print</font>
                                                            </b>
                                                        </a>
                                                    </button>
                                                    <button class="btn btn-danger">
                                                        <a href="pembelian_transaksi.php">
                                                            <b>
                                                                <font color="white">Kembali</font>
                                                            </b>
                                                        </a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>';
                                    echo"
                                    </div>
                                        </div>";
                                    break;
                                }
                                koneksi_tutup();
                            ?>
                        </div>
                    </div><!--row-->
                </div>
            </div><!-- /#page-wrapper -->
        </div><!-- /#wrapper -->
        <?php include "../include/script.php" ?>
        <script src="../../assets/js/datetime/bootstrap-datetimepicker.js"></script>
        <script src="../../assets/js/datetime/bootstrap-datetimepicker.id.js"></script>
        <script type="text/javascript">
            $('.form_date').datetimepicker({
                language:  'id',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                minView: 2,
                forceParse: 0
            });
            $('.form_time').datetimepicker({
                language:  'id',
                weekStart: 1,
                todayBtn:  1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 1,
                minView: 0,
                maxView: 1,
                forceParse: 0
            });
        </script>
    </body>
</html>
<?php } ?>