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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/service' ?>">service</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Update Layanan</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12 connectedSortable">
                    <div class="card card-outline card-info">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3 class="card-title">
                                <i class="nav-icon fas fa-clipboard"></i> Data Layanan |<small> Tambah Layanan Baru</small>
                            </h3>
                            <a href="<?php echo base_url('dashboard/service'); ?>">
                                <button class="btn btn-sm btn-success">
                                    Kembali <i class="fas fa-arrow-left"></i>
                                </button>
                            </a>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <?php
                            foreach ($service as $a) {
                            ?>
                                <form action="<?php echo base_url('dashboard/service_update') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="col-md-12 form-group">
                                            <label for="buku_judul" class="form-label">Judul Buku</label>
                                            <input type="hidden" name="id" value="<?php echo $a->service_id; ?>">
                                            <select class="form-select" id="buku_judul" name="buku_id">
                                                <option value="">Pilih Judul Buku</option>

                                                <?php
                                                foreach ($buku as $b) {
                                                ?>
                                                    <option <?php if ($a->service_buku == $b->buku_id) {
                                                                echo "selected='selected'";
                                                            } ?> value=" <?php echo $b->buku_id; ?>">
                                                        <?php echo $b->buku_judul; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <?php echo form_error('buku_id'); ?>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-12 form-group">
                                            <label for="service_konten" class="form-label">Konten Service</label>
                                            <textarea class="form-control summernote" id="" name="service_konten" rows="5" required style="color: black;"><?php echo $a->service_konten; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 form-group">
                                            <label for="service_link" class="form-label">Link Service</label>
                                            <input type="url" class="form-control" id="service_link" name="service_link" value="<?php echo $a->service_link; ?>" required>
                                        </div>
                                        <div class="col-md-3 d-grid gap-2" style="padding-top: 10px;">
                                            <label for="service_status" class="form-label"></label>
                                            <button type="submit" name="service_status" value="draft" class="btn btn-block btn-secondary">Draft</button>
                                        </div>
                                        <div class="col-md-3 d-grid gap-2" style="padding-top: 10px;">
                                            <label for="service_status" class="form-label"></label>
                                            <button type="submit" name="service_status" value="publish" class="btn btn-block btn-primary">Publish</button>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- /.card-body -->
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