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
                <a class="btn btn-primary btn-sm open pull-right" href="<?= base_url(); ?>admin/common/add_careers" type="button" style="margin-top: -5px;"><i class="fa fa-plus"></i> Add</a>
            <?php } ?>
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Company Name</th>
                            <th>Employee Type</th>
                            <th>Job Type</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0;
                        foreach ($list as $row) { ?>
                            <tr>
                                <td><?= ++$s; ?></td>
                                <td><?= $row->company_name; ?></td>
                                <td><?= $row->employ_type; ?></td>
                                <td><?= $row->job_type; ?></td>
                                <td><?= $row->location; ?></td>
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
                                    <a href="<?= base_url(); ?>admin/common/edit_career/<?= $row->id ?>" class="btn btn-xs btn-success"><i class="fa fa-edit"></i> Edit</a>

                                    <!-- <button type="button" class="btn btn-xs btn-danger delete_item" value="<?= $row->id ?>"><i class="fa fa-trash"></i> Delete</button> -->
                                </td>
                            </tr>

                            <div class="modal inmodal" id="myModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <h4 class="modal-title"><img class="img-md" src="<?= base_url() . $row->company_logo; ?>" />
                                                <?= $row->job_type; ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="">
                                                <ul>
                                                    <li><b>Company Name:</b> <?= $row->company_name; ?></li>
                                                    <li><b>Employee Type:</b> <?= $row->employ_type; ?></li>
                                                    <li><b>Location:</b> <?= $row->location; ?></li>
                                                    <li><b>Job Type:</b> <?= $row->job_type; ?></li>
                                                    <li><b>Experience:</b> <?= $row->experience; ?></li>
                                                    <li><b>Qualifications:</b> <?= $row->qualifications; ?></li>
                                                    <li><b>Salary:</b> <?= $row->salary; ?></li>
                                                    <li><b>Total Vacancies:</b> <?= $row->total_vacancies; ?></li>
                                                    <li><b>Total Applications Received:</b> <?= $row->applied_count; ?></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h2>Description</h2>
                                                    <?= $row->description; ?>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h2>Responsibilities and Duties</h2>
                                                    <?= $row->responsibilities; ?>
                                                </div>
                                                <div class="col-sm-12">
                                                    <h2>Required Experience, Skills and Qualifications</h2>
                                                    <?= $row->skills_qualifications; ?>
                                                </div>
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
                window.location = "<?= base_url() ?>admin/common/deactive/" + id + "/careers";
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