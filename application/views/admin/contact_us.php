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
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $s = 0;
                                foreach ($list as $row) { ?>
                                    <tr>
                                        <td><?= ++$s; ?></td>
                                        <td>
                                            <?= $row->name; ?>
                                        </td>
                                        <td>
                                            <?= $row->email; ?>
                                        </td>
                                        <td>
                                            <?= $row->phone; ?>
                                        </td>
                                        <td>
                                            <?= $row->company; ?>
                                        </td>
                                        <td>
                                            <?= $row->message; ?>
                                        </td>
                                        <td>
                                            <?= $row->created_date; ?>
                                        </td>
                                    </tr>
                                <?php }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/includes/footer');
?>