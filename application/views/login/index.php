<h4>Login</h4>

<?php if ($this->session->flashdata('message')) { ?>
    <div class="alert alert-dismissible <?php if ($this->session->flashdata('daftar_sukses') == 'yes') {
                                            echo 'alert-success';
                                        } else {
                                            echo 'alert-danger';
                                        } ?>">
        <p class="mb-0"><?php echo $this->session->flashdata('message'); ?></p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php } ?>
<?php if ($this->session->flashdata('berhasil')) { ?>
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p class="mb-0"><?php echo $this->session->flashdata('berhasil'); ?></p>
    </div>
<?php } ?>

<form action="<?= base_url('Login/cek_login'); ?>" method="POST">
    <div class="form-group">
        <label class="col-form-label" for="username">Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username" id="username" required="">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="password">Password</label>
        <input type="password" class="form-control" name="password" placeholder="password" id="password" required="">
    </div>
    <button type="submit" class="btn btn-primary">Login</button> <a href="<?= base_url('Login/daftar'); ?>">Daftar</a>
</form>
<br />