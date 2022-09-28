<?php
    session_start();
    if(isset($_SESSION['user']) == 0){
?>
<script>alert('Silahkan Melakukan Login dahulu !!');document.location.href="../index.php"</script>
<?php } else { ?>
<html lang="en">
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
        <script src="../../assets/js/jq/jquery.js"></script>
        <script src="../../assets/js/jq/jquery.ui.datepicker.js"></script>
        <script type="text/javascript">
            //mendeksripsikan variabel yang akan digunakan
            var id_penjualan;
            var tgl_penjualan;
            var total;
            var no_meja;
            var id_meja;
            var ket;
            var subtotal;
            var id_barang;
            var id_pelanggan;
            var id_karyawan;
            var alamat;
            var telepon;
            var nama_barang;
            var id_kategori;
            var id_satuan;
            var harga_jual;
            var jumlah_jual;
            var grand_total;
            var status;
            var diskon;
            var record;
            $(function(){
                //meload file pk dengan operator ambil barang dimana nantinya
                //isi yg akan masuk di combo box
                $("#nama_barang").load("pk.php","op=ambilbarang");
                $("#id_pelanggan").load("pk.php","op=ambilbarang2");
                $("#id_karyawan").load("pk.php","op=ambilbarang3");
                $("#id_meja").load("pk.php","op=ambilbarang4");

                //meload isi tabel
                $("#barang").load("pk.php","op=barang");

                //mengkosongkan input text dengan masing2 id berikut
                $("#id_barang").val("");
                $("#id_kategori").val("");
                $("#id_satuan").val("");
                $("#harga_jual").val("");
                $("#jumlah_jual").val("");
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
                            $("#jumlah_jual").focus();
                            $("#diskon").focus();
                            //hilangkan status animasi dan loading
                            $("#status").html("");
                            $("#loading").hide();
                        }
                    });
                });

                //jika ada perubahan di id_pelanggan barang
                $("#id_pelanggan").change(function(){
                    id_pelanggan=$("#id_pelanggan").val();

                    //tampilkan status loading dan animasinya
                    $("#status").html("loading. . .");
                    $("#loading").show();

                    //lakukan pengiriman data
                    $.ajax({
                        url:"proses2.php",
                        data:"op=ambildata2&id_pelanggan="+id_pelanggan,
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

                //meja
                $("#meja").click(function(){
                    id_meja=$("#id_meja").val();
                    no_meja=$("#no_meja").val();
                    status=$("#status2").val();

                    $.ajax({
                        url:"pk.php",
                        data:"op=meja&id_meja="+id_meja+"&no_meja="+no_meja+"&status="+status,
                        cache:false,
                        success:function(msg){
                            if(msg=="Sukses"){
                                $("#status").html("Berhasil");
                            }else{
                                $("#status").html("Error");
                            }
                            $("#loading").hide();
                            $("#id_meja").val("");
                            $("#no_meja").val("");
                            $("#status2").val("");
                            $("#no_meja").load("pk.php","op=ambilbarang4");
                        }
                    });
                });

                //jika tombol tambah di klik
                $("#tambah").click(function(){
                    id_barang=$("#nama_barang").val();
                    jumlah_jual=$("#jumlah_jual").val();
                    diskon=$("#diskon").val();
                    if(id_barang=="ID Barang"){
                        alert("ID Barang harus diisi !!");
                        exit();
                    }else if(jumlah_jual < 1){
                        alert("Jumlah tidak boleh 0 !!");
                        $("#jumlah_jual").focus();
                        exit();
                    }else if(diskon < 0){
                        alert("Diskon harus diisi !!");
                        $("#diskon").focus();
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
                        "&id_satuan="+id_satuan+"&harga_jual="+harga_jual+"&diskon="+diskon+"&jumlah_jual="+jumlah_jual,
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
                            $("#jumlah_jual").val("");
                            $("#nama_barang").load("pk.php","op=ambilbarang");
                            $("#barang").load("pk.php","op=barang");
                        }
                    });
                });

                //jika tombol proses diklik
                $("#proses").click(function(){
                    id_penjualan=$("#id_penjualan").val();
                    tgl_penjualan=$("#tgl_penjualan").val();
                    subtotal=$("#subtotal").val();
                    total=$("#total").val();
                    diskon=$("#diskon").val();

                    $.ajax({
                        url:"pk.php",
                        data:"op=proses&id_penjualan="+id_penjualan+"&id_barang="+id_barang+"&id_pelanggan="+id_pelanggan+"&no_meja="+no_meja+
                        "&id_karyawan="+id_karyawan+"&diskon="+diskon+"&total="+total+"&jumlah_jual="+jumlah_jual+"&harga_jual="+harga_jual+
                        "&status="+status+"&nama_barang="+nama_barang+"&subtotal="+subtotal+"&tgl_penjualan="+tgl_penjualan,
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
                            $("#id_pelanggan").load("pk.php","op=ambilbarang2");
                            $("#id_karyawan").load("pk.php","op=ambilbarang3");
                            $("#id_meja").load("pk.php","op=ambilbarang4");
                            $("#loading").hide();
                            $("#no_meja").val("");
                            $("#id_barang").val("");
                            $("#subtotal").val("");
                            $("#harga_jual").val("");
                            $("#diskon").val("");
                            $("#jumlah_jual").val("");
                            $("#status").val("");
                            $("#total").val("");
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

                $('#barang').keyup(function(){
                    var total=parseInt($('#total').val());
                    var ppn=parseInt($('#ppn').val());
                    var diskon=parseInt($('#diskon').val());
                    $.ajax({
                        url:"pk.php",
                        data:"op=barang&grand_total="+grand_total+"&total="+total+"&ppn="+ppn+"&diskon="+diskon,
                        cache:false,
                        success:function(msg){
                            grand_total=total+ppn-diskon;
                            $('#grand_total').val(grand_total);
                        }
                    });
                });

                $('#barang').keyup(function(){
                    var grand_total = $("#grand_total").val();
                    var	bayar=$("#bayar").val();
                    var	sisa=$("#sisa").val();
                    $.ajax({
                        url:"pk.php",
                        data:"op=barang&grand_total="+grand_total+"&bayar="+bayar+"&sisa="+sisa,
                        cache:false,
                        success:function(msg){
                            Sisa=bayar-grand_total;
                            $('#sisa').val(Sisa);
                        }
                    });
                });

                $('#tambah').keyup(function(){
                    var subtotal = $("#subtotal").val();
                    var	harga_jual=$("#harga_jual").val();
                    var	diskon=$("#diskon").val();
                    $.ajax({
                        url:"pk.php",
                        data:"op=barang&subtotal="+subtotal+"&harga_jual="+harga_jual+"&diskon="+diskon,
                        cache:false,
                        success:function(msg){
                            subtotal=harga_jual-diskon;
                            $('#subtotal').val(subtotal);
                        }
                    });
                });
            });
        </script>
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
                                Tambah Transaksi Penjualan
                                <small>Statistics Overview</small>
                            </h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="penjualan_transaksi.php">
                                        <i class="fa fa-exchange fa-lg"></i>
                                        Penjualan
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
                                    <div class='row'>";
                                    {
                                        echo"
                                        <div id='data-mahasiswa'></div>";
                                    }
                                    echo"</div>";
                                    break;
                                    case "tambah":
                                    $tgl=date('Y-m-d');
                                    $no=mysql_fetch_array(mysql_query("SELECT penjualan.*, pelanggan.nama_pelanggan, karyawan.nama_karyawan
                                    FROM (penjualan LEFT JOIN pelanggan on penjualan.id_pelanggan=pelanggan.id_pelanggan)
                                    LEFT JOIN karyawan on penjualan.id_karyawan=karyawan.id_karyawan order by id_penjualan desc LIMIT 1"));
                                    $angka=$no['id_penjualan']+1;
                                    echo"
                                    <div class='panel panel-info' style='border-color: rgba(100, 123, 144, 0.39);'>
                                        <div class='panel-heading' style='background-color: rgba(100, 123, 144, 0.39);
                                        border-color: rgba(100, 123, 144, 1);'>
                                            <h3 class='panel-title' style='color: rgba(100, 123, 144, 1);'>Tambah Transaksi Penjualan</h3>
                                        </div>
                                        <div class='panel-body'>";
                                    $id_meja = $_GET['id_meja'];
                                    $query=mysql_query("select penjualan.id_penjualan,meja.id_meja,meja.no_meja,meja.status
                                    from penjualan, meja where penjualan.no_meja=meja.no_meja and meja.id_meja='$id_meja'");
                                    $meja=mysql_fetch_array(mysql_query("SELECT * FROM meja where id_meja='$id_meja'"));
                                    echo"
                                    <div class='panel panel-default table-responsive'>
                                        <div class='panel-heading'>
                                            <div class='row'>
                                                <div class='col-xs-3 col-md-3'></div>
                                                <div class='col-xs-3 col-md-3'>
                                                    <form class='form-group'>
                                                        <input type='hidden' value='$meja[id_meja]' id='id_meja' name='id_meja'>
                                                        <div class='form-group'>
                                                            <label class='col-sm-6 control-label' style='font-family: serif;font-size: 14px;'>
                                                                No Meja :
                                                            </label>
                                                            <label class='col-xs-6 control-label' style='font-size:15px;'>
                                                                $meja[no_meja]
                                                            </label>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class='col-xs-3 col-md-3'>
                                                    <form class='form-group'>
                                                        <div class='form-group'>
                                                            <label class='col-sm-6 control-label' style='font-family: serif;font-size: 14px;'>
                                                                Status :
                                                            </label>
                                                            <label class='col-xs-6 control-label' style='font-size:15px;'>
                                                                $meja[status]
                                                            </label>
                                                        </div>
                                                    </form>
                                                </div>
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
                                                            <input type='date' id='tgl_penjualan' class='form-control' value='$tgl'>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class='col-xs-6 col-md-6'>
                                                <form class='form-horizontal'>
                                                    <div class='form-group'>
                                                        <label class='col-sm-3 control-label'>Pelanggan</label>
                                                        <div class='col-xs-8'>
                                                            <select class='form-control' name='id_pelanggan' id='id_pelanggan'></select>
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
                                                            <input type="text" class="form-control" id="jumlah_jual" placeholder="Jumlah">
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
                                                        <a href="penjualan_transaksi.php">
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
<!---------------------------------------------------------Modal-------------------------------------------------->
        <div class="modal fade" id="myModal" tabindex="100" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="margin-top:70px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <br>
                    </div>
                    <div class="modal-body">
                        <form action="pk.php" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                            <input type="text" id="id_meja" name="id_meja">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" style="font-size: 14px;text-align: right;">Status :</label>
                                <div class="col-sm-7">
                                    <select name="status" class="form-control" id="status" required>
                                        <option>Terpakai</option>
                                        <option>Terpesan</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div style="text-align:right;padding-right: 15px;">
                            <a id="meja">
                                <button id="meja" class="btn btn-sm" aria-hidden="true" style="background-color:#00395E;border-color:#00395E;">
                                    <font color='white'>Proses</font>
                                </button>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"
                                    style="background-color:#C0392B;border-color:#C0392B;">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--------------------------------------------------------/Modal-------------------------------------------------->
        <!-- awal untuk modal dialog -->
            <div id="dialog-mahasiswa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel"></h3>
                        </div>
                        <!-- tempat untuk menampilkan form meja -->
                        <div class="modal-body"></div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
                            
                                <button id="simpan-mahasiswa" class="btn btn-success">Pilih</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        <!-- akhir kode modal dialog -->
        <script src="aplikasi.js"></script>
        <?php include "../include/script.php" ?>
    </body>
</html>
<?php } ?>