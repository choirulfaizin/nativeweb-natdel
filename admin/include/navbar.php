<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #000;border-color: #000000;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand">
            <strong>AWResto</strong>
            Admin
        </a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="profile dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-user"></span>
                <?php echo $_SESSION['user']; ?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-user"></i>
                        Profile
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-envelope"></i>
                        Inbox
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-fw fa-gear"></i>
                        Settings
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../login/logout.php">
                        <i class="fa fa-fw fa-power-off"></i>
                        Log Out
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <br>
            <img src="../../assets/img/awbest.png" class="img-circle" style="margin-left: 15px;margin-top: -7px;">
            <h4>
                <marquee style="font-family: -webkit-pictograph;font-size: 14px;font-style: oblique;color: rgb(132, 132, 132);">
                    Selamat Datang di Halaman Admin AWResto
                </marquee>
            </h4>
            <li class="divider"></li>
            <li>
                <a href="../barang/index.php">
                    <i class="fa fa-fw fa-dashboard"></i>
                    Barang
                </a>
            </li>
            <li>
                <a href="../kategori/index.php">
                    <i class="fa fa-tags fa-lg"></i>
                    Kategori
                </a>
            </li>
            <li>
                <a href="../satuan/index.php">
                    <span class="glyphicon glyphicon-tasks"></span>
                    Satuan
                </a>
            </li>
            <li>
                <a href="../meja/index.php">
                    <span class="glyphicon glyphicon-inbox"></span>
                    Meja
                </a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#demo">
                    <i class="fa fa-exchange fa-lg"></i>
                    Transaksi
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="demo" class="collapse">
                    <li>
                        <a href="../penjualan/penjualan_transaksi.php">Penjualan</a>
                    </li>
                    <li>
                        <a href="../pembelian/pembelian_transaksi.php">Pembelian</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="../karyawan/index.php">
                    <i class="fa fa-group fa-lg"></i>
                    Karyawan
                </a>
            </li>
            <li>
                <a href="../pelanggan/index.php">
                    <i class="fa fa-user fa-lg"></i>
                    Pelanggan
                </a>
            </li>
            <li>
                <a href="../supplier/index.php">
                    <i class="fa fa-user-md fa-lg"></i>
                    Supplier
                </a>
            </li>
            <li>
                <a href="../user/index.php">
                    <span class="glyphicon glyphicon-user"></span>
                    User
                </a>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>