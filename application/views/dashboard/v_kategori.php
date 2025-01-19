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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Kategori</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="nav-icon fas fa-th"></i> Data Kategori | <small> Kategori Artikel</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/kategori_tambah'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Tambah Kategori <i class="fas fa-plus"></i>
                                    </button>
                                </a>
                            </div>

                            <div class="card-body">

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>Nama Kategori</th>
                                            <th>Slud Kategori</th>
                                            <th width="10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;

                                        foreach ($kategori as $k) {
                                        ?>
                                            <tr>

                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $k->kategori_nama; ?></td>
                                                <td><?php echo $k->kategori_slug ?></td>
                                                <td>
                                                    <a href="<?php echo base_url() . 'dashboard/kategori_edit/' . $k->kategori_id; ?>"><button class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></button></a>

                                                    <a href="<?php echo base_url() . 'dashboard/kategori_hapus/' . $k->kategori_id; ?>"><button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')"><i class="nav-icon fas fa-trash"></i></button></a>

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
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->