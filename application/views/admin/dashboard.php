<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-3">
            <a href="<?= base_url('admin/services'); ?>">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success">Services</span>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $services; ?></h1>
                        <small>Total Services</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/blog'); ?>">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-info">Blogs</span>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $blogs; ?></h1>
                        <small>Total Blogs</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/careers'); ?>">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-primary">Careers</span>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $careers; ?></h1>
                        <small>Total Careers</small>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/contact_us'); ?>">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-danger">Contact Us</span>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $contact_us; ?></h1>
                        <small>Total Members Contacted Us</small>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/why_shivsoft'); ?>" class="">
                <div class="ibox float-e-margins ">
                    <div class="ibox-title ">
                        <p class="btn btn-success btn-block">Why Shivsoft</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/our_process'); ?>" class="">
                <div class="ibox float-e-margins ">
                    <div class="ibox-title ">
                        <p class="btn btn-info btn-block">Our Process</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/about_us'); ?>" class="">
                <div class="ibox float-e-margins ">
                    <div class="ibox-title ">
                        <p class="btn btn-primary btn-block">About Us</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/staff_augmentation'); ?>" class="">
                <div class="ibox float-e-margins ">
                    <div class="ibox-title ">
                        <p class="btn btn-danger btn-block">Staff Augmentation</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/payroll'); ?>" class="">
                <div class="ibox float-e-margins ">
                    <div class="ibox-title ">
                        <p class="btn btn-success btn-block">Payroll</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3">
            <a href="<?= base_url('admin/common/applications'); ?>" class="">
                <div class="ibox float-e-margins ">
                    <div class="ibox-title ">
                        <p class="btn btn-info btn-block">Received Career Applications</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/includes/footer');
?>