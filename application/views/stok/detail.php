<div>
    <div>
        <p><a href=" <?= base_url('StokController'); ?>"><button type="button" class="btn btn-primary">kembali</button></a></p>
    </div>
    <div class="d-flex justify-content-center">
        <h4><b>Detail Barang</b></h4>
    </div>
</div>
<dl class="row">
    <dt class="col-sm-3">Nama Barang</dt>
    <dd class="col-sm-9"><?php echo $nama_barang; ?></dd>
    <dt class="col-sm-3">Jumlah Barang</dt>
    <dd class="col-sm-9"><?php echo $jumlah_barang; ?></dd>
    <dt class="col-sm-3">Harga</dt>
    <dd class="col-sm-9"><?php echo 'Rp '.number_format($harga,2,",","."); ?></dd>
    <dt class="col-sm-3">Deskripsi</dt>
    <dd class="col-sm-9"><?php echo $deskripsi; ?></dd>

</dl>