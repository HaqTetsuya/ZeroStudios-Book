<section class="normal-breadcrumb set-bg" data-setbg="<?php echo base_url() . 'assets/img/normal-breadcrumb.jpg' ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Halaman</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog spad blog-wrapper" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row d-flex justify-content-center">
                    <?php if (count($halaman) == 0) { ?>
                        <div class="col-lg-12">
                            <center class="mt-5">halaman Tidak Ditemukan</center>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($halaman as $h) { ?>
                            <div class="col-lg-12">
                                <div class="blog__details__title">                                    
                                    <h2><?php echo $h->halaman_judul ?></h2>
                                    <div class="blog__details__social">
                                        <a href="<?php echo $pengaturan->link_facebook; ?>" class="facebook"><i class="fas fa-facebook-square"></i> Facebook</a>
                                        <a href<?php echo $pengaturan->link_instagram; ?>" class="pinterest"><i class="fas fa-instagram"></i> Instagram</a>
                                        <a href="<?php echo $pengaturan->link_github; ?>" class="linkedin"><i class="fas fa-github"></i> Github</a>
                                        <a href="<?php echo $pengaturan->link_twitter; ?>" class="twitter"><i class="fas fa-twitter-square"></i> Twitter</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog__details__content">
                                    <?php echo $h->halaman_konten ?>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div> <!-- Tambahkan penutupan div di sini -->
            </div>
        </div>
    </div>
</section>