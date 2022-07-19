<div>
    <div>
        <p><a href=" <?= base_url('PengeluaranController'); ?>"><button type="button" class="btn btn-primary">kembali</button></a></p>
    </div>

    <div class="d-flex justify-content-center">
        <h4><b>Tambah Data Pengeluaran</b></h4>
    </div>
</div>

<?php if (!empty($this->session->flashdata('message'))) { ?>
    <div class="alert alert-danger alert-dismissible">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php } ?>
<form name="calc" method="POST" action="<?php echo base_url('PengeluaranController/simpan'); ?>">
    <input type="hidden" name="created_at" value=" <?php echo date('Y-m-d H:i:s'); ?>">
    <input type="hidden" name="updated_at" value=" <?php echo date('Y-m-d H:i:s'); ?>">
    <div class="form-group">
        <label for="nama">Kode Transaksi</label>
        <input required="" class="form-control" type="text" name="kode_transaksi" value="<?php echo $new_id; ?>" readonly>
    </div>

    <div class="form-group">
        <label for="stok">Pilih Barang</label>
        <select id="category" class="form-control" aria-label="Default select example" name="id_stok" required="">
            <option value="">-</option>
            <?php foreach ($stoks as $stok) { ?>
                <option value="<?php echo $stok->id; ?>"><?php echo $stok->nama_barang; ?> -- <?php echo $stok->jumlah_barang; ?></option>
            <?php } ?>
        </select>
    </div>
    <!-- <input type="text" name="id_stok" value=" <?php echo $id_stok; ?>"> -->
    <!-- <div class="form-group">
        <label for="kuantitas">Kuantitas</label>
        <input required="" class="form-control" type="number" name="jumlah_keluar" id="myInput">
    </div> -->
    <div class="form-group">
        <label for="plat_nomor">Plat Nomor</label>
        <input class="form-control" type="text" name="plat_nomor" value="<?php echo $this->session->userdata('plat'); ?>">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <input class="form-control" type="text" name="deskripsi">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="simpan" value="Simpan">
    </div>
</form>
<!-- script untuk auto choose jenis stok -->
<script>
    var category = document.getElementById('category');
    document.getElementById('elements').onchange = function() {
        var optionSelected = this.options[this.selectedIndex];
        if (optionSelected.textContent != '-') {
            category.value = optionSelected.dataset.val;
            $("#myInput").attr({
                "max": optionSelected.dataset.nye,
                "min": 1
            });
        } else {
            category.value = '';
        }
    }
</script>