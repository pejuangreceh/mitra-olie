<div>
    <div>
        <p><a href=" <?= base_url('PemasukkanController'); ?>"><button type="button" class="btn btn-primary">kembali</button></a></p>
    </div>
    <div class="d-flex justify-content-center">
        <h4><b>Detail Pemasukkan</b></h4>
    </div>
</div>
<dl class="row">
    <dt class="col-sm-3">Kode Transaksi</dt>
    <dd class="col-sm-9"><?php echo $kode_transaksi; ?></dd>
    <dt class="col-sm-3">Jenis Stok</dt>
    <dd class="col-sm-9"><?php echo $jenis_stok; ?></dd>
    <dt class="col-sm-3">Jumlah Masuk</dt>
    <dd class="col-sm-9"><?php echo $jumlah_masuk; ?></dd>
    <dt class="col-sm-3">Sisa Stok</dt>
    <dd class="col-sm-9"><?php echo $sisa_stok; ?></dd>
    <dt class="col-sm-3">Deskripsi</dt>
    <dd class="col-sm-9"><?php echo $deskripsi; ?></dd>
    <dt class="col-sm-3">Created at</dt>
    <dd class="col-sm-9"><?php echo $created_at; ?></dd>
    <dt class="col-sm-3">Updated at</dt>
    <dd class="col-sm-9"><?php echo $updated_at; ?></dd>
</dl>