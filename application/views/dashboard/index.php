<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.1/css/bootstrap.min.css"> -->
<!-- TABEL PERAMALAN-->
<?php $hitung = 0; ?>
<?php foreach ($ramals as $ramal) { ?>
    <!-- <?php echo $ramal->id_stok; ?>
    <?php echo $ramal->created_at; ?>
    <?php echo $ramal->updated_at; ?>
    <?php echo $ramal->jumlah_masuk; ?>
    <br> -->

<?php
    $hitung = $hitung + $ramal->jumlah_masuk;
}

?>
<!-- 
<div class="form-group px-1">

    <?php $bagi = 200;  ?>
    <div class="progress">
        <?php echo '<div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="1542"></div>'; ?>
    </div>
</div> -->
<!-- /TABEL PERAMALAN -->

<div class="form-group px-1">
    <select onchange="if (this.value) window.location.href='<?php echo base_url('DashboardController/index/') ?>'+ this.value" id="category" class="form-control" aria-label="Default select example" name="category" required="">
        <option value="-">Pilih Barang</option>
        <?php foreach ($stoks as $stok) { ?>
            <option <?php if ($stok->id == $my_uri) {
                        echo "selected";
                    } ?> value="<?php echo $stok->id; ?>"><?php echo $stok->nama_barang; ?> </option>
        <?php } ?>
    </select>
</div>
<div class="form-group px-1">
    <h4>Prediksi Jumlah stok yang dibutuhkan bulan depan adalah : <?php echo ceil($hitung / 12); ?> </h4>
</div>
<div>

</div>
<div>
    <canvas id="myChart"></canvas>
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
        // labels: labels,
        labels: [<?php foreach ($masuks as $masuk) {
                        $bln = date("M", strtotime($masuk->created_at));
                        echo "'$bln'" . ',';
                    } ?>],
        datasets: [
            <?php
            $color = "'rgb(' + Math . floor(Math . random() * 255) + ','
                + Math . floor(Math . random() * 255) + ','
                + Math . floor(Math . random() * 255) + ')'";
            // data Olie Samping
            echo "{
                
                    
                    backgroundColor:" . $color . ",
                    borderColor: " . $color . ",
                    data: [";
            foreach ($masuks as $masuk) {
                $nama_barang = $masuk->nama_barang;
                echo $masuk->jumlah_masuk . ",";
            }
            echo "],
                    label: '" . $nama_barang . "',
        },";
            ?>
        ]
    };
    const config = {
        type: 'line',
        data: data,
        options: {}
    };
</script>
<script>
    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );
</script>