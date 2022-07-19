<div>
    <div>
        <p><a href=" <?= base_url('StokController'); ?>"><button type="button" class="btn btn-primary">kembali</button></a></p>
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
<form name="calc" method="POST" action="<?php echo base_url('StokController/update/' . $id); ?>">
    <div class="form-group">
        <label for="nama">Nama Barang</label>
        <input required="" class="form-control" type="text" name="nama_barang" value="<?php echo $nama_barang; ?>">
    </div>
    <!-- <div class="form-group">
        <label for="stok">Jumlah Stok</label>
        <input required="" class="form-control" type="number" name="jumlah_barang" value="<?php echo $jumlah_barang; ?>" onfocus=" startCalculate()" onblur="stopCalc()">
    </div> -->
    <input type="hidden" name="updated_at" value=" <?php echo date('Y-m-d H:i:s'); ?>">
    <div class="form-group">
        <label for="harga">Harga Barang</label>
        <input required="" class="form-control" type="number" name="harga" value="<?php echo $harga; ?>" onfocus=" startCalculate()" onblur="stopCalc()">
    </div>
    <div class="form-group">
        <label for="harga">Deskripsi</label>
        <input class="form-control" type="text" name="deskripsi" value="<?php echo $deskripsi; ?>">
    </div>
    <div class=" form-group">
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
    </div>
</form>