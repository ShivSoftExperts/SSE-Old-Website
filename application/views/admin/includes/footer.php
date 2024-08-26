<div class="footer">
    &copy; <a href="#"><?= date('Y'); ?> <?= $settings->title; ?></a> | <a href="#" target="_blank">Privacy Policy</a> | <a href="#" target="_blank">Terms of Use</a>
    <span class="pull-right">Developed By <a href="#" target="_blank">Raja Ramesh</a></span>
</div>
</div>

<!-- For color picker -->
<script src="<?= base_url(); ?>admin_assets/js/jscolor.js"></script>

<!-- Mainly scripts -->
<script src="<?= base_url(); ?>admin_assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Date picker -->
<script src="<?= base_url(); ?>admin_assets/jquery-ui-1.12.1.custom/jquery-ui.js"></script>


<!-- Flot -->
<script src="<?= base_url(); ?>admin_assets/js/plugins/flot/jquery.flot.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/flot/jquery.flot.symbol.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/flot/curvedLines.js"></script>

<!-- Peity -->
<script src="<?= base_url(); ?>admin_assets/js/plugins/peity/jquery.peity.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?= base_url(); ?>admin_assets/js/inspinia.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="<?= base_url(); ?>admin_assets/js/plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Jvectormap -->
<script src="<?= base_url(); ?>admin_assets/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url(); ?>admin_assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Sparkline -->
<script src="<?= base_url(); ?>admin_assets/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="<?= base_url(); ?>admin_assets/js/demo/sparkline-demo.js"></script>

<!-- Sweet alert -->
<script src="<?= base_url(); ?>admin_assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<!-- ChartJS-->
<script src="<?= base_url(); ?>admin_assets/js/plugins/chartJs/Chart.min.js"></script>

<script src="<?= base_url() ?>admin_assets/js/plugins/toastr/toastr.min.js"></script>

<!-- validate -->
<script src="<?= base_url() ?>admin_assets/js/plugins/validate/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>admin_assets/js/plugins/validate/additional-methods.min.js"></script>
<!-- iCheck -->
<script src="<?= base_url() ?>admin_assets/js/plugins/iCheck/icheck.min.js"></script>

<!-- blueimp gallery -->
<script src="<?= base_url() ?>admin_assets/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<script>
    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };
            <?php if ($this->session->flashdata('success_message')) { ?>
                toastr.success(<?= $this->session->flashdata('success_message') ?>);
            <?php } ?>
            <?php if ($this->session->flashdata('error_message')) { ?>
                toastr.error(<?= $this->session->flashdata('error_message') ?>);
            <?php } ?>
            <?php if ($this->session->flashdata('warning_message')) { ?>
                toastr.warning(<?= $this->session->flashdata('warning_message') ?>);
            <?php } ?>
            <?php /* <?= ((validation_errors()) && (null !== validation_errors())) ? "toastr.warning('".removeNewLine(removepTag(validation_errors()))."');":"" */ ?>
        }, 1300);
        //Date picker script starts here
    });
    $(function() {
        $('.number').on('keydown', function(e) {
            -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
        });
    });
</script>

<script src="<?= base_url() ?>admin_assets/js/plugins/dataTables/datatables.min.js"></script>


<!-- Page-Level Scripts -->
<script>
    $(document).on("click", '.logout', function() {
        var del_id = $(this).val();
        swal({
                title: "Are you sure",
                text: "You Want to Logout?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Logout!",
                closeOnConfirm: false
            },
            function() {
                <?php if ($this->session->userdata('user_type') == 'admin') { ?>
                    window.location = "<?= base_url(); ?>admin/login/logout";
                <?php } else { ?>
                    window.location = "<?= base_url(); ?>admin/staff/logout";
                <?php } ?>
            });
    });

    $(document).ready(function() {
        $('.dataTables').DataTable({
            pageLength: 10,
            responsive: true,
        });
    });
</script>

<script>
    function check_file_size(val) {

        var uploadField = document.getElementById(val);
        var FileName = uploadField.files[0].name;
        var FileExtension = FileName.split('.')[FileName.split('.').length - 1]; //alert(FileExtension);
        if (!(FileExtension == 'jpg' || FileExtension == 'JPG' || FileExtension == 'jpeg' || FileExtension == 'JPEG' || FileExtension == 'png' || FileExtension == 'PNG' || FileExtension == 'WEBP' || FileExtension == 'webp')) {
            swal({
                title: "Warning!",
                text: "Please Upload Image Files(PNG/JPG/JPEG/WEBP) Only",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                closeOnConfirm: false
            });
            document.getElementById(val).value = "";
        } else if (uploadField.files[0].size > 5000000) {
            swal({
                title: "Warning!",
                text: "Max upload size 5 MB",
                type: "warning",
                showCancelButton: false,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "OK",
                closeOnConfirm: false
            });
            document.getElementById(val).value = "";
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<script src="<?= base_url() ?>admin_assets/js/ckeditor/ckeditor.js"></script>

</body>

</html>