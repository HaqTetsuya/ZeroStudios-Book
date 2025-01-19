<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo d-flex">
                    <a class="d-flex" href="<?php echo base_url(''); ?>">
                        <img src="<?php echo base_url() . '/img/website/' . $pengaturan->logo; ?>" alt="" width="30px" class="mr-2">
                        <div class="page-title">
                            <h5><?php echo $pengaturan->nama; ?></h5>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="<?php echo base_url('index.html'); ?>">Homepage</a></li>
                        <li><a href="<?php echo base_url('page/tentang-kami'); ?>">Tentang Kami</a></li>
                        <li><a href="<?php echo base_url('page/kontak-kami'); ?>">Kontak</a></li>
                </div>
            </div>
            <div class="col-lg-3">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | This template is made with
                    <i class="fa fa-heart" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="<?php echo base_url('assets/jquery/jquery-3.7.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/all.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/player.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nice-select.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/mixitup.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slicknav.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/main3.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $(".hero__slider").owlCarousel({
            loop: true,
            margin: 0,
            items: 1,
            dots: true,
            nav: true,
            navText: ["<span class='arrow arrow_carrot-left'></span>", "<span class='arrow arrow_carrot-right'></span>"],
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed: 1200,
            autoHeight: false,
            autoplay: true,
            mouseDrag: false
        });
    });

    $('.set-bg').each(function() {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });
</script>
</body>

</html>