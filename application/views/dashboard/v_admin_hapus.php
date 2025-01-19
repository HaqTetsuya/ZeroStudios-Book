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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/admin' ?>">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Hapus Admin</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 connectedSortable">
                        <div class="card card-primary card-outline card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="fas fa-users"></i> Penguna Website <small> konfirmasi hapus pengguna</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/admin'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Kembali <i class="fas fa-arrow-left"></i>
                                    </button>
                                </a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <p>
                                    <b>Pengguna <?php echo $pengguna_hapus->pengguna_nama; ?> </b> akan dihapus. Dan semua artikel yang ditulis oleh
                                    <b><?php echo $pengguna_hapus->pengguna_nama; ?> </b> akan dipindahkan kepada ?
                                </p>
                                <hr>
                                <form method="post" action="<?php echo base_url('dashboard/admin_hapus_aksi'); ?>">
                                    <div class="form-group">
                                        <label>Nama Pengguna</label>
                                        <input type="hidden" name="pengguna_hapus" class="form-control" value="<?php echo $pengguna_hapus->pengguna_id; ?>">
                                        <select name="pengguna_tujuan" class="form-control" required>
                                            <option>--Pilih Pengguna--</option>
                                            <?php foreach ($pengguna_lain as
                                                $pl) { ?>
                                                <option value="<?php echo $pl->pengguna_id; ?>">
                                                    <?php echo $pl->pengguna_nama; ?>
                                                </option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                    <hr>
                                    <div class="row mb-3">
                                        <div class="form-group col-md-6 d-grid gap-2">
                                            <button type="submit" name="action" value="update" class="btn btn-block btn-success">Hapus Peran Admin</button>
                                        </div>
                                        <div class="form-group col-md-6 d-grid gap-2">
                                            <button type="submit" name="action" value="delete" class="btn btn-block btn-danger">Hapus Pengguna & Pindahkan Artikel</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->