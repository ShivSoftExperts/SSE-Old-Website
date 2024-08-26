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
        </div>
        <div class="ibox-content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Company Name</th>
                            <th>Applied Job</th>
                            <th>Applied Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Description</th>
                            <th>Resume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $s = 0;
                        foreach ($list as $row) { ?>
                            <tr>
                                <td><?= ++$s; ?></td>
                                <td><?= $row->company_name; ?></td>
                                <td><?= $row->job_type; ?></td>
                                <td><?= date('d M, Y', strtotime($row->created_at)); ?></td>
                                <td><?= $row->name; ?></td>
                                <td><?= $row->email; ?></td>
                                <td><?= $row->phone_number; ?></td>
                                <td><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?= $row->id ?>"><i class="fa fa-eye"></i> View</button></td>
                                <td><a href="<?= base_url($row->resume); ?>" target="_blank"><i class="fa fa-file-pdf-o" style="font-size: 25px;"></i></a></td>
                            </tr>
                            <div class="modal inmodal" id="myModal<?= $row->id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content animated bounceInRight">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><?= $row->description; ?></p>
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