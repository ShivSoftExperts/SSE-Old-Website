<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2><?= $page_title; ?></h2>
        <ol class="breadcrumb">

            <li>
                <a href="<?= base_url(); ?>/admin/dashboard">Dashboard</a>
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
        <div class="col-lg-8">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Branch Name</th>
                                    <th>Branch Address</th>
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
                                        <td>
                                            <?= $row->branch_name; ?>
                                        </td>
                                        <td>
                                            <?= $row->address; ?>
                                        </td>
                                        <td>
                                            <?= $row->display_order; ?>
                                        </td>
                                        <td><?php if ($row->status == 'active') { ?>
                                                <button value="<?= $row->id ?>" class="btn btn-xs btn-primary change_status">Active</button>
                                            <?php } else { ?>
                                                <button value="<?= $row->id ?>" class="btn btn-xs btn-danger change_status">Inactive</button>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-danger delete_item" value="<?= $row->id ?>"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="" id="open">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add <?= $page_title; ?></h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="" enctype="multipart/form-data" autocomplete="off">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <div class="col-md-12">
                                <div class="form-group"><label class="col-sm-12 text-left">Branch Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="branch_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-sm-12 text-left">Branch Address:</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" name="address" rows="3" placeholder="Branch Address"><?php if (isset($details)) echo $details->address ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><label class="col-sm-12">Display Order</label>
                                    <div class="col-sm-12">
                                        <input type="number" min="0" class="form-control" placeholder="Display Order" name="display_order" required value="<?php if (isset($details)) echo $details->display_order; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group"><label class="col-sm-12 text-left">Status</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" required="" name="status">
                                            <option value="">Select Status</option>
                                            <option value="active" selected <?php if (isset($data) && $data->status == 'active') echo 'selected'; ?>>Active</option>
                                            <option value="inactive" <?php if (isset($data) && $data->status == 'inactive') echo 'selected'; ?>>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save">
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<?php
$this->load->view('admin/includes/footer');
?>
<script type="text/javascript">
    $(document).on("click", '.delete_item', function() {
        var del_id = $(this).val();
        swal({
                title: "Are you sure?",
                text: "You want to Delete entire data related to this!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            },
            function() {
                $('.spiner-example').slideToggle(0);
                window.location = "<?= base_url() ?>admin/common/delete_data/" + del_id + "/address";
            });
    });
    $(document).on("click", '.change_status', function() {
        var sliders_deactive = $(this).val();
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
                window.location = "<?= base_url() ?>admin/common/deactive/" + sliders_deactive + "/address";
            });
    });
</script>