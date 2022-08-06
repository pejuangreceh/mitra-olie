<?php if (!empty($this->session->flashdata('message'))) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong><?php echo $this->session->flashdata('message'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<p><a href="<?= base_url('StokController/tambahdata'); ?>"><button type="button" class="btn btn-primary">Tambah Stok</button></a></p>

<div class="row" style="margin-bottom: 20px">
    <div class="col-md-2">
        <span>Pilih dari tanggal</span>
        <div class="input-group">
            <input type="text" class="form-control pickdate date_range_filter" name="">
            <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div>
    <div class="col-md-2">
        <span>Sampai tanggal</span>
        <div class="input-group">
            <input type="text" class="form-control pickdate date_range_filter2" name="">
            <span class="input-group-addon" id="basic-addon2"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>
    </div>
</div>

<table id="tabelData" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Harga</th>
            <th>Tanggal Input</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = $this->uri->segment('3') + 1;
        foreach ($stoks as $stok) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $stok->nama_barang; ?></td>
                <td><?php echo $stok->jumlah_barang; ?></td>
                <td><?php echo 'Rp '.number_format($stok->harga,2,",","."); ?></td>
                <td><?php echo $stok->created_at; ?></td>
                <td width="90">
                    <a href="<?= base_url('StokController/detail/' . $stok->id) ?>"><i class="bi bi-arrow-right-square"></i></a>
                    <a <?php if ($stok->total_transaksi_masuk > 0) { ?> hidden <?php   } ?> href="<?= base_url('StokController/edit/' . $stok->id) ?>"><i class="bi bi-pencil-square"></i></a>
                    <a <?php if ($stok->total_transaksi_masuk > 0) { ?> hidden <?php   } ?> href="<?= base_url('StokController/delete/' . $stok->id) ?>" onclick="return confirm('Hapus Data?')"><i class="bi bi-file-x"></i></a>
                </td>
            </tr>
        <?php } ?>
</table>
<br>