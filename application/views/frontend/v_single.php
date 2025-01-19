<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row d-flex justify-content-center">
                    <?php if (count($artikel) == 0) { ?>
                        <div class="col-lg-12">
                            <center class="mt-5">Artikel Tidak Ditemukan</center>
                        </div>
                    <?php } else { ?>
                        <?php foreach ($artikel as $a) { ?>
                            <div class="col-lg-12">
                                <div class="blog__details__title">
                                    <h6><a href="<?php echo base_url('kategori/') . $a->kategori_slug ?>"><?php echo $a->kategori_nama ?></a> <span>- <?php echo $a->artikel_tanggal ?></span></h6>
                                    <h2><?php echo $a->artikel_judul ?></h2>
                                    <div class="blog__details__social">
                                        <a href="<?php echo $pengaturan->link_facebook; ?>" class="facebook"><i class="fas fa-facebook-square"></i> Facebook</a>
                                        <a href<?php echo $pengaturan->link_instagram; ?>" class="pinterest"><i class="fas fa-instagram"></i> Instagram</a>
                                        <a href="<?php echo $pengaturan->link_github; ?>" class="linkedin"><i class="fas fa-github"></i> Github</a>
                                        <a href="<?php echo $pengaturan->link_twitter; ?>" class="twitter"><i class="fas fa-twitter-square"></i> Twitter</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog__details__pic">
                                    <img src="<?php echo base_url('img/artikel/') . $a->artikel_sampul ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="blog__details__content">
                                    <?php echo $a->artikel_konten ?>
                                    <!--div class="blog__details__form">
                                        <h4>Leave A Comment</h4>
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <input type="text" placeholder="Name">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <input type="text" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12">
                                                    <textarea placeholder="Message"></textarea>
                                                    <button type="submit" class="site-btn">Send Message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div-->
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="anime__details__review">
                    <div class="section-title">
                        <h5>Komentar</h5>
                    </div>
                    <?php
                    $subjeks = $artikel[0]->artikel_judul;
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
                        <?php foreach ($artikel as $b) { ?>
                            <input type="hidden" name="tipe" value="artikel">
                            <input type="hidden" name="id" value="<?php echo $b->artikel_id; ?>">
                            <input type="hidden" name="subjek" value="<?php echo $b->artikel_judul; ?>">
                            <input type="hidden" name="slug" value="<?php echo $b->artikel_slug; ?>">
                        <?php } ?>
                        <textarea placeholder="Your Comment" id="pesan" name="konten"></textarea>
                        <button type="submit">
                            <i class="fa fa-location-arrow"></i> Komentar
                        </button>
                    </form>
                </div> <!-- Tambahkan penutupan div di sini -->
            </div> <!-- Tutup div col-md-8 di sini -->
            <div class="col-lg-4 col-md-6 col-sm-8">
                <?php $this->load->view('frontend/v_sidebar'); ?>
            </div>
        </div>
    </div>
</section>