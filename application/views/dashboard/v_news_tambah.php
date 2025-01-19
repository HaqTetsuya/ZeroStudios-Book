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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/artikel' ?>">Artikel</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Artikel</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-12 connectedSortable">
                        <div class="card card-outline card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="nav-icon fas fa-newspaper"></i> Data Artikel |<small> Tambah Artikel Baru</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/artikel'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Kembali <i class="fas fa-arrow-left"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <form method="post" action="<?php echo base_url('dashboard/artikel_aksi'); ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="form-group">
                                                <label>Judul Artikel</label>

                                                <input type="text" name="judul" class="form-control" placeholder="Masukan Judul Artikel . . ." value="<?php echo set_value('judul'); ?>">
                                                <br>

                                                <?php echo form_error('judul'); ?>

                                            </div>

                                            <div class="form-group">
                                                <label>Konten Artikel</label>
                                                <?php echo form_error('konten'); ?>

                                                <textarea class="form-control summernote" name="konten" id="summernote"></textarea>

                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select class="form-control" name="kategori">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <?php
                                                    foreach ($kategori as $k) {
                                                    ?>
                                                        <option <?php if (set_value('kategori') == $k->kategori_id) {
                                                                    echo "selected='selected'";
                                                                } ?> value="<?php echo $k->kategori_id; ?>">
                                                            <?php echo $k->kategori_nama; ?>
                                                        </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                                <br>
                                                <?php echo form_error('kategori'); ?>
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" name="sampul" class="form-control">
                                                <br>
                                                <?php if (isset($gambar_error)) {

                                                    echo $gambar_error;
                                                }

                                                echo form_error('sampul');

                                                ?>
                                            </div>

                                            <div class="form-group  d-grid gap-2">

                                                <input type="submit" name="status" value="Draft" class="btn btn-sm btn-warning btn-block">
                                                <input type="submit" name="status" value="Publish" class="btn btn-sm btn-success btn-block">
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
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