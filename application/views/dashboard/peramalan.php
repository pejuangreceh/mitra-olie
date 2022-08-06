<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css"> -->
<!-- TABEL PERAMALAN-->

<!-- 
<div class="form-group px-1">

    <?php $bagi = 200;  ?>
    <div class="progress">
        <?php echo '<div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1542"></div>'; ?>
    </div>
</div> -->
<!-- /TABEL PERAMALAN -->
<div class="row" style="margin-bottom: 20px">
    <div class="form-group px-1">
        <form method="POST" action="<?= base_url('DashboardController/peramalan/') ?>">
        <div class="col-md-2">
        <label for="stok">Pilih Alpha</label>
        <select class="form-control" aria-label="Default select example" name="id_alpha" required="">
                <option <?php if($alpha == 0){echo 'selected';} ?> value="0">Semua</option>
                <?php if($dashboard == 'Analisa'){ ?>
                <option <?php if($alpha == 1){echo 'selected';} ?> value="1">0.1</option>
                <option <?php if($alpha == 2){echo 'selected';} ?> value="2">0.2</option>
                <option <?php if($alpha == 3){echo 'selected';} ?> value="3">0.3</option>
                <option <?php if($alpha == 4){echo 'selected';} ?> value="4">0.4</option>
                <option <?php if($alpha == 5){echo 'selected';} ?> value="5">0.5</option>
                <option <?php if($alpha == 6){echo 'selected';} ?> value="6">0.6</option>
                <?php }?>
                <option <?php if($alpha == 7){echo 'selected';} ?> value="7">0.7</option>
                <?php if($dashboard == 'Analisa'){ ?>
                    
                <option <?php if($alpha == 8){echo 'selected';} ?> value="8">0.8</option>
                <option <?php if($alpha == 9){echo 'selected';} ?> value="9">0.9</option>
                <?php }?>
        </select>
        </div>
        <div class="col-md-2">
        <label>.</label>
        <p><button type="submit" class="btn btn-default">show</button></p>
        </div>
    </form>
    </div>
    <!-- <?php echo $alpha;?> -->
    <div class="form-group px-1">
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
<div class="form-group px-1">
    <!-- <h4>0.9 Prediksi Jumlah stok yang dibutuhkan bulan depan adalah : <?php echo $ramals[0]->ramal_9; ?> </h4> -->
    <table id="tabelData" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Periode</th>
            <th>Created At</th>
            <?php if ($alpha != 0){?>
                <th>Xt</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 1) ){?>
                <th>Ft 0.1</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 2) ){?>
                <th>Ft 0.2</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 3) ){?>
                <th>Ft 0.3</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 4) ){?>
                <th>Ft 0.4</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 5) ){?>
                <th>Ft 0.5</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 6) ){?>
                <th>Ft 0.6</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 7) ){?>
                <th>Ft 0.7</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 8) ){?>
                <th>Ft 0.8</th>
            <?php } ?>
            <?php if (($alpha == 0) || ($alpha == 9) ){?>
                <th>Ft 0.9</th>
            <?php } ?>
            <?php if ($alpha != 0){?>
                <th>Et</th>
            <?php } ?>
            <?php if ($alpha != 0){?>
                <th>Absolute</th>
            <?php } ?>
            <?php if ($alpha != 0){?>
                <th>Absolute / Xt</th>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $hasil = [];
        $no = $this->uri->segment('3') + 1;
        foreach ($ramals as $ramal) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $ramal->id; ?></td>
                <td><?php echo $ramal->nama_barang; ?></td>
                <td><?php echo $ramal->periode; ?></td>
                <td><?php echo $ramal->created_at; ?></td>
                <?php if ($alpha != 0){?>
                <td><?php echo $ramal->jumlah_masuk; ?></td>
                <?php } ?>
                <?php if (($alpha == 0) || ($alpha == 1) ){?>
                    <td><?php echo $ramal->ramal_1; ?></td>
                <?php $ramal_fix = $ramal->ramal_1;} ?>
                <?php if (($alpha == 0) || ($alpha == 2) ){?>
                    <td><?php echo $ramal->ramal_2; ?></td>
                <?php $ramal_fix = $ramal->ramal_2;} ?>   
                <?php if (($alpha == 0) || ($alpha == 3) ){?>
                    <td><?php echo $ramal->ramal_3; ?></td>
                <?php $ramal_fix = $ramal->ramal_3;} ?>   
                <?php if (($alpha == 0) || ($alpha == 4) ){?>
                    <td><?php echo $ramal->ramal_4; ?></td>
                <?php $ramal_fix = $ramal->ramal_4;} ?>   
                <?php if (($alpha == 0) || ($alpha == 5) ){?>
                    <td><?php echo $ramal->ramal_5; ?></td>
                <?php $ramal_fix = $ramal->ramal_5;} ?>                   
                <?php if (($alpha == 0) || ($alpha == 6) ){?>
                    <td><?php echo $ramal->ramal_6; ?></td>
                <?php $ramal_fix = $ramal->ramal_6;} ?>   
                <?php if (($alpha == 0) || ($alpha == 7) ){?>
                    <td><?php echo $ramal->ramal_7; ?></td>
                <?php $ramal_fix = $ramal->ramal_7;} ?>   
                <?php if (($alpha == 0) || ($alpha == 8) ){?>
                    <td><?php echo $ramal->ramal_8; ?></td>
                <?php $ramal_fix = $ramal->ramal_8;} ?>   
                <?php if (($alpha == 0) || ($alpha == 9) ){?>
                    <td><?php echo $ramal->ramal_9; ?></td>
                <?php $ramal_fix = $ramal->ramal_9;} ?>
                <?php if ($alpha != 0){?>
                <?php $hasil[$ramal->ramal_9] = $ramal_fix; ?>
                <td><?php echo $ramal_fix - $ramal->jumlah_masuk; ?></td>
                <?php } ?>
                <?php if ($alpha != 0){?>
                <td><?php echo abs($ramal_fix - $ramal->jumlah_masuk); ?></td>
                <?php } ?>
                <?php if ($alpha != 0){?>
                <td><?php if ($ramal->jumlah_masuk != NULL) {
                    echo round(abs($ramal_fix - $ramal->jumlah_masuk)/$ramal->jumlah_masuk,3); 
                } else{
                    echo '0';
                }?>
                </td>
                <?php } ?>
                    
            </tr>

        <?php } ?>
</table>
</div>
<div>
    <canvas id="myChart"></canvas>
</div>
<div>

</div>

<!-- TABEL PERAMALAN -->

<!-- /TABEL PERAMALAN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript">
    document.getElementById('category').value = "<?php echo $_GET['category']; ?>";
</script>
<script>
    const labels = [];

    const data = {
        labels: [<?php foreach ($ramals as $ramal) {
                        $bln = date("M", strtotime($ramal->periode));
                        echo "'$bln'" . ',';
                    } ?>],
        datasets: [{
            type: 'line',
            label: 'Jumlah Masuk',
            data: [<?php foreach ($ramals as $ramal) {
                $nama_barang = $ramal->nama_barang;
                echo $ramal->jumlah_masuk . ",";
            }?>],
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)'
        }, {
            type: 'line',
            label: 'Peramalan',
            data: [<?php foreach ($hasil as $hasil_fix) {
                echo $hasil_fix . ",";
            }?>],
            fill: false,
            borderColor: 'rgb(54, 162, 235)'
        }]
        };
            const config = {
            type: 'scatter',
            data: data,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            }
            };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>