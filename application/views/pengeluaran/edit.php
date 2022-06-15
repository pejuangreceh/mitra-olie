<div>
    <div>
        <p><a href=" <?= base_url('PengeluaranController'); ?>"><button type="button" class="btn btn-primary">kembali</button></a></p>
    </div>
    <div class="d-flex justify-content-center">
        <h4><b>Edit Data Barang</b></h4>
    </div>
</div>
<?php if (!empty($this->session->flashdata('message'))) { ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>
<form name="calc" method="POST" action="<?php echo base_url('PengeluaranController/update/' . $id); ?>">
    <input type="hidden" name="updated_at" value=" <?php echo date('Y-m-d H:i:s'); ?>">

    <div class="form-group">
        <label for="nama">Kode Transaksi</label>
        <input required="" class="form-control" type="text" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="harga">Jenis Stok</label>
        <input data-val="" required="" class="form-control" type="text" name="jenis_stok" value="<?php echo $jenis_stok; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="stok">Jumlah Keluar</label>
        <input required="" class="form-control" type="number" name="jumlah_keluar" value="<?php echo $jumlah_keluar; ?>" min="1" max="<?php echo $jumlah_keluar + $sisa_stok; ?>">
    </div>
    <!-- <div class="form-group">
        <label for="stok">Sisa Stok</label>
        <input required="" class="form-control" type="number" value="<?php echo $sisa_stok; ?>">
    </div> -->
    <div class="form-group">
        <label for="harga">Deskripsi</label>
        <input class="form-control" type="text" name="deskripsi" value="<?php echo $deskripsi; ?>">
    </div>
    <div class=" form-group">
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
    </div>
</form>