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
                    <h5><?php if (!isset($details)) {
                            echo 'Add';
                        } else {
                            echo 'Update';
                        } ?> <?= $page_title; ?></h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="<?= base_url(); ?>admin/common/<?= (!isset($details)) ? 'add_careers' : 'edit_career/' . $details->id; ?>" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                        <div class="<?php if (isset($details)) {
                                        echo 'col-sm-5';
                                    } else {
                                        echo 'col-sm-6';
                                    } ?>">
                            <div class="form-group">
                                <label class="col-sm-12">Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="banner" class="form-control" <?= (!isset($details->banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('banner', '<div class="error">', '</div>'); ?>
                                </div>

                            </div>
                        </div>
                        <?php if (isset($details)) { ?>
                            <div class="col-sm-1">
                                <img src="<?= base_url(); ?><?= $details->banner; ?>" class="img-responsive">
                                <input type="hidden" name="banner_old" value="<?= $details->banner; ?>">
                            </div>
                        <?php } ?>
                        <div class="<?php if (isset($details)) {
                                        echo 'col-sm-5';
                                    } else {
                                        echo 'col-sm-6';
                                    } ?>">
                            <div class="form-group">
                                <label class="col-sm-12">Small Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="small_banner" class="form-control" <?= (!isset($details->small_banner)) ? 'required' : '' ?>>
                                    <?php echo form_error('small_banner', '<div class="error">', '</div>'); ?>
                                </div>

                            </div>
                        </div>
                        <?php if (isset($details)) { ?>
                            <div class="col-sm-1">
                                <img src="<?= base_url(); ?><?= $details->small_banner; ?>" class="img-responsive">
                                <input type="hidden" name="small_banner_old" value="<?= $details->small_banner; ?>">
                            </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Company Name:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="company_name" class="form-control" required="" value="<?php if (isset($details)) echo $details->company_name ?>" placeholder="Company Name">
                                    <?php echo form_error('company_name', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="<?php if (isset($details)) {
                                        echo 'col-sm-5';
                                    } else {
                                        echo 'col-sm-6';
                                    } ?>">
                            <div class="form-group">
                                <label class="col-sm-12">Company Logo:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="company_logo" class="form-control" <?= (!isset($details->company_logo)) ? 'required' : '' ?>>
                                    <?php echo form_error('company_logo', '<div class="error">', '</div>'); ?>
                                </div>

                            </div>
                        </div>
                        <?php if (isset($details)) { ?>
                            <input type="hidden" name="id" value="<?= $details->id; ?>">
                            <div class="col-sm-1">
                                <img src="<?= base_url(); ?><?= $details->company_logo; ?>" class="img-responsive">
                                <input type="hidden" name="company_logo1" value="<?= $details->company_logo; ?>">
                            </div>
                        <?php } ?>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Employee Type:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="employ_type" class="form-control" required="" value="<?php if (isset($details)) echo $details->employ_type ?>" placeholder="Employee Type">
                                    <?php echo form_error('employ_type', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Location:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="location" class="form-control" required="" value="<?php if (isset($details)) echo $details->location ?>" placeholder="Location">
                                    <?php echo form_error('location', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Job Type:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="job_type" class="form-control" required="" value="<?php if (isset($details)) echo $details->job_type ?>" placeholder="Job Type">
                                    <?php echo form_error('job_type', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Experience:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="experience" class="form-control" required="" value="<?php if (isset($details)) echo $details->experience ?>" placeholder="Experience">
                                    <?php echo form_error('experience', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Qualifications:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="qualifications" class="form-control" required="" value="<?php if (isset($details)) echo $details->qualifications ?>" placeholder="Qualifications">
                                    <?php echo form_error('qualifications', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Salary:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="salary" class="form-control" required="" value="<?php if (isset($details)) echo $details->salary ?>" placeholder="Salary">
                                    <?php echo form_error('salary', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Total Vacancies:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="total_vacancies" class="form-control" required="" value="<?php if (isset($details)) echo $details->total_vacancies ?>" placeholder="Total Vacancies">
                                    <?php echo form_error('total_vacancies', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Status:</label>
                                <div class="col-sm-12">
                                    <select class="form-control" required="" name="status">
                                        <option value="">Select Status</option>
                                        <option value="active" <?php if (isset($details) && $details->status == 'active') echo 'selected'; ?>>Active</option>
                                        <option value="inactive" <?php if (isset($details) && $details->status == 'inactive') echo 'selected'; ?>>Inactive</option>
                                    </select>
                                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="description" required="" rows="5" placeholder="Description"><?php if (isset($details)) echo $details->description ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Responsibilities and Duties:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="responsibilities" required="" rows="5" placeholder="Responsibilities and Duties"><?php if (isset($details)) echo $details->skills_qualifications ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Required Experience, Skills and Qualifications:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="skills_qualifications" required="" rows="5" placeholder="Required Experience, Skills and Qualifications"><?php if (isset($details)) echo $details->skills_qualifications ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-2 col-md-offset-5">
                            <label class="col-sm-12"> &nbsp; </label>
                            <input type="submit" name="submit" class="btn btn-primary btn-block" value="<?php if (!isset($_GET['id'])) {
                                                                                                            echo 'Save';
                                                                                                        } else {
                                                                                                            echo 'Update';
                                                                                                        } ?>">

                        </div>
                        <div class="col-md-2">
                            <label class="col-sm-12"> &nbsp; </label>

                            <a href="<?= base_url(); ?>admin/common/careers" class="btn btn-danger">Cancel</a>
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
<script>
    CKEDITOR.replace("description");
    CKEDITOR.replace("skills_qualifications");
    CKEDITOR.replace("responsibilities");
</script>