<section class="normal-breadcrumb set-bg" data-setbg="<?php echo base_url() . 'assets/img/normal-breadcrumb.jpg' ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Artikel Kami</h2>
                    <p>Selamat datang di page berita Zero Studios</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog spad blog-wrapper" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (count($artikel) == 0) { ?>
                    <div class="post-meta p-3">
                    <center>
                        <h2>Artikel yang dicari tidak ada.</h2>
                    </center>
                        </div>
                <?php } ?>
                <?php foreach ($artikel as $a) { ?>
                    <div class="post-box mb-4">
                        <div class="post-thumb">
                            <?php if ($a->artikel_sampul != "") { ?>
                                <div class="image-container">
                                    <img src="<?php echo base_url() . '/img/artikel/' . $a->artikel_sampul ?>" alt="<?php echo $a->artikel_judul ?>">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="post-meta p-3">
                            <a href="<?php echo base_url() . $a->artikel_slug; ?>">
                                <h2 class="article-title"><?php echo $a->artikel_judul; ?></h2>
                            </a>
                        </div>
                        <div class="blog-footer">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <i class="fas fa-pencil"></i>
                                    <a href="#"><?php echo $a->pengguna_nama ?></a>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fas fa-tag"></i>
                                    <a href="<?php echo base_url() . $a->kategori_slug; ?>" class="text-primary">
                                        <?php echo $a->kategori_nama ?>
                                    </a>
                                </li>
                            </ul>
                            <span class="artikel-tanggal"><?php echo date('F d, Y', strtotime($a->artikel_tanggal)); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <nav aria-label="Page navigation" class="mt-4">
                    <?php echo $this->pagination->create_links(); ?>
                </nav>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>
        </div>
    </div>
</section>