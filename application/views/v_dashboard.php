<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIDAPEL</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/style.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/all.min.css'; ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/all.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
</head>

<body>
    <div class="container-fluid">
        <?php $this->load->view('menu'); ?>
        <?php $this->load->view('sidebar'); ?>
        <div class="main-content">
            <div class="container mt-3 text-center">
                <?php if ($this->session->userdata('akses') == '1') : ?>
                    <div class="row mt-4 shortcut-icons-container">
                        <div class="col-md-4 mx-auto shortcut">
                            <a href="<?php echo base_url() . 'page/peserta' ?>">
                                <div class="card">
                                    <i class="fas fa-address-card fa-4x shortcut-icon"></i>
                                    <div class="card-body">
                                        <p class="card-text mt-2">Data Peserta</p>
                                    </div>
                                </div>
                            </a>
                            <h4>Daftar peserta pelatihan</h4>
                        </div>
                        <div class="col-md-4 mx-auto shortcut">
                            <a href="<?php echo base_url() . 'page/input_data' ?>">
                                <div class="card">
                                    <i class="fas fa-users fa-4x shortcut-icon"></i>
                                    <div class="card-body">
                                        <p class="card-text mt-2">Input Data</p>
                                    </div>
                                </div>
                            </a>
                            <h4>Tambah Daftar Peserta Pelatihan</h4>
                        </div>
                        <div class="col-md-4 mx-auto shortcut">
                            <a href="<?php echo base_url() . 'page/users' ?>">
                                <div class="card">
                                    <i class="fas fa-credit-card fa-4x shortcut-icon"></i>
                                    <div class="card-body">
                                        <p class="card-text mt-2">Users</p>
                                    </div>
                                </div>
                            </a>
                            <h4>Cek daftar Pengguna</h4>
                        </div>
                    </div>
                    <?php elseif ($this->session->userdata('akses') == '2') : ?>
                    <div class="row mt-4 shortcut-icons-container">
                        <div class="col-md-4 mx-auto shortcut">
                            <a href="<?php echo base_url() . 'page/peserta' ?>">
                                <div class="card">
                                    <i class="fas fa-address-card fa-4x shortcut-icon"></i>
                                    <div class="card-body">
                                        <p class="card-text mt-2">Data Peserta</p>
                                    </div>
                                </div>
                            </a>
                            <h4>Daftar peserta pelatihan</h4>
                        </div>
                        <div class="col-md-4 mx-auto shortcut">
                            <a href="<?php echo base_url() . 'page/input_data' ?>">
                                <div class="card">
                                    <i class="fas fa-users fa-4x shortcut-icon"></i>
                                    <div class="card-body">
                                        <p class="card-text mt-2">Input Data</p>
                                    </div>
                                </div>
                            </a>
                            <h4>Tambah Daftar Peserta Pelatihan</h4>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
    <?php $this->load->view('logout'); ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var panelHeadings = document.querySelectorAll('.panel-heading');

            panelHeadings.forEach(function(panelHeading) {
                panelHeading.addEventListener('mouseenter', function() {
                    var collapse = this.closest('.panel').querySelector('.collapse');
                    if (collapse) {
                        collapse.classList.add('show');
                    }
                });

                panelHeading.addEventListener('mouseleave', function() {
                    var collapse = this.closest('.panel').querySelector('.collapse');
                    if (collapse) {
                        collapse.classList.remove('show');
                    }
                });
            });
        });
    </script>
</body>

</html>