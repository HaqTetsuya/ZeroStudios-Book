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
                        <li class="breadcrumb-item active" aria-current="page"><a href="">Buku</a></li>
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
                                    <i class="nav-icon fas fa-book"></i> Data Buku | <small> Tabel buku</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/buku_tambah'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Tambah Buku <i class="fas fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Judul</th>
                                                <th width="10%">Gambar</th>
                                                <th>Penulis</th>
                                                <th>Genre</th>
                                                <th>Harga</th>
                                                <th class="text-center" width="15%" colspan="2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($buku as $a) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $a->buku_judul; ?></td>
                                                    <td>
                                                        <img width="100%" class="img-responsive" src="<?php echo base_url('/img/book/') . $a->buku_sampul; ?>">
                                                    </td>
                                                    <td><?php echo $a->buku_penulis ?></td>
                                                    <td><?php echo $a->genre_nama ?></td>
                                                    <td><?php echo $a->buku_harga ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/buku_edit/' . $a->buku_id; ?>">
                                                            <button class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/buku_hapus/' . $a->buku_id; ?>">
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="navicon fas fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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