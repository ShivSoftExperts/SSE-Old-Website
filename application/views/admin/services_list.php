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
<div class="">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5><?= $page_title; ?></h5>
            <?php if (!isset($data)) { ?>
                <a class="btn btn-primary btn-sm open pull-right" href="<?= base_url(); ?>admin/services/add_service" type="button" style="margin-top: -5px;"><i class="fa fa-plus"></i> Add</a>
            <?php } ?>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Display Order</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0;
                        foreach ($list as $row) { ?>
                            <tr>
                                <td><?= ++$s; ?></td>
                                <td><img class="img-md img-rounded" src="<?= base_url() . $row->icon; ?>" /></td>
                                <td><?= $row->title; ?></td>
                                <td><?= $row->display_order; ?></td>
                                <td><?php if ($row->status == 'active') { ?>
                                        <button value="<?= $row->id ?>" class="btn btn-xs btn-primary change_status">Active</button>
                                    <?php } else { ?>
                                        <button value="<?= $row->id ?>" class="btn btn-xs btn-danger change_status">Inactive</button>
                                    <?php } ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?= $row->id ?>">
                                        <i class="fa fa-eye"></i> View
                                    </button>
                                    <a href="<?= base_url(); ?>admin/services/update/<?= $row->id ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a>

                                    <!-- <button type="button" class="btn btn-xs btn-danger delete_item" value="<?= $row->id ?>"><i class="fa fa-trash"></i> Delete</button> -->
                                </td>
                            </tr>

                            <div class="modal inmodal" id="myModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <img class="img-md" src="<?= base_url() . $row->icon; ?>" />
                                            <h4 class="modal-title"><?= $row->title; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><?= $row->description; ?></p>
                                            <div class="">
                                                <strong>Offered Services</strong>
                                                <ul>
                                                    <?php $list = $this->common_model->get_multi_data_with_cond('services_offered', 'service_id = ' . $row->id . ' and status = "active"');
                                                    foreach ($list as $item) { ?>
                                                        <li><?= $item->offered_service; ?></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <strong class="col-lg-12">Technologies We Use</strong>

                                                <?php $list = $this->common_model->get_multi_data_with_cond('service_technologies', 'service_id = ' . $row->id . " and status = 'active'");
                                                foreach ($list as $item) { ?>
                                                    <div class="col-lg-2"><img class="img-md" src="<?= base_url() . $item->image_path; ?>" /></div>
                                                <?php } ?>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/includes/footer');
?>
<script>
    $(document).on("click", '.change_status', function() {
        var id = $(this).val();
        swal({
                title: "Are you sure?",
                text: "You want to Change the Status!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, change it!",
                closeOnConfirm: false
            },
            function() {
                $('.spiner-example').slideToggle(0);
                window.location = "<?= base_url() ?>admin/common/deactive/" + id + "/services";
            });
    });

    // $(document).on("click", '.delete_item', function() {
    //     var del_id = $(this).val();
    //     swal({
    //             title: "Are you sure?",
    //             text: "You want to Delete entire data related to this!",
    //             type: "warning",
    //             showCancelButton: true,
    //             confirmButtonColor: "#DD6B55",
    //             confirmButtonText: "Yes, delete it!",
    //             closeOnConfirm: false
    //         },
    //         function() {
    //             $('.spiner-example').slideToggle(0);
    //             window.location = "<?= base_url() ?>admin/common/delete_data/" + del_id + "/services";
    //         });
    // });
</script>