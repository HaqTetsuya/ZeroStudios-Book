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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Home</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <section class="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box" style="background-color: #0f0f0f;">
                                <div class="inner">
                                    <h3><?php echo $jumlah_artikel; ?></h3>
                                    <p>Jumlah Artikel</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="<?php echo base_url() . 'dashboard/artikel'; ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
                            </div><!-- /.small-box -->
                        </div>

                        <?php
                        if ($this->session->userdata('level') == "admin") {
                        ?>
                            <div class="col-lg-3 col-6">
                                <div class="small-box" style="background-color: #181818;">
                                    <div class="inner">
                                        <h3><?php echo $jumlah_service; ?></h3>
                                        <p>Jumlah buku</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="<?php echo base_url() . 'dashboard/service'; ?>" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                                </div><!-- /.small box -->
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box" style="background-color: #252525;">
                                    <div class="inner">
                                        <h3><?php echo $jumlah_pengguna; ?></h3>
                                        <p>Jumlah Pengguna</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="<?php echo base_url() . 'dashboard/pengguna'; ?>" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box" style="background-color: #3d3d3d;">
                                    <div class="inner">
                                        <h3><?php echo $jumlah_komentar; ?></h3>
                                        <p>Jumlah Pesan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="<?php echo base_url() . 'dashboard/pesan'; ?>" class="small-box-footer">Selengkapnya<i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </section>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <section class="col-lg-12 connectedSortable">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-home"></i> Dashboard
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <h3>Selamat Datang !</h3>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover">
                                        <tr>
                                            <th width="10%">Nama</th>
                                            <th width="1%">:</th>
                                            <td>
                                                <?php
                                                $id_user = $this->session->userdata('id');
                                                $user = $this->db->query("select * from pengguna where pengguna_id='$id_user'")->row();
                                                ?>
                                                <p><?php echo $user->pengguna_nama; ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="10%">Username</th>
                                            <th width="1%">:</th>
                                            <td>
                                                <p><?php echo $this->session->userdata('username') ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="20%">Hak Akses</th>
                                            <th width="1%">:</th>
                                            <td>
                                                <p><?php echo $this->session->userdata('level') ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="10%">Status</th>
                                            <th width="1%">:</th>
                                            <td>
                                                <p>Aktif</p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div><!-- /.card-body -->
                        </div>
                    </section><!-- /.card -->
                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->