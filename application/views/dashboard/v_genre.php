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
                        <li class="breadcrumb-item active" aria-current="page"><a href="">Genre</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="nav-icon fas fa-tags"></i> Data Genre | <small> Genre Buku</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/genre_tambah'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Tambah Genre <i class="fas fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Nama genre</th>
                                                <th>Slud genre</th>
                                                <th colspan="2" width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;

                                            foreach ($genre as $k) {
                                            ?>
                                                <tr>

                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $k->genre_nama; ?></td>
                                                    <td><?php echo $k->genre_slug ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/genre_edit/' . $k->genre_id; ?>">
                                                            <button class="btn btn-sm btn-warning">
                                                                <i class="nav-icon fas fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/genre_hapus/' . $k->genre_id; ?>">
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')">
                                                                <i class="nav-icon fas fa-trash"></i>
                                                            </button>
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