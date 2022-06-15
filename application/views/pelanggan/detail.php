<div>
    <div>
        <p><a href=" <?= base_url('PelangganController'); ?>"><button type="button" class="btn btn-primary">kembali</button></a></p>
    </div>
    <div class="d-flex justify-content-center">
        <h4><b>Detail Pelanggan</b></h4>
    </div>
</div>
<dl class="row">
    <dt class="col-sm-3">Nama</dt>
    <dd class="col-sm-9"><?php echo $name; ?></dd>
    <dt class="col-sm-3">Username</dt>
    <dd class="col-sm-9"><?php echo $username; ?></dd>
    <dt class="col-sm-3">Alamat</dt>
    <dd class="col-sm-9"><?php echo $alamat; ?></dd>
    <dt class="col-sm-3">Nomor Telepon</dt>
    <dd class="col-sm-9"><?php echo $no_telepon; ?></dd>
    <dt class="col-sm-3">Plat Nomor</dt>
    <dd class="col-sm-9"><?php echo $plat_nomor; ?></dd>
    <dt class="col-sm-3">Tanggal Daftar</dt>
    <dd class="col-sm-9"><?php echo $tanggal_daftar; ?></dd>
</dl>