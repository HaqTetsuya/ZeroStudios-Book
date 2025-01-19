<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <?php if (count($pengguna) == 0) { ?>
                    <div class="col-lg-12">
                        <center class="mt-5">pengguna Tidak Ditemukan</center>
                    </div>
                    <?php } else {

                    foreach ($pengguna as $p) {
                    ?>
                        <div class="row">
                            <div class="col-md-4 text-center">
                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <div class="mb-3">
                                        <img src="<?php echo base_url('img/user/' . $p->pengguna_foto); ?>" alt="Foto Profil" class="img-thumbnail">
                                    </div>
                                    <?php if ($this->session->userdata('id') == $p->pengguna_id) { ?>
                                        <form action="<?php echo base_url() . 'welcome/profil_foto_update' ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?php echo $p->pengguna_id; ?>">
                                            <div class="form-group">
                                                <label>Ganti Foto</label>
                                                <input type="file" name="foto" class="form-control">
                                            </div>
                                            <div class="form-group d-grid gap-2">
                                                <hr>
                                                <input type="submit" value="Upload Foto" class="btn btn-primary btn-block">
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <form action="<?php echo base_url() . 'welcome/profil_update' ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" placeholder="Masukan Username . . ." value="<?php echo $p->pengguna_username; ?>">
                                        <?php echo form_error('username'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Level Pengguna</label>
                                        <input type="text" name="level" class="form-control" value="<?php echo $p->pengguna_level; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" class="form-control" placeholder="Masukan Nama . . ." value="<?php echo $p->pengguna_nama; ?>">
                                        <?php echo form_error('nama'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Masukan Email . . ." value="<?php echo $p->pengguna_email; ?>">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                    <?php
                                    if ($this->session->userdata('id') == $p->pengguna_id) { ?>
                                        <div class="row mb-3">
                                            <hr>
                                            <div class="form-group col-3 d-grid gap-2">
                                                <button type="submit" class="btn btn-success btn-block" value="Update">Update</button>
                                            </div>
                                        </div>
                                </form>
                                <div class="form-group col-5 d-grid gap-2">
                                    <a href="<?php echo base_url('welcome/ganti_password') ?>">
                                        <button class="btn btn-warning btn-block">
                                            Ubah Password <i class="fas fa-lock"></i>
                                        </button>
                                    </a>
                                </div>
                            <?php
                                    }
                            ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>