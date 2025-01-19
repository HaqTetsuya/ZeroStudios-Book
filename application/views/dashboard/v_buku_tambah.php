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
                        <li class="breadcrumb-item"><a href="<?php echo base_url() . 'dashboard/buku' ?>">Buku</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Tambah Buku</a></li>
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
                                    <i class="nav-icon fas fa-book"></i> Data Buku |<small> Tambah Buku Baru</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/buku'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Kembali <i class="fas fa-arrow-left"></i>
                                    </button>
                                </a>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <form action="<?php echo base_url('dashboard/buku_aksi') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row mb-3">
                                        <div class="form-group col-md-9">
                                            <label for="buku_judul" class="form-label">Judul Buku</label>
                                            <input type="text" class="form-control" id="buku_judul" name="buku_judul" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="buku_genre" class="form-label">Genre Buku</label>
                                            <select class="form-select" id="buku_genre" name="buku_genre" required>
                                                <option value="" disabled selected>Pilih Genre</option>
                                                <?php
                                                foreach ($genre as $k) {
                                                ?>
                                                    <option <?php if (set_value('genre') == $k->genre_id) {
                                                                echo "selected='selected'";
                                                            } ?> value="<?php echo $k->genre_id; ?>">
                                                        <?php echo $k->genre_nama; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                                <!-- Add more options as needed -->
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-md-4">
                                            <label for="buku_sampul" class="form-label">Sampul Buku</label>
                                            <input type="file" class="form-control" id="buku_sampul" name="buku_sampul" required>
                                            <?php if (isset($gambar_error)) {

                                                echo $gambar_error;
                                            }

                                            echo form_error('sampul');

                                            ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="buku_penulis" class="form-label">Penulis Buku</label>
                                            <input type="text" class="form-control" id="buku_penulis" name="buku_penulis" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="buku_harga" class="form-label">Harga Buku</label>
                                            <input type="number" class="form-control" id="buku_harga" name="buku_harga" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="form-group col-md-12">
                                            <label for="buku_sinopsis" class="form-label">Sinopsis Buku</label>
                                            <textarea class="form-control" id="buku_sinopsis" name="buku_sinopsis" rows="5" required></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <button type="submit" class="btn btn-primary">Submit</button>
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