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
                        <li class="breadcrumb-item active" aria-current="page"><a href="">Service</a></li>
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
                                    <i class="nav-icon fas fa-clipboard"></i> Data Layanan | <small> Tabel Layanan</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/service_tambah'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Tambah Layanan <i class="fas fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Tanggal</th>
                                                <th>Judul</th>
                                                <th>Genre</th>
                                                <th width="10%">Sampul</th>
                                                <th>Link</th>
                                                <th>Status</th>
                                                <th width="15%" colspan="3">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($service as $a) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $a->service_tanggal; ?></td>
                                                    <td><?= $a->buku_judul; ?><br>
                                                        <small class="hidden"><?php echo base_url() . "" . $a->service_slug; ?></small>
                                                    </td>

                                                    <td><?= $a->genre_nama; ?></td>
                                                    <td>
                                                        <img width="100%" class="img-responsive" src="<?php echo base_url('/img/book/') . $a->buku_sampul; ?>">
                                                    </td>
                                                    <td><a href="<?= $a->service_link; ?>"><?= $a->service_link; ?></a></td>
                                                    <td><?= $a->service_status; ?></td>
                                                    <td>
                                                        <a target="_blank" href="<?php echo base_url('book/') . $a->service_slug; ?>">
                                                            <button class="btn btn-sm btn-success "><i class="fa fa-eye"></i></button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/service_edit/' . $a->service_id; ?>">
                                                            <button class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/service_hapus/' . $a->service_id; ?>">
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="navicon fas fa-trash"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
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