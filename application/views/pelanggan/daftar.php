<div class="container">
    <main>
        <?php if (!empty($this->session->flashdata('message'))) { ?>
            <div class="alert alert-danger alert-dismissible">
                <?php echo $this->session->flashdata('message'); ?>
            </div>
        <?php } ?>
        <!-- <?php echo validation_errors(); ?> -->
        <div class="row g-5">
            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3"><b>Pendaftaran Pelanggan</b></h4>
                <form class="needs-validation" novalidate method="POST" action="<?php echo base_url('PelangganController/simpan'); ?>">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="firstName" placeholder="Nama Anda" value="" required>
                            <div class="invalid-feedback">
                                Nama tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="username" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
                                <div class="invalid-feedback">
                                    Username tidak boleh kosong
                                </div>

                            </div>
                        </div>

                        <div class="col-6">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group has-validation">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                <div class="invalid-feedback">
                                    Password tidak boleh kosong
                                </div>
                            </div>
                        </div>
                        <div class="col-7">
                            <?php echo form_error('username'); ?>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="address" placeholder="Alamat lengkap anda" required>
                            <div class="invalid-feedback">
                                Alamat tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">No Telepon</label>
                            <input type="number" name="no_telepon" class="form-control" id="address" placeholder="" required onfocus="startCalculate()" onblur="stopCalc()">
                            <div class="invalid-feedback">
                                Nomor Telepon tidak boleh kosong
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Plat Nomor</label>
                            <input type="text" name="plat_nomor" class="form-control" id="address" placeholder="Plat Nomor Anda" required>
                            <div class="invalid-feedback">
                                Plat Nomor
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Pilih role</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_level" value="0" checked>
                                <label class="form-check-label">
                                    Pelanggan
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_level" value="2">
                                <label class="form-check-label">
                                    Owner
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="user_level" value="3">
                                <label class="form-check-label">
                                    Mekanik
                                </label>
                            </div>
                        </div>

                        <input type="hidden" name="tanggal_daftar" value=" <?php echo date("Y-m-d H:i:s"); ?>">
                        <input type="hidden" name="tanggal_servis" value=" <?php echo date("Y-m-d H:i:s"); ?>">
                        <div class="col-5">
                            <input class="btn btn-primary" type="submit" name="daftar" value="Daftar">
                        </div>

                    </div>
            </div>

        </div>
        <br>