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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/pengguna' ?>">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Page</a></li>
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
                                        <i class="nav-icon fas fa-users"></i> Tambah Pengguna |<small> </small>
                                    </h3>
                                    <a href="<?php echo base_url('dashboard/pengguna'); ?>">
                                        <button class="btn btn-sm btn-success">
                                            Kembali <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <form method="post" action="<?php echo base_url('dashboard/pengguna_tambah_aksi'); ?>">
                                        <div class="form-group">
                                            <label>Nama Pengguna</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama pengguna . . . " required>
                                            <?php echo form_error('nama'); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Email Pengguna</label>
                                            <input type="email" name="email" class="form-control" placeholder="Masukan email pengguna . . . " required>
                                            <?php echo form_error('email'); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Username Pengguna</label>
                                            <input type="text" name="username" class="form-control" placeholder="Masukan Username pengguna . . . " required>
                                            <?php echo form_error('username'); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Password Pengguna</label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukan Password pengguna . . . " required>
                                            <?php echo form_error('password'); ?>

                                        </div>
                                        <div class="form-group">
                                            <label>Level Pengguna</label>
                                            <select class="form-control" name="level" required>
                                                <option value="">--Pilih Level--
                                                </option>
                                                <option value="admin">Admin</option>
                                                <option value="penulis">Penulis</option>
                                                <option value="user">User</option>
                                            </select>
                                            <?php echo form_error('level'); ?>

                                        </div>
                                        <div class="form-group">
                                            <hr>
                                            <input type="submit" value="Simpan" class="btn btn-block btn-primary">
                                        </div>
                                    </form>
                                </div><!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->