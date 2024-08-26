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
<style>
    .hr-line-dashed {
        margin: 0px 0px 10px 0;
        border-color: #000;
    }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Update Details </h5>
                    <!-- &nbsp;&nbsp;&nbsp;&nbsp; <small> For Break Use &lt;br /&gt;</small> -->
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                        <input type="hidden" name="id" value="<?= $details->id; ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Meta Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="meta_data" rows="3" placeholder="Meta Description"><?php if (isset($details)) echo $details->meta_data ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="banner" class="form-control" <?= (empty($details->banner)) ? 'required' : '' ?>>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->banner; ?>"><img src="<?= base_url(); ?><?= $details->banner; ?>" class="img-responsive"></a>
                                    <input type="hidden" name="banner1" value="<?= $details->banner; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-sm-12">Small Banner:</label>
                                <div class="col-sm-12">
                                    <input type="file" name="banner_2" class="form-control" <?= (empty($details->banner_2)) ? 'required' : '' ?>>
                                    <?php echo form_error('icon', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="col-sm-12">&nbsp;</label>
                                <div class="col-sm-12">
                                    <a target="_blank" href="<?= base_url(); ?><?= $details->banner_2; ?>"><img src="<?= base_url(); ?><?= $details->banner_2; ?>" class="img-responsive img-md"></a>
                                    <input type="hidden" name="banner_21" value="<?= $details->banner_2; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 ">Header Title:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="header_title" class="form-control" required="" value="<?php if (isset($details)) echo $details->header_title ?>" placeholder="Header Title">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Header Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="header_description" required="" rows="10" placeholder="Header Description"><?php if (isset($details)) echo $details->header_description ?></textarea>
                                </div>
                            </div>
                        </div>


                        <div id="add_more_services">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-12 ">Advantages: <b class="label label-success" onclick="add_more_services_offered()"><i class="fa fa-plus"></i> Add More</b></label>
                                </div>
                            </div>

                            <?php if (isset($list) && count($list) > 0) {
                                $i = 0;
                                foreach ($list as $row) {
                            ?>
                                    <div id="remove_0<?= $i; ?>">
                                        <div class="clearfix"></div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="col-sm-12">Icon</label>
                                                <div class="col-sm-12">
                                                    <a target="_blank" href="<?= base_url(); ?><?= $row->icon; ?>"><img src="<?= base_url(); ?><?= $row->icon; ?>" class="img-responsive img-md"></a>
                                                    <input type="hidden" name="our_process_old_id[]" value="<?= $row->id; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="col-sm-12">Title</label>
                                                <div class="col-sm-12">
                                                    <input type="text" readonly value="<?= $row->title; ?>" name="title_old[]" class="form-control" placeholder="Title">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label class="col-sm-12">Display Order</label>
                                                <div class="col-sm-12">
                                                    <input type="number" min="0" readonly value="<?= $row->display_order; ?>" name="display_order_old[]" class="form-control" placeholder="Display Order">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-11">
                                            <div class="form-group">
                                                <label class="col-sm-12">Description</label>
                                                <div class="col-sm-12">
                                                    <textarea name="desc_old[]" class="form-control" readonly placeholder="Description"><?= $row->small_description; ?></textarea>
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
                            <div class="hr-line-dashed"></div>
                            <div class="">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="file" name="icon[]" class="form-control" <?= (!isset($list)) ? 'required' : '' ?> placeholder="icon">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" value="" name="title[]" class="form-control" <?= (!isset($list)) ? 'required' : '' ?> placeholder="Title">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="number" min="0" value="" name="display_order[]" class="form-control" <?= (!isset($list)) ? 'required' : '' ?> placeholder="Display Order">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <textarea name="desc[]" class="form-control" <?= (!isset($list)) ? 'required' : '' ?> placeholder="Description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="hr-line-dashed"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 ">Foother Title:</label>
                                <div class="col-sm-12">
                                    <input type="text" name="footer_title" class="form-control" required="" value="<?php if (isset($details)) echo $details->footer_title ?>" placeholder="Foother Title">

                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 text-left">Foother Description:</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="footer_description" required="" rows="10" placeholder="Foother Description"><?php if (isset($details)) echo $details->footer_description ?></textarea>
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
<script type="text/javascript">
    CKEDITOR.replace("footer_description");
    CKEDITOR.replace("header_description");
    k = 1;

    function add_more_services_offered() {
        $('#add_more_services').append('<div id="remove_' + k + '"><div class="col-md-4"><div class="form-group"><div class="col-sm-12"><input type="file" name="icon[]" class="form-control" required placeholder="icon"></div></div></div><div class="col-md-6"><div class="form-group"><div class="col-sm-12"><input type="text" value="" name="title[]" class="form-control" required placeholder="Title"></div></div></div><div class="col-md-2"><div class="form-group"><div class="col-sm-12"><input type="number" min="0" value="" name="display_order[]" class="form-control" required placeholder="Display Order"></div></div></div><div class="col-md-11"><div class="form-group"><div class="col-sm-12"><textarea name="desc[]" class="form-control" required placeholder="Description"></textarea></div></div></div><div class="col-md-1"><div class="form-group"><div class="col-sm-12"><button class="btn btn-danger" type="button" onclick=remove_more_services_offered("remove_' + k + '")><i class="fa fa-minus"></i></button></div></div></div><div class="clearfix"></div><div class="hr-line-dashed"></div></div>');
        k++;
    }

    function remove_more_services_offered(id) {
        $('#' + id).remove();
    }
    x = 1;
</script>