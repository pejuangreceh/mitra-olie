<br />
<h4><b>Tambah Data Stok Barang</b></h4>
<?php if (!empty($this->session->flashdata('message'))) { ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>
<form name="calc" method="POST" action="<?php echo base_url('PelangganController/update/' . $id); ?>">
    <div class="form-group">
        <label for="nama">Name</label>
        <input required="" class="form-control" type="text" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="form-group">
        <label for="stok">Username</label>
        <input required="" class="form-control" type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="harga">Alamat</label>
        <input required="" class="form-control" type="text" name="alamat" value="<?php echo $alamat; ?>">
    </div>
    <div class="form-group">
        <label for="harga">No Telepon</label>
        <input class="form-control" type="text" name="no_telepon" value="<?php echo $no_telepon; ?>">
    </div>
    <div class="form-group">
        <label for="harga">Plat Nomor</label>
        <input class="form-control" type="text" name="plat_nomor" value="<?php echo $plat_nomor; ?>">
    </div>
    <div class=" form-group">
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
    </div>
</form>