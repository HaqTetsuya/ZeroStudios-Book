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
                                    <i class="nav-icon fas fa-copy"></i> Data pesan | <small> Tabel pesan</small>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered tablehover">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Pengirim</th>
                                                <th>Waktu</th>
                                                <th width="20%">Subject pesan</th>
                                                <th width="40%">Pesan</th>
                                                <th width="3%" class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pesan as $p) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $p->pengguna_nama; ?></td>
                                                    <td><?php echo $p->komen_tanggal; ?></td>
                                                    <td><?php echo $p->komen_subjek; ?></td>
                                                    <td><?php echo $p->komen_konten; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/pesan_hapus/' . $p->komen_id; ?>">
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Pesan Ini ?')"><i class="navicon fas fa-trash"></i></button>
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