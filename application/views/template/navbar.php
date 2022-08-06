<br />
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="<?= base_url(); ?>">Mitra Olie Blitar</a>
    <?php if ($this->session->userdata('logged_in')) { ?>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <!-- <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url(); ?>">Beranda<span class="sr-only">(current)</span></a>
                </li> -->
                <!-- <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url(); ?>">Dashboard Pemasukkan <span class="sr-only">(current)</span></a>
                </li> -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url(); ?>">Dashboard Pemasukkan</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>">Dashboard Pengeluaran</a>
                    </div>
                </li> -->
                <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2) || ($this->session->userdata('role') == 3)) { ?>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Analisa Penelitian</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url(); ?>">Grafik</a>
                        <a class="dropdown-item" href="<?= base_url('DashboardController/peramalan/'); ?>">Peramalan</a>
                    </div>
                </li>
                <?php } ?>
                <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2) || ($this->session->userdata('role') == 3)) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('DashboardController/peramalan7/'); ?>">Dashboard Bengkel<span class="sr-only"></span></a>
                    </li>
                <?php } ?>
                <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2) || ($this->session->userdata('role') == 3)) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('PelangganController'); ?>">Pelanggan <span class="sr-only"></span></a>
                    </li>
                <?php } ?>
                <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2)) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('StokController'); ?>">Stok Barang <span class="sr-only"></span></a>
                    </li>
                <?php } ?>
                <?php if (($this->session->userdata('role') == 1) || ($this->session->userdata('role') == 2)) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('PemasukkanController'); ?>">Pemasukan</a>
                    </li>
                <?php } ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('PengeluaranController'); ?>">Ganti Oli</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('LaporanController'); ?>">Laporan</a>
                </li> -->
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(''); ?>">Bersihkan Data</a>
                </li> -->
            </ul>
            <ul class="navbar-nav navbar-right mr-auto">
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Hi! <?php echo $this->session->userdata('username'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Login/logout'); ?>">Logout</a>
                </li>
            </ul>
        </div>
    <?php } ?>
</nav>
<br />