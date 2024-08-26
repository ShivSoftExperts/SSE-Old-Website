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
                    <h5><?php if (!isset($service)) {
                            echo 'Add';
                        } else {
                            echo 'Update';
                        } ?> <?= $page_title; ?></h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="<?= base_url(); ?>admin/common/<?= (!isset($service)) ? 'save_blog' : 'update_blog'; ?>" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 ">Meta Title:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="meta_title" class="form-control" required="" value="<?php if (isset($service)) echo $service->meta_title ?>" placeholder="Meta Title">
                                    <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="meta_data" rows="3" placeholder="Meta Description"><?php if (isset($service)) echo $service->meta_data ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="<?php if (isset($service)) {
                                        echo 'col-sm-5';
                                    } else {
                                        echo 'col-sm-6';
                                    } ?>">
                            <div class="form-group">
                                <label class="col-sm-12">Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="banner1" class="form-control" <?= (!isset($service->banner1)) ? 'required' : '' ?>>
                                    <?php echo form_error('banner1', '<div class="error">', '</div>'); ?>
                                </div>

                            </div>
                        </div>
                        <?php if (isset($service)) { ?>
                            <div class="col-sm-1">
                                <img src="<?= base_url(); ?><?= $service->banner1; ?>" class="img-responsive">
                                <input type="hidden" name="banner1_old" value="<?= $service->banner1; ?>">
                            </div>
                        <?php } ?>
                        <div class="<?php if (isset($service)) {
                                        echo 'col-sm-5';
                                    } else {
                                        echo 'col-sm-6';
                                    } ?>">
                            <div class="form-group">
                                <label class="col-sm-12">Small Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="banner2" class="form-control" <?= (!isset($service->banner2)) ? 'required' : '' ?>>
                                    <?php echo form_error('banner2', '<div class="error">', '</div>'); ?>
                                </div>

                            </div>
                        </div>
                        <?php if (isset($service)) { ?>
                            <div class="col-sm-1">
                                <img src="<?= base_url(); ?><?= $service->banner2; ?>" class="img-responsive">
                                <input type="hidden" name="banner2_old" value="<?= $service->banner2; ?>">
                            </div>
                        <?php } ?>
                        <div class="<?php if (isset($service)) {
                                        echo 'col-sm-5';
                                    } else {
                                        echo 'col-sm-6';
                                    } ?>">
                            <div class="form-group">
                                <label class="col-sm-12">Blog Image:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="icon" class="form-control" <?= (!isset($service->image_path)) ? 'required' : '' ?>>
                                    <?php echo form_error('icon', '<div class="error">', '</div>'); ?>
                                </div>

                            </div>
                        </div>
                        <?php if (isset($service)) { ?>
                            <input type="hidden" name="id" value="<?= $service->id; ?>">
                            <div class="col-sm-1">
                                <img src="<?= base_url(); ?><?= $service->image_path; ?>" class="img-responsive">
                                <input type="hidden" name="icon1" value="<?= $service->image_path; ?>">
                            </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Title:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="title" class="form-control" required="" value="<?php if (isset($service)) echo $service->title ?>" placeholder="Title">
                                    <?php echo form_error('title', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 ">Question:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="question" class="form-control" required="" value="<?php if (isset($service)) echo $service->question ?>" placeholder="Blog Question">
                                    <?php echo form_error('question', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="description" required="" rows="5" placeholder="Service Description"><?php if (isset($service)) echo $service->description ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12">Status:</label>
                                <div class="col-sm-12">
                                    <select class="form-control" required="" name="status">
                                        <option value="">Select Status</option>
                                        <option value="active" <?php if (isset($service) && $service->status == 'active') echo 'selected'; ?>>Active</option>
                                        <option value="inactive" <?php if (isset($service) && $service->status == 'inactive') echo 'selected'; ?>>Inactive</option>
                                    </select>
                                    <?php echo form_error('status', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div id="add_more_services">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-12 ">Tags: <b class="label label-success" onclick="add_more_services_offered()"><i class="fa fa-plus"></i> Add More</b></label>
                                </div>
                            </div>

                            <?php if (isset($services_offered) && count($services_offered) > 0) {
                                $i = 0;
                                foreach ($services_offered as $service_offered) {
                            ?>
                                    <div id="remove_0<?= $i; ?>">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" readonly value="<?= $service_offered->tag; ?>" name="tag_old[]" class="form-control" required placeholder="Tag">
                                                    <input type="hidden" readonly value="<?= $service_offered->id; ?>" name="tag_old_id[]" class="form-control" required placeholder="Tag">
                                                    <?php echo form_error('tag', '<div class="error">', '</div>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <div class="col-sm-12"><button class="btn btn-danger" type="button" onclick="remove_more_services_offered('remove_0<?= $i; ?>')"><i class="fa fa-minus"></i></button></div>
                                            </div>
                                        </div>
                                    </div>
                            <?php $i++;
                                }
                            } ?>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" value="" name="tag[]" class="form-control" <?= (!isset($services_offered)) ? 'required' : '' ?> placeholder="Tag">
                                        <?php echo form_error('tag', '<div class="error">', '</div>'); ?>
                                    </div>
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

                            <a href="<?= base_url(); ?>admin/common/blog" class="btn btn-danger">Cancel</a>
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
<script type="text/javascript">
    CKEDITOR.replace("description");
    k = 1;

    function add_more_services_offered() {
        $('#add_more_services').append('<div id="remove_' + k + '"><div class="col-md-5"><div class="form-group"><div class="col-sm-12"><input type="text" value="" name="tag[]" class="form-control" required placeholder="Tag"></div></div></div><div class="col-md-1"><div class="form-group"><div class="col-sm-12"><button class="btn btn-danger" type="button" onclick=remove_more_services_offered("remove_' + k + '")><i class="fa fa-minus"></i></button></div></div></div></div>');
        k++;
    }

    function remove_more_services_offered(id) {
        $('#' + id).remove();
    }
</script>