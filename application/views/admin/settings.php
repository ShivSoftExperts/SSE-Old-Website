<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $page_title; ?></h2>
        <ol class="breadcrumb">
            <li>
                <a href="<?= base_url(); ?>admin/dashboard">Dashboard</a>
            </li>
            <li class="active">
                <strong><?= $page_title; ?></strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Update <?= $page_title; ?></h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Logo</label>
                                <div class="col-sm-12">
                                    <input type="file" name="logo" class="form-control">
                                    <?php if (isset($details)) { ?>
                                        <span>Only Image formats are available <b><a target="_blank" href="<?= base_url('uploads/' . $details->logo); ?>">Previous Image</a></b></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Favicon</label>
                                <div class="col-sm-12">
                                    <input type="file" name="favicon" class="form-control">
                                    <?php if (isset($details)) { ?>
                                        <span>Only Image formats are available <b><a target="_blank" href="<?= base_url('uploads/' . $details->favicon); ?>">Previous Image</a></b></span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Site Title</label>
                                <div class="col-sm-12">
                                    <input type="text" name="title" class="form-control" required="" value="<?php if (isset($details)) echo $details->title ?>" placeholder="Site Title">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Site Full Title</label>
                                <div class="col-sm-12">
                                    <input type="text" name="full_title" class="form-control" required="" value="<?php if (isset($details)) echo $details->full_title ?>" placeholder="Site Full Title">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Facebook</label>
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Facebook Link" name="facebook" value="<?php if (isset($details)) echo $details->facebook ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Instagram</label>
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Youtube Link" name="youtube" value="<?php if (isset($details)) echo $details->youtube ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Twitter</label>
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Twitter Link" name="twitter" value="<?php if (isset($details)) echo $details->twitter ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Linked In</label>
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Linked In Link" name="linked_in" value="<?php if (isset($details)) echo $details->linked_in ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <?php /*<div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Support Number</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="10" placeholder="Support Number" name="support_number" value="<?php if (isset($details)) echo $details->support_number ?>" class="form-control number">
                                </div>
                            </div>
                        </div>*/ ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Support Mail</label>
                                <div class="col-sm-12">
                                    <input type="email" placeholder="Support Mail" name="support_mail" value="<?php if (isset($details)) echo $details->support_mail ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <?php /*<div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">SMS Sender ID</label>
                                <div class="col-sm-12">
                                    <input type="text" placeholder="SMS Sender ID" name="sms_sender_id" value="<?php if (isset($details)) echo $details->sms_sender_id ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">SMS Username</label>
                                <div class="col-sm-12">
                                    <input type="text" placeholder="Support Mail" name="sms_username" value="<?php if (isset($details)) echo $details->sms_username ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">SMS Password</label>
                                <div class="col-sm-12">
                                    <input type="text" placeholder="SMS Password" name="sms_password" value="<?php if (isset($details)) echo $details->sms_password ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 ">Terms and Conditions</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" placeholder="Terms and Conditions" id="terms" name="terms"><?php if (isset($details)) echo $details->terms ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 ">Privacy Policy</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" placeholder="Privacy Policy" id="privacy_policy" name="privacy_policy"><?php if (isset($details)) echo $details->privacy_policy ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 ">About Us</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" placeholder="About Us" id="about_us" name="about_us"><?php if (isset($details)) echo $details->about_us ?></textarea>
                                </div>
                            </div>
                        </div>*/ ?>
                        <input type="hidden" name="id" value="<?php if (isset($details)) echo $details->id ?>">
                        <div class="col-md-2 col-md-offset-5">
                            <label class="col-sm-12"> &nbsp; </label>
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Update">
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/includes/footer'); ?>
<script type="text/javascript">
    CKEDITOR.replace("about_us");
    CKEDITOR.replace("privacy_policy");
    CKEDITOR.replace("terms");
</script>