<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $page_title; ?> | <?= $settings->title; ?>
    </title>
    <link rel="shortcut icon" href="<?= base_url() . $settings->favicon; ?>" />
    <link href="<?= base_url(); ?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>admin_assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/js/plugins/toastr/toastr.min.css" rel="stylesheet">
    </link>
    <link href="<?= base_url() ?>admin_assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?= base_url() ?>admin_assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?= base_url(); ?>admin_assets/css/animate.css" rel="stylesheet">

    <link href="<?= base_url(); ?>admin_assets/css/style.css" rel="stylesheet">

    <link href="<?= base_url(); ?>admin_assets/jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
    <link href="<?= base_url(); ?>admin_assets/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
    <script src="<?= base_url(); ?>admin_assets/js/jquery-2.1.1.js"></script>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <h1 style="text-align: center;font-weight: bold;color: #fff;"> <?= $settings->title; ?></h1>
                                <!--<img alt="image" class="img-responsive" src="<?= base_url($settings->logo); ?>"/>-->
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear text-center">
                                    <span class="block m-t-xs">
                                        <strong class="font-bold">
                                            <?= $this->session->userdata('username') ?>
                                            <b class="caret">
                                            </b>
                                        </strong>
                                    </span>
                                </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    <a href="<?= base_url(); ?>admin/profile_settings">Profile Settings
                                    </a>
                                </li>
                                <?php if ($this->session->userdata('user_type') == 'admin') { ?>
                                    <li>
                                        <a href="<?= base_url(); ?>admin/Db_backup">DB Backup
                                        </a>
                                    </li>
                                <?php } ?>
                                <li class="divider">
                                </li>
                                <li>
                                    <a class="logout" href="javascript:void(0)">Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <img alt="image" class="img-circle img-md img-responsive" src="<?= base_url() . $settings->favicon; ?>" />
                        </div>
                    </li>

                    <?php
                    foreach ($menu as $row) {
                        if ($row->is_sub_menu == 'no' && $row->url != '') {
                    ?>
                            <li class="<?php
                                        if ($unique_name == $row->unique_name) {
                                            echo 'active';
                                        }
                                        ?>">
                                <a href="<?= base_url('admin/' . $row->url); ?>">
                                    <i class="<?= $row->icon; ?>">
                                    </i>
                                    <span class="nav-label">
                                        <?= $row->title; ?>
                                    </span>
                                </a>
                            </li>
                        <?php } else if ($row->sub_menu) { ?>
                            <li class="<?php
                                        if ($unique_name == $row->unique_name) {
                                            echo 'active';
                                        }
                                        ?>">
                                <a href="#">
                                    <i class="<?= $row->icon; ?>">
                                    </i>
                                    <span class="nav-label">
                                        <?= $row->title; ?>
                                    </span>
                                    <span class="fa arrow">
                                    </span>
                                </a>
                                <ul class="nav nav-second-level collapse <?php
                                                                            if ($unique_name == $row->unique_name) {
                                                                                echo 'in';
                                                                            }
                                                                            ?>">
                                    <?php foreach ($row->sub_menu as $item) { ?>
                                        <li class="<?php
                                                    if ($sub_unique_name == $item->unique_name) {
                                                        echo 'active';
                                                    }
                                                    ?>">
                                            <a href="<?= base_url('admin/' . $item->url); ?>">
                                                <?= $item->title; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
                            <i class="fa fa-bars">
                            </i>
                        </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <!--                            <li>
                                                            <b><?= strtoupper($this->session->userdata('user_type')); ?></b>
                                                            <span class="m-r-lg text-muted welcome-message">Welcome to Twinlity Panel.</span>
                                                        </li>-->
                        <li>
                            <a href="javascript:void(0)" style="padding-bottom: 0px;padding-top: 0px">
                                <img src="<?= base_url() . $this->session->userdata('image') ?>" style="height: 40px; width: 40px;" class="img-thumbnail" />
                                <?= $this->session->userdata('user_name'); ?></a>
                        </li>
                        <li>
                            <a class="logout" href="javascript:void(0)" title="Log out" style="">
                                <i class="fa fa-sign-out">
                                </i>Logout
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>