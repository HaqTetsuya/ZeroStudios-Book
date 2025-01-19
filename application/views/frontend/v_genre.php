<section class="normal-breadcrumb set-bg" data-setbg="<?php echo base_url() . 'assets/img/normal-breadcrumb.jpg' ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Buku Kami</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-page spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="category">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8">
                            <div class="section-title">
                                <h4>Buku</h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (count($books) == 0) { ?>
                        <div class="post-meta p-3">
                            <center>
                                <h2>Buku yang dicari tidak ada.</h2>
                            </center>
                        </div>
                    <?php } ?>
                    <!-- Books under this category -->
                    <div class="row">
                        <?php foreach ($books as $book) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="<?php echo base_url('/img/book/' . $book->buku_sampul); ?>">
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li><?php echo $book->genre_nama; ?></li>
                                        </ul>
                                        <h5>
                                            <a href="<?php echo base_url('book/') . $book->service_slug; ?>"><?php echo $book->buku_judul; ?></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>
        </div>
</section>