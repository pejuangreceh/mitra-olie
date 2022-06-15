<!DOCTYPE html>
<html>

<head>
    <title>Demo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>

<body>

    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-12" style="margin-bottom: 20px">
                <div class="row">
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
            </div>
            <div class="col-md-12">
                <table id="tabelData" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Register</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_data as $row) { ?>
                            <tr>
                                <td><?= $row->first_name ?></td>
                                <td><?= $row->last_name ?></td>
                                <td><?= $row->email ?></td>
                                <td><?= $row->gender ?></td>
                                <td><?= $row->register_date ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama Depan</th>
                            <th>Nama Belakang</th>
                            <th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Register</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#tabelData').DataTable({
                "order": [
                    [1, "desc"]
                ],
                "ordering": true
            });
            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var min = $('.date_range_filter').val();
                    var max = $('.date_range_filter2').val();
                    var createdAt = data[4]; // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
                    if (
                        (min == "" || max == "") ||
                        (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                    ) {
                        return true;
                    }
                    return false;
                }
            );
            $('.pickdate').each(function() {
                $(this).datepicker({
                    format: 'mm/dd/yyyy'
                });
            });
            $('.pickdate').change(function() {
                table.draw();
            });
        });
    </script>
</body>

</html>