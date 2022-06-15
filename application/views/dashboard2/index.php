<div class="form-group">
    <select id="category" class="form-control" aria-label="Default select example" name="id_stok" required="">

        <?php foreach ($stoks as $stok) { ?>
            <option value="<?php echo $stok->id; ?>"><?php echo $stok->nama_barang; ?> </option>
        <?php } ?>
    </select>
</div>

<div>
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const config = {
        type: 'line',
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Line Chart'
                }
            }
        },
    };
    const DATA_COUNT = 7;
    const NUMBER_CFG = {
        count: DATA_COUNT,
        min: -100,
        max: 100
    };

    const labels = Utils.months({
        count: 7
    });
    const data = {
        labels: labels,
        datasets: [{
                label: 'Dataset 1',
                data: Utils.numbers(NUMBER_CFG),
                borderColor: Utils.CHART_COLORS.red,
                backgroundColor: Utils.transparentize(Utils.CHART_COLORS.red, 0.5),
            },
            {
                label: 'Dataset 2',
                data: Utils.numbers(NUMBER_CFG),
                borderColor: Utils.CHART_COLORS.blue,
                backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
            }
        ]
    };
</script>
<script>
    const actions = [{
            name: 'Randomize',
            handler(chart) {
                chart.data.datasets.forEach(dataset => {
                    dataset.data = Utils.numbers({
                        count: chart.data.labels.length,
                        min: -100,
                        max: 100
                    });
                });
                chart.update();
            }
        },
        {
            name: 'Add Dataset',
            handler(chart) {
                const data = chart.data;
                const dsColor = Utils.namedColor(chart.data.datasets.length);
                const newDataset = {
                    label: 'Dataset ' + (data.datasets.length + 1),
                    backgroundColor: Utils.transparentize(dsColor, 0.5),
                    borderColor: dsColor,
                    data: Utils.numbers({
                        count: data.labels.length,
                        min: -100,
                        max: 100
                    }),
                };
                chart.data.datasets.push(newDataset);
                chart.update();
            }
        },
        {
            name: 'Add Data',
            handler(chart) {
                const data = chart.data;
                if (data.datasets.length > 0) {
                    data.labels = Utils.months({
                        count: data.labels.length + 1
                    });

                    for (let index = 0; index < data.datasets.length; ++index) {
                        data.datasets[index].data.push(Utils.rand(-100, 100));
                    }

                    chart.update();
                }
            }
        },
        {
            name: 'Remove Dataset',
            handler(chart) {
                chart.data.datasets.pop();
                chart.update();
            }
        },
        {
            name: 'Remove Data',
            handler(chart) {
                chart.data.labels.splice(-1, 1); // remove the label first

                chart.data.datasets.forEach(dataset => {
                    dataset.data.pop();
                });

                chart.update();
            }
        }
    ];
</script>