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
                        <li class="breadcrumb-item active" aria-current="page"><a href="#">Pengaturan</a></li>
                    </ol>
                </nav>
            </div>
            <hr>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-lg-12 connectedSortable">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-edit"></i> Update Informasi Website
                                </h3>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <?php
                                if (isset($_GET['alert'])) {
                                    if ($_GET['alert'] == "sukses") {
                                        echo "<div class='alert alert-success'> Pengaturan Berhasil diupdate !</div>";
                                    }
                                }
                                foreach ($pengaturan as $p) {
                                ?>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <form action="<?php echo base_url() . 'dashboard/pengaturan_update' ?>" method="post" enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label>Nama Website</label>
                                                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Website . . ." value="<?php echo $p->nama; ?>">
                                                    <?php echo form_error('nama'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi Website</label>
                                                    <input type="text" name="deskripsi" class="form-control" placeholder="Masukan Deskripsi Website . . ." value="<?php echo $p->deskripsi; ?>">
                                                    <?php echo form_error('deskripsi'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Logo Website</label>
                                                    <input type="file" name="logo" class="form-control">
                                                    <small>Kosongkan bila tidak inggin mengganti logo website</small>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link Facebook</label>
                                                    <input type="text" name="link_facebook" class="form-control" placeholder="Masukan link Facebook . . ." value="<?php echo $p->link_facebook; ?>">
                                                    <?php echo form_error('link_facebook'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link Twitter</label>
                                                    <input type="text" name="link_twitter" class="form-control" placeholder="Masukan link Twitter . . ." value="<?php echo $p->link_twitter; ?>">
                                                    <?php echo form_error('link_twitter'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link Instagram</label>
                                                    <input type="text" name="link_instagram" class="form-control" placeholder="Masukan link Instagram . . ." value="<?php echo $p->link_instagram; ?>">
                                                    <?php echo form_error('link_instagram'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <label>Link Github</label>
                                                    <input type="text" name="link_github" class="form-control" placeholder="Masukan link Githup . . ." value="<?php echo $p->link_github; ?>">
                                                    <?php echo form_error('link_githup'); ?>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <input type="submit" value="Update" class="btn btn-success btn-block">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4" align="center">
                                            <div class="form-group">
                                                <label>Logo Webiste</label><br>
                                                <img width="70%" class="imgresponsive" src="<?php echo base_url() . '/img/website/' . $p->logo; ?>" alt="Logo <?php echo $p->nama; ?>">
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
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