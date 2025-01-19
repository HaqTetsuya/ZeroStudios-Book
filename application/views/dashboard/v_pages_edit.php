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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/pages' ?>">Page</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Edit Page</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-outline card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="nav-icon fas fa-copy"></i> Data Halaman |<small> Tambah Halaman Baru</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/pages'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Kembali <i class="fas  fa-arrow-left"></i>
                                    </button>
                                </a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <?php
                                foreach ($halaman as $h) {
                                ?>
                                    <form method="post" action="<?php echo base_url('dashboard/pages_update'); ?>">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Judul Halman</label>
                                                    <input type="hidden" name="id" class="form-control" value="<?php echo $h->halaman_id ?>">
                                                    <input type="text" name="judul" class="form-control" placeholder="Masukan Judul Halaman . . ." value="<?php echo $h->halaman_judul; ?>">
                                                    <br>
                                                    <?php echo form_error('judul'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Konten Halaman</label>

                                                    <?php echo form_error('konten'); ?>
                                                    <textarea class="form-control summernote" name="konten" id="konten">
                                                            <?php echo $h->halaman_konten; ?>
                                                        </textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <hr>
                                                <button type="submit" class="btn btn-sm btn-success btn-block" value="Publish">Publish</button>
                                            </div>
                                        </div><!-- /.row -->
                                    </form>
                                <?php
                                }
                                ?>
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