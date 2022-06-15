<?php if (!empty($this->session->flashdata('message'))) { ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong><?php echo $this->session->flashdata('message'); ?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<?php if ($this->session->userdata('role') == 1) { ?>
    <p><a href="<?= base_url('PelangganController/daftar'); ?>"><button type="button" class="btn btn-primary">Daftar Pelanggan</button></a></p>
<?php } ?>
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
            <th>Nama Pelanggan</th>
            <th>Username</th>
            <th>Role</th>
            <!-- <th>Plat Nomor</th> -->
            <th>Tanggal Daftar</th>
            <th>Lama Daftar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = $this->uri->segment('3') + 1;
        foreach ($pelanggans as $pelanggan) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $pelanggan->name; ?></td>
                <td><?php echo $pelanggan->username; ?></td>
                <td><?php
                    if ($pelanggan->user_level == 0) {
                        echo "Pelanggan";
                    } elseif ($pelanggan->user_level == 2) {
                        echo "Owner";
                    } else {
                        echo "Mekanik";
                    }
                    ?></td>
                <!-- <td><?php echo $pelanggan->plat_nomor; ?></td> -->
                <?php
                $tgl1 = new DateTime($pelanggan->tanggal_daftar);
                $tgl2 = new DateTime(date("Y-m-d"));
                $jarak = $tgl2->diff($tgl1);
                ?>
                <td><?php echo $pelanggan->tanggal_daftar; ?> </td>
                <td><?php echo $jarak->d; ?> hari </td>
                <td width="90">
                    <a href="<?= base_url('PelangganController/detail/' . $pelanggan->id) ?>"><i class="bi bi-arrow-right-square"></i></a>
                    <?php if ($this->session->userdata('role') == 1) { ?>
                        <a href="<?= base_url('PelangganController/edit/' . $pelanggan->id) ?>"><i class="bi bi-pencil-square"></i></a>
                        <a href="<?= base_url('PelangganController/delete/' . $pelanggan->username) ?>" onclick="return confirm('Hapus Data?')"><i class="bi bi-file-x"></i></a>
                    <?php } ?>

                </td>
            </tr>

        <?php } ?>
</table>
<br>