<div>
    <div>
        <p><a href=" <?= base_url('PemasukkanController'); ?>"><button type="button" class="btn btn-primary">kembali</button></a></p>
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
<form name="calc" method="POST" action="<?php echo base_url('PemasukkanController/update/' . $id); ?>">
    <input type="hidden" name="updated_at" value=" <?php echo date("Y-m-d"); ?>">

    <div class="form-group">
        <label for="nama">Kode Transaksi</label>
        <input required="" class="form-control" type="text" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="harga">Jenis Stok</label>
        <input required="" class="form-control" type="text" name="jenis_stok" value="<?php echo $jenis_stok; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="stok">Jumlah Masuk</label>
        <input required="" class="form-control" type="number" name="jumlah_masuk" value="<?php echo $jumlah_masuk; ?>" onfocus=" startCalculate()" onblur="stopCalc()">
    </div>
    <div class="form-group">
        <label for="harga">Deskripsi</label>
        <input class="form-control" type="text" name="deskripsi" value="<?php echo $deskripsi; ?>">
    </div>
    <div class=" form-group">
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
    </div>
</form>