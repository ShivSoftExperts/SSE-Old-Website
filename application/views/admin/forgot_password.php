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
    </head>

    <body class="gray-bg">
        <div class="passwordBox animated fadeInDown">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox-content">
                        <h2 class="font-bold">Forgot password</h2>
                        <p>
                            Enter your email address and your password will be reset and emailed to you.
                        </p>
                        <div class="row">
                            <div class="col-lg-12">
                                <form class="m-t" role="form" method="post" action="<?= base_url(); ?>admin/login/forgot_password" autocomplete="off">
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" placeholder="Username" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-primary block full-width m-b" value="Send new password" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
        </div>


        <?php
        $this->load->view('admin/includes/footer');
        ?>