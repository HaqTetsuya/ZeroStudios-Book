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
                        <li class="breadcrumb-item active" aria-current="page"><a href="">User</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline card-info">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3 class="card-title">
                                    <i class="nav-icon fas fa-users"></i> Data Pengguna | <small> Tabel Pengguna</small>
                                </h3>
                                <a href="<?php echo base_url('dashboard/pengguna_tambah'); ?>">
                                    <button class="btn btn-sm btn-success">
                                        Tambah Pengguna <i class="fas fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="search">
                                    <form action="<?php echo base_url('dashboard/cari_user')?>" method="post">                                        
                                        <input class="form-control" type="text" name="cari" id="cari" style="max-width: 200px;">
                                        <button class="btn btn-danger" type="submit">Cari</button>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered tablehover">
                                        <thead>
                                            <tr>
                                                <th width="1%">No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <!--th>Level</th-->
                                                <th>Status</th>
                                                <th colspan="3" class="text-center" width="10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($pengguna as $p) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo $p->pengguna_nama; ?></td>
                                                    <td><?php echo $p->pengguna_email; ?></td>
                                                    <td><?php echo $p->pengguna_username; ?></td>
                                                    <!--td><? //php echo $p->pengguna_level; 
                                                            ?></td-->
                                                    <td>
                                                        <?php
                                                        if ($p->pengguna_status == 1) {
                                                            echo "Aktif";
                                                        } else {
                                                            echo "Tidak Aktif";
                                                        }
                                                        ?>

                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/see_profile/' . $p->pengguna_id; ?>">
                                                            <button class="btn btn-sm btn-success ">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/pengguna_edit/' . $p->pengguna_id; ?>">
                                                            <button class="btn btn-sm btn-warning">
                                                                <i class="nav-icon fas fa-edit"></i>
                                                            </button>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url() . 'dashboard/pengguna_hapus/' . $p->pengguna_id; ?>">
                                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus Data Ini ?')">
                                                                <i class="navicon fas fa-trash"></i>
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