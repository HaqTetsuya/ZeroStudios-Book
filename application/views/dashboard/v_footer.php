</div>
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda Yakin Ingin Keluar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('login/logout'); ?>" class="btn btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/all.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/main.js'); ?>"></script>
<script src="<?php echo base_url('assets/jquery/jquery-3.7.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/summernote/summernote-lite.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $(".summernote").summernote();
        $('.dropdown-toggle').dropdown();
    });
</script>
</body>

</html>