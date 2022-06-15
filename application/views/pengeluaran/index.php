<?php if (!empty($this->session->flashdata('message'))) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong><?php echo $this->session->flashdata('message'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<p><a href="<?= base_url('PengeluaranController/tambahdata'); ?>"><button type="button" class="btn btn-primary">Tambah pengeluaran</button></a></p>
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
            <th>Kode Pengeluaran</th>
            <th>Nama Stok</th>
            <th>Jumlah Keluar</th>
            <th>Tanggal Keluar</th>
            <th>Kode Pemasukkan</th>
            <th>Plat Nomor</th>
            <th>User</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = $this->uri->segment('3') + 1;
        foreach ($pengeluarans as $pengeluaran) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $pengeluaran->kode_transaksi; ?></td>
                <td><?php echo $pengeluaran->nama_barang; ?></td>
                <td><?php echo $pengeluaran->jumlah_keluar; ?></td>
                <td><?php echo $pengeluaran->created_at; ?></td>
                <td><?php echo $pengeluaran->kode_pemasukkan; ?></td>
                <td><?php echo $pengeluaran->plat_nomor; ?></td>
                <td><?php echo $pengeluaran->username; ?></td>
                <td width="90">
                    <a href="<?= base_url('PengeluaranController/detail/' . $pengeluaran->id) ?>"><i class="bi bi-arrow-right-square"></i></a>
                    <?php if (($this->session->userdata('role') == '1') || ($this->session->userdata('role') == '3')) { ?>
                        <a href="<?= base_url('PengeluaranController/edit/' . $pengeluaran->id) ?>"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?= base_url('PengeluaranController/delete/' . $pengeluaran->id) ?>" onclick="return confirm('Hapus Data?')"><i class="bi bi-file-x"></i></a>
                    <?php } ?>
                </td>
            </tr>

        <?php } ?>
</table>
<br>
<?php
// echo $links;
?>