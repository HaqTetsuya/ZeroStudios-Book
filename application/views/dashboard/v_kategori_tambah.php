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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/kategori' ?>">Kategori</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Kategori</a></li>
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
                                        <i class="nav-icon fas fa-th"></i> Data Kategori |<small> Tambah Kategori   |   </small>
                                    </h3>
                                    <a href="<?php echo base_url('dashboard/kategori'); ?>">
                                        <button class="btn btn-sm btn-success">
                                            Kembali <i class="fas fa-arrow-left"></i>
                                        </button>
                                    </a>
                                </div><!-- /.card-header -->
                                <div class="card-body">
                                    <form method="post" action="<?php echo base_url('dashboard/kategori_tambah_aksi'); ?>">
                                        <div class="form-group">
                                            <label>Nama Kategori</label>

                                            <input type="text" name="kategori" class="form-control" placeholder="Masukan Nama Kategori . . . " required>

                                            <?php echo form_error('kategori'); ?>
                                        </div>
                                        <div class="form-group">
                                            <hr>
                                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary">

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