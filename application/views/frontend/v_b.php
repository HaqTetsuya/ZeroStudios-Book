<section class="anime-details spad">
    <div class="container">
        <div class="anime__details__content">
            <div class="row">
                <?php if (count($books) == 0) { ?>
                    <div class="col-lg-12">
                        <center class="mt-5">buku Tidak Ditemukan</center>
                    </div>
                <?php } else { ?>
                    <?php foreach ($books as $b) { ?>
                        <div class="col-lg-3">
                            <div class="anime__details__pic set-bg" data-setbg="<?php echo base_url('img/book/') . $b->buku_sampul ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="anime__details__text">
                                <div class="anime__details__title">
                                    <h3><?php echo $b->buku_judul; ?></h3>
                                </div>
                                <div class="anime__details__widget">
                                    <ul>
                                        <li><span>Penulis:</span> <?php echo $b->buku_penulis; ?> </li>
                                        <li><span>Studios:</span> Zero Studios Book</li>
                                        <li><span>Tahun:</span> 2016</li>
                                        <li><span>Status:</span> <?php echo $b->service_status; ?></li>
                                        <li><span>Genre:</span> <?php echo $b->genre_nama; ?></li>
                                    </ul>
                                </div>
                                <div class="anime__details__btn">
                                    <a href="#" class="follow-btn"><i>Rp. </i> <?php echo $b->buku_harga?>, 00</a>
                                    <a href="<?php echo $b->service_link; ?>" class="watch-btn"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="anime__details__synopsis">
                                <h4>Sinopsis:</h4>
                                <p><?php echo $b->buku_sinopsis; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <div class="anime__article">
                            <p style="color: white;">
                                <?php echo $books[0]->buku_judul; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Reviews</h5>
                    </div>
                    <?php
                    $subjeks = $books[0]->buku_judul;
                    $komen = $this->db->query("
                    SELECT * FROM comment,pengguna
                    WHERE komen_subjek = '$subjeks'
                    AND komen_pengguna = pengguna_id
                    ORDER BY komen_tanggal DESC")->result();

                    foreach ($komen as $k) {
                    ?>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="<?php echo base_url('/img/user/' . $k->pengguna_foto) ?>" alt="" />
                            </div>
                            <div class="anime__review__item__text">
                                <h6><?php echo $k->pengguna_nama; ?> - <span><?php echo $k->komen_tanggal; ?></span></h6>
                                <p>
                                    <?php echo $k->komen_konten; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Your Comment</h5>
                    </div>
                    <form action="<?php echo base_url('welcome/kirim_pesan') ?>" method="post">
                        <?php foreach ($books as $b) { ?>
                            <input type="hidden" name="tipe" value="buku">
                            <input type="hidden" name="id" value="<?php echo $b->service_id; ?>">
                            <input type="hidden" name="subjek" value="<?php echo $b->buku_judul; ?>">
                            <input type="hidden" name="slug" value="<?php echo $b->service_slug; ?>">
                        <?php } ?>
                        <textarea placeholder="Your Comment" id="pesan" name="konten"></textarea>
                        <button type="submit">
                            <i class="fa fa-location-arrow"></i> Review
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>
        </div>
    </div>
</section>