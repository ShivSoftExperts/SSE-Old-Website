<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | <?= $settings->title; ?></title>
    <link rel="shortcut icon" href="<?= FILE_PATH . $settings->favicon; ?>" />
    <link href="<?= base_url(); ?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>admin_assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?= base_url(); ?>admin_assets/css/animate.css" rel="stylesheet">
    <link href="<?= base_url(); ?>admin_assets/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
    </link>
</head>
<style type="text/css">
    .loginColumns {
        padding-top: 30px;
    }

    .m-t a,
    form a,
    label {
        color: #000;
    }

    .m-t a:hover,
    form a:hover {
        color: #337ab7;
    }
</style>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="ibox-content">

                    <img src="<?= base_url() . $settings->logo; ?>" class="img-responsive">
                    <div class="col-md-8 col-md-offset-2">
                        <form class="" autocomplete="off" action="<?= base_url(); ?>admin/login/login" method="post">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <br />
                            <h2 class="font-bold text-center"><b>LOGIN</b></h2>
                            <div class="form-group">
                                <label for="Username">Username</label>
                                <input type="text" id="Username" class="form-control" name="username" placeholder="Username" required="">
                            </div>
                            <div class="form-group">
                                <label for="Password">Password</label>
                                <input type="password" id="Password" class="form-control" name="password" placeholder="Password" required="">
                            </div><br>
                            <input type="submit" name="login" class="btn btn-primary block full-width m-b" value="Login">


                            <a href="<?= base_url(); ?>admin/login/forgot_password">
                                <small>Forgot password?</small>
                            </a>

                        </form>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <p class="m-t" style="font-size: 11px;">
                        &copy; <a href="#"><?= date('Y'); ?> <?= $settings->title; ?></a> | <a href="#" target="_blank">Privacy Policy</a> | <a href="#" target="_blank">Terms of Use</a>
                        <span class="pull-right">Powered By <a href="#">Raja Ramesh</a></span>
                    </p>
                </div>
            </div>
        </div>

        <!--            <div class="row" style="color: #000;padding-top: 30px">
                            <hr/>
                            <div class="col-md-6">
                                Copyright <a href="#">TwinLity</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <small>&copy; <?= date('Y'); ?>-<?= date('Y', strtotime('+1 years')); ?></small>
                            </div>
                        </div>-->
    </div>

    <script src="<?= base_url(); ?>admin_assets/js/jquery-2.1.1.js"></script>
    <script src="<?= base_url() ?>admin_assets/js/plugins/toastr/toastr.min.js"></script>

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
                <?= ((validation_errors()) && (null !== validation_errors())) ? "toastr.warning('" . removeNewLine(removepTag(validation_errors())) . "');" : "" ?>
            }, 1300);
            //Date picker script starts here

        });

        $(function() {
            $('.number').on('keydown', function(e) {
                -1 !== $.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) || /65|67|86|88/.test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey) || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey || 48 > e.keyCode || 57 < e.keyCode) && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
            });
        });
    </script>

</body>

</html>