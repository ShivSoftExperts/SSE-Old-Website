<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Profile Details</h5>
                </div>
                <div class="ibox-content">
                    <?php if ($this->session->userdata('user_type') == 'admin') { ?>
                        <form class="form-horizontal" autocomplete="off" id="commentForm" enctype="multipart/form-data" method="post" action="<?= base_url(); ?>admin/profile_settings/update_settings">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <div class="form-group"><label class="col-lg-2 control-label">Username</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="Username" class="form-control" name="username" value="<?= $admin_details->username; ?>">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Display Name</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="Display Name" class="form-control" name="display_name" value="<?= $admin_details->display_name; ?>">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Mobile Number</label>
                                <div class="col-lg-10"><input type="text" placeholder="Mobile Number" class="form-control number" name="mobile_number" value="<?= $admin_details->mobile_number; ?>">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control" name="email" value="<?= $admin_details->email; ?>">
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Profile Image</label>
                                <input type="hidden" name="image1" value="<?= $admin_details->image; ?>" />
                                <div class="col-lg-2"><img class="img-responsive" src="<?= base_url(); ?>/<?= $admin_details->image; ?>" /></div>
                                <div class="col-lg-8"><input type="file" placeholder="" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input type="submit" class="btn btn-md btn-primary" value="Update Profile Details" />
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <?php if ($this->session->userdata('user_type') == 'staff') { ?>
                        <form class="form-horizontal" autocomplete="off" id="commentForm" enctype="multipart/form-data" method="post" action="<?= base_url(); ?>admin/profile_settings/update_staff_settings">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <div class="form-group"><label class="col-lg-2 control-label">Name</label>
                                <div class="col-lg-10">
                                    <input type="text" placeholder="Name" class="form-control" name="name" value="<?= $staff_details->name; ?>">
                                    <?php echo form_error('name', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Mobile Number</label>
                                <div class="col-lg-10"><input type="text" placeholder="Mobile Number" class="form-control number" name="phone_number" value="<?= $staff_details->phone_number; ?>">
                                    <?php echo form_error('phone_number', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Email</label>
                                <div class="col-lg-10"><input type="email" placeholder="Email" class="form-control" name="email" value="<?= $staff_details->email; ?>">
                                    <?php echo form_error('email', '<div class="error">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Profile Image</label>
                                <input type="hidden" name="image1" value="<?= $staff_details->image; ?>" />
                                <div class="col-lg-2"><img class="img-responsive" src="<?= base_url(); ?>/<?= $staff_details->image; ?>" /></div>
                                <div class="col-lg-8"><input type="file" placeholder="" class="form-control" name="image">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input type="submit" class="btn btn-md btn-primary" value="Update Profile Details" />
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Password Settings</h5>
                </div>
                <div class="ibox-content">
                    <?php if ($this->session->userdata('user_type') == 'admin') { ?>
                        <form class="form-horizontal" id="passwordForm" method="post" action="<?= base_url(); ?>admin/profile_settings/change_password">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <div class="form-group"><label class="col-lg-2 control-label">Old Password</label>
                                <div class="col-lg-9" style="padding-right: 0;">
                                    <input type="password" id="old_password" name="old_password" placeholder="Old Password" class="form-control" style="border-top-right-radius: 0;border-bottom-right-radius: 0;border-right: 0;">
                                </div>
                                <div class="col-lg-1" style="padding-left: 0;">
                                    <button type="button" class="btn btn-md btn-white" onclick="show_password('old_password', 'password_btn')" style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-left: 0;"><i class="fa fa-eye" id="password_btn"></i></button>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">New Password</label>
                                <div class="col-lg-9" style="padding-right: 0;">
                                    <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control" style="border-top-right-radius: 0;border-bottom-right-radius: 0;border-right: 0;">
                                </div>
                                <div class="col-lg-1" style="padding-left: 0;">
                                    <button type="button" class="btn btn-md btn-white" onclick="show_password('new_password', 'new_password_btn')" style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-left: 0;"><i class="fa fa-eye" id="new_password_btn"></i></button>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Confirm Password</label>
                                <div class="col-lg-9" style="padding-right: 0;">
                                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control" style="border-top-right-radius: 0;border-bottom-right-radius: 0;border-right: 0;">
                                </div>
                                <div class="col-lg-1" style="padding-left: 0;">
                                    <button type="button" class="btn btn-md btn-white" onclick="show_password('confirm_password', 'confirm_password_btn')" style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-left: 0;"><i class="fa fa-eye" id="confirm_password_btn"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-md btn-primary" type="submit">Update Profile Password</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <?php if ($this->session->userdata('user_type') == 'staff') { ?>
                        <form class="form-horizontal" id="passwordForm" method="post" action="<?= base_url(); ?>admin/profile_settings/staff_change_password">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />
                            <div class="form-group"><label class="col-lg-2 control-label">Old Password</label>
                                <div class="col-lg-9" style="padding-right: 0;">
                                    <input type="password" id="old_password" name="old_password" placeholder="Old Password" class="form-control" style="border-top-right-radius: 0;border-bottom-right-radius: 0;border-right: 0;">
                                </div>
                                <div class="col-lg-1" style="padding-left: 0;">
                                    <button type="button" class="btn btn-md btn-white" onclick="show_password('old_password', 'password_btn')" style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-left: 0;"><i class="fa fa-eye" id="password_btn"></i></button>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">New Password</label>
                                <div class="col-lg-9" style="padding-right: 0;">
                                    <input type="password" id="new_password" name="new_password" placeholder="New Password" class="form-control" style="border-top-right-radius: 0;border-bottom-right-radius: 0;border-right: 0;">
                                </div>
                                <div class="col-lg-1" style="padding-left: 0;">
                                    <button type="button" class="btn btn-md btn-white" onclick="show_password('new_password', 'new_password_btn')" style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-left: 0;"><i class="fa fa-eye" id="new_password_btn"></i></button>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-lg-2 control-label">Confirm Password</label>
                                <div class="col-lg-9" style="padding-right: 0;">
                                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="form-control" style="border-top-right-radius: 0;border-bottom-right-radius: 0;border-right: 0;">
                                </div>
                                <div class="col-lg-1" style="padding-left: 0;">
                                    <button type="button" class="btn btn-md btn-white" onclick="show_password('confirm_password', 'confirm_password_btn')" style="border-top-left-radius: 0;border-bottom-left-radius: 0;border-left: 0;"><i class="fa fa-eye" id="confirm_password_btn"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-md btn-primary" type="submit">Update Profile Password</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('admin/includes/footer');
?>
<script>
    function show_password(filed_id, tag_id) {
        $('#' + tag_id).toggleClass("fa-eye fa-eye-slash");
        input = $('#' + filed_id);
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    }
</script>
<script>
    $().ready(function() {
        // validate signup form on keyup and submit
        $("#commentForm").validate({
            rules: {
                display_name: "required",
                username: {
                    required: true,
                    minlength: 4
                },
                mobile_number: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                display_name: "Please enter your display name",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 4 characters"
                },
                mobile_number: {
                    required: "Please enter your mobile number",
                    minlength: "Your mobile number must be at least 10 characters long",
                    maxlength: "Your mobile number must be 10 characters long"
                },
                email: "Please enter a valid email address",
            }
        });
    });

    $().ready(function() {
        // validate signup form on keyup and submit
        $("#passwordForm").validate({
            rules: {
                old_password: "required",
                new_password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    equalTo: "#new_password"
                }
            }
        });
    });
</script>