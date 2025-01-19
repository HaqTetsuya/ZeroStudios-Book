<section class="hero">
    <div class="container">
        <div class="hero__slider owl-carousel">
            <?php foreach ($buku as $b) {
            ?>
                <div class="hero__items set-bg" data-setbg="<?php echo base_url('/img/book/') . $b->buku_sampul; ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                <a href="">
                                    <div class="label"><?php echo $b->genre_nama ?></div>
                                </a>
                                <h2><?php echo $b->buku_judul ?></h2>
                                <p><?php echo $b->buku_sinopsis ?></p>
                                <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
    </div>
</section>

<section class="product spad">
    <div class="container">
        <div class="row"> 
            <div class="col-md-8">
                
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>
        </div>
</section>