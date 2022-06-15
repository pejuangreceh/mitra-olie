<!DOCTYPE html>
<html>

<head>
    <title>Input Mobil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <label>Input Id format 00001 auto increment</label>
            </div>
            <div class="card-body">
                <form action="<?php echo base_url('mobil/input_mobil') ?>" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-2 control-label">ID</label>
                        <div class="col-md-3">
                            <input type="text" class="form-control" name="id_mobil" value="<?php echo $new_id; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">No Plat</label>
                        <div class="col-12 col-md-3">
                            <input type="text" name="no_plat" class="form-control-sm form-control" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-12 col-md-4">
                            <input type="text" name="nama" class="form-control-sm form-control" value="" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" name="submit" class="btn btn-sm btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>