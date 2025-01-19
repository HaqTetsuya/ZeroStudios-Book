<?php
$id_user = $this->session->userdata('id');
$user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
?>
<div class="container-fluid">
    <div class="main-content">
        <div class="container mt-3">
            <div class="content-header">
                <h5 id="Date" class="mb-0"></h5>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard' ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/profile' ?>">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Password</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-lg-12 connectedSortable">
                        <div class="card card-outline card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="nav-icon fas fa-tags"></i> Ganti Password | 
                                </h3>
                                <a href="<?php echo base_url('dashboard/profile'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Kembali <i class="fas fa-arrow-left"></i>
                                    </button>
                                </a>
                            </div>
                                <div class="card-body">
                                    <?php if (isset($_GET['alert'])) {
                                        if ($_GET['alert'] == 'gagal') {
                                            echo "<div class='alert alert-danger font-weight-bold text-center'>
                                    Maaf, password lama yang anda masukkan salah!</div>";
                                        } elseif ($_GET['alert'] == "sukses") {
                                            echo "<div class='alert alert-success font-weight-bold text-center'>
                                    Password Berhasil Diperbaharui !</div>";
                                        }
                                    }
                                    ?>
                                    <form method="post" action="<?php echo base_url('dashboard/ganti_password_aksi'); ?>">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label>Password Lama</label>

                                                <input type="password" class="form-control" name="password_lama" placeholder="Masukan Password Lama Anda" required>
                                                <?php echo form_error('password_lama'); ?>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label>Password Baru</label>

                                                <input type="password" class="form-control" name="password_baru" placeholder="Masukan Passwor Baru Anda" required>
                                                <?php echo form_error('password_baru'); ?>
                                            </div>
                                            <div class="form-group">

                                                <label>Konfirmasi Password Baru</label>

                                                <input type="password" class="form-control" name="konfirmasi_password" placeholder="Ulangi Passwor Baru Anda" required>
                                                <?php echo form_error('konfirmasi_password'); ?>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">

                                            <input type="submit" class="btn btn-primary" value="Ganti Password">

                                        </div>
                                    </form>
                                </div><!-- /.card-body -->
                            </div>
                        </div><!-- /.card -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->