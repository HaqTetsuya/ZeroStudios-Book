<div class="side-bar">
    <div class="side-header">
        <div class="list-item">
            <a href="#" class="nav-link">
                <img src="" alt="" class="icon">
                <span class="description-header">
                    SISTEM INFORMASI DATA PELATIHAN
                </span>
            </a>
        </div>
        <div class="bipa-logo d-flex justify-content-center">
            <a href="#">
                <img src="<?php echo base_url() . 'assets/images/bipa.png'; ?>" alt="">
            </a>
        </div>
    </div>
    <div class="main-menu">
        <div class="list-item <?php echo ($active_page == 'dashboard') ? 'active' : ''; ?>">
            <a href="<?php echo base_url() . 'page' ?>">
                <span class="description">
                    <i class="fas fa-tachometer-alt" style="margin-right: 12; font-size:24;"></i>
                    Dashboard
                </span>
            </a>
        </div>
        <div class="list-item <?php echo ($active_page == 'tabel') ? 'active' : ''; ?>">
            <a href="<?php echo base_url() . 'page/peserta' ?>">
                <span class="description">
                    <i class="fas fa-table" style="margin-right: 12px; font-size:24;"></i>
                    Tabel
                </span>
            </a>
        </div>
        <div class="list-item <?php echo ($active_page == 'input') ? 'active' : ''; ?>">
            <a href="<?php echo base_url() . 'page/input_data' ?>">
                <span class="description">
                    <i class="fas fa-user-plus " style="margin-right: 12px; font-size:24;"></i>
                    Input Data
                </span>
            </a>
        </div>
        <?php if ($this->session->userdata('akses') == '1') : ?>
            <div class="list-item <?php echo ($active_page == 'users') ? 'active' : ''; ?>">
                <a href="<?php echo base_url() . 'page/users' ?>">
                    <span class="description">
                        <i class="fas fa-users" style="margin-right: 8px; font-size:24;"></i>
                        Pengguna
                    </span>
                </a>
            </div>
        <?php endif; ?>
        
    </div>
</div>