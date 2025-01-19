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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit User</a></li>
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
                                        <i class="nav-icon fas fa-users"></i> Data Pengguna |<small> Edit Pengguna     |</small>
                                    </h3>
                                    <a href="<?php echo base_url('dashboard/pengguna'); ?>">
                                        <button class="btn btn-sm btn-success">
                                            Kembali <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    foreach ($pengguna as $p) {
                                    ?>
                                        <form method="post" action="<?php echo base_url('dashboard/pengguna_update'); ?>">
                                            <input type="hidden" name="id" class="form-control" value="<?php echo $p->pengguna_id ?>">
                                            <div class="form-group">
                                                <label>Level Pengguna</label>
                                                <select class="form-control" name="level" required>
                                                    <option value="">--Pilih Level--
                                                    </option>
                                                    <option <?php if ($p->pengguna_level == "admin") {
                                                                echo "selected='selected'";
                                                            } ?>value="admin">Admin</option>
                                                    <option <?php if ($p->pengguna_level == "penulis") {
                                                                echo "selected='selected'";
                                                            } ?>value="penulis">Penulis</option>
                                                    <option <?php if ($p->pengguna_level == "user") {
                                                                echo "selected='selected'";
                                                            } ?>value="penulis">User</option>
                                                </select>
                                                <?php echo form_error('level'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Pengguna</label>
                                                <select class="form-control" name="status" required>
                                                    <option value="">--Pilih Status--
                                                    </option>
                                                    <option <?php if ($p->pengguna_status == "1") {
                                                                echo "selected='selected'";
                                                            } ?> value="1">Aktif</option>
                                                    <option <?php if ($p->pengguna_status == "0") {
                                                                echo "selected='selected'";
                                                            } ?> value="0">Tidak Aktif</option>
                                                </select>
                                                <?php echo form_error('status'); ?>

                                            </div>
                                            <div class="form-group">
                                                <hr>
                                                <input type="submit" value="Update" class="btn btn-block btn-primary">
                                            </div>
                                        </form>
                                    <?php
                                    }
                                    ?>
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