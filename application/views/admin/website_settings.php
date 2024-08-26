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
                    <h5>Update Details </h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" name="id" value="<?= $details->id; ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Home Page Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="home_meta_data" rows="3" placeholder="Meta Description"><?php if (isset($details)) echo $details->home_meta_data ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-sm-12">Home Slider Video:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="banner_video_path" require class="form-control" value="<?= $details->banner_video_path; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Small Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="small_banner" class="form-control" <?= (empty($details->small_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('icon', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->small_banner; ?>"><img src="<?= base_url(); ?><?= $details->small_banner; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="small_banner_1" value="<?= $details->small_banner; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Slider Text 1:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="text1" class="form-control" required="" value="<?php if (isset($details)) echo $details->text1 ?>" placeholder="Slider Text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Slider Text 2:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="text2" class="form-control" required="" value="<?php if (isset($details)) echo $details->text2 ?>" placeholder="Slider Text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Slider Text 3:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="text3" class="form-control" required="" value="<?php if (isset($details)) echo $details->text3 ?>" placeholder="Slider Text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Slider Text:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="slider_text" class="form-control" required="" value="<?php if (isset($details)) echo $details->slider_text ?>" placeholder="Slider Text">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Staff Augmentation Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="staff_augmentation_meta_data" rows="3" placeholder="Meta Description"><?php if (isset($details)) echo $details->staff_augmentation_meta_data ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Why Choose Us Image:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="why_choose_us_image" class="form-control" <?= (empty($details->why_choose_us_image)) ? 'required' : '' ?>>
                                    <?php echo form_error('why_choose_us_image', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->why_choose_us_image; ?>"><img src="<?= base_url(); ?><?= $details->why_choose_us_image; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="why_choose_us_image_1" value="<?= $details->why_choose_us_image; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Staff Augmentation Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="staff_augmentation_banner" class="form-control" <?= (empty($details->staff_augmentation_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('icon', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->staff_augmentation_banner; ?>"><img src="<?= base_url(); ?><?= $details->staff_augmentation_banner; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="staff_augmentation_banner_1" value="<?= $details->staff_augmentation_banner; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Staff Augmentation Small Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="staff_augmentation_small_banner" class="form-control" <?= (empty($details->staff_augmentation_small_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('icon', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->staff_augmentation_small_banner; ?>"><img src="<?= base_url(); ?><?= $details->staff_augmentation_small_banner; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="staff_augmentation_small_banner_1" value="<?= $details->staff_augmentation_small_banner; ?>">
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Career Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="career_banner" class="form-control" <?= (empty($details->career_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('career_banner', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->career_banner; ?>"><img src="<?= base_url(); ?><?= $details->career_banner; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="career_banner_1" value="<?= $details->career_banner; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Career Small Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="career_small_banner" class="form-control" <?= (empty($details->career_small_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('career_small_banner', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->career_small_banner; ?>"><img src="<?= base_url(); ?><?= $details->career_small_banner; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="career_small_banner_1" value="<?= $details->career_small_banner; ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Blog List Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="blog_list_meta_data" rows="3" placeholder="Meta Description"><?php if (isset($details)) echo $details->blog_list_meta_data ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Blog List Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="blog_list_banner" class="form-control" <?= (empty($details->blog_list_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('icon', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->blog_list_banner; ?>"><img src="<?= base_url(); ?><?= $details->blog_list_banner; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="blog_list_banner_1" value="<?= $details->blog_list_banner; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Blog List Small Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="blog_list_small_banner" class="form-control" <?= (empty($details->blog_list_small_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('icon', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->blog_list_small_banner; ?>"><img src="<?= base_url(); ?><?= $details->blog_list_small_banner; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="blog_list_small_banner_1" value="<?= $details->blog_list_small_banner; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 ">Contact Us Heading:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="contact_us_heading" class="form-control" required="" value="<?php if (isset($details)) echo $details->contact_us_heading ?>" placeholder="Contact Us Heading">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Contact Us Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="contact_us_description" rows="3" placeholder="Description"><?php if (isset($details)) echo $details->contact_us_description ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Footer About Us:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="footer_about_us" rows="3" placeholder="Footer About Us"><?php if (isset($details)) echo $details->footer_about_us ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
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
<?php
$this->load->view('admin/includes/footer');
?>