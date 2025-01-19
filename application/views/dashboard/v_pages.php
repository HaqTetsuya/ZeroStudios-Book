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
                        <li class="breadcrumb-item active" aria-current="page"><a href="">Page</a></li>
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
                                    <i class="nav-icon fas fa-copy"></i> Data Halaman | <small> Tabel Halaman</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/pages_tambah'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Buat Halaman Baru <i class="fas fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered tablehover">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Judul Halaman</th>
                                                <th>URL Slug</th>
                                                <th colspan="3" width="15%" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($halaman as $h) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $h->halaman_judul; ?></td>
                                                    <td><?php echo base_url() . "page/" . $h->halaman_slug; ?></td>
                                                    <td>
                                                        <a target="_blank" href="<?php echo base_url() . "page/" . $h->halaman_slug; ?>">
                                                            <button class="btn btn-sm btn-success "><i class="fa fa-eye"></i></button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/pages_edit/' . $h->halaman_id; ?>">
                                                            <button class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/pages_hapus/' . $h->halaman_id; ?>">
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