<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profile_settings extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->login_required();
    }

    public function index()
    {
        $this->data['unique_name'] = 'masters';
        $this->data['sub_unique_name'] = 'profile_settings';
        $this->data['page_title'] = 'Profile Settings';
        $this->admin_view('profile_settings');
    }

    public function update_settings()
    {
        $old_image = $this->input->get_post('image1');
        if ($_FILES['image']['name'] != '') {
            $image = $this->file_upload($_FILES['image'], 'image');
        } else {
            $image = $old_image;
        }
        $data = array(
            'username' => trim($this->input->get_post('username')),
            'display_name' => trim($this->input->get_post('display_name')),
            'mobile_number' => trim($this->input->get_post('mobile_number')),
            'email' => trim($this->input->get_post('email')),
            'image' => $image,
            'updated_date' => date('Y-m-d H:i:s')
        );
        $updated_id = $this->session->userdata('user_id');

        $res = $this->common_model->update('admin', $data, $updated_id);
        if ($res) {
            $this->session->set_userdata('user_name', $this->input->get_post('display_name'));
            $this->session->set_userdata('image', $image);
            $this->session->set_flashdata('success_message', '"Profile settings updated Successfully","Success"');
            redirect(base_url() . 'admin/profile_settings');
        } else {
            $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
            redirect(base_url() . 'admin/profile_settings');
        }
    }

    function change_password()
    {
        $admin_details = $this->common_model->admin_details();
        if ($admin_details->password != md5($this->input->get_post('old_password') . $admin_details->salt)) {
            $this->session->set_flashdata('error_message', '"Old password not matched","Failed!"');
            redirect(base_url() . 'admin/profile_settings');
        } else if ($this->input->get_post('new_password') != $this->input->get_post('confirm_password')) {
            $this->session->set_flashdata('error_message', '"New password and confirm password not matched","Failed!"');
            redirect(base_url() . 'admin/profile_settings');
        } else {
            $rand = rand(10000, 99999);
            $updated_id = $this->session->userdata('user_id');
            $data = array(
                'salt' => $rand,
                'password' => md5($this->input->get_post('confirm_password') . $rand),
                'updated_date' => date('Y-m-d H:i:s')
            );
            $res = $this->common_model->update('admin', $data, $updated_id);
            if ($res) {
                $this->session->set_flashdata('success_message', '"Password updated Successfully","Success"');
                redirect(base_url() . 'admin/profile_settings');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/profile_settings');
            }
        }
    }

    public function update_staff_settings()
    {
        $config = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'callback_email',
            ),
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'phone_number',
                'label' => 'Phone Number',
                'rules' => 'callback_phone_number'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $this->data['page'] = 'profile_settings';
            $this->data['page_title'] = 'Profile_Settings';
            $this->data['page_unique_name'] = 'profile_settings';
            $this->admin_view('profile_settings');
        } else {
            $old_image = $this->input->get_post('image1');
            if ($_FILES['image']['name'] != '') {
                $image = $this->file_upload('image');
            } else {
                $image = $old_image;
            }
            $data = array(
                'name' => trim($this->input->get_post('name')),
                'email' => trim($this->input->get_post('email')),
                'phone_number' => trim($this->input->get_post('phone_number')),
                'image' => $image,
                'updated_date' => date('Y-m-d H:i:s')
            );
            $updated_id = $this->session->userdata('user_id');

            $res = $this->common_model->update('staff', $data, $updated_id);
            if ($res) {
                $this->session->set_userdata('user_name', $this->input->get_post('name'));
                $this->session->set_userdata('image', $image);
                $this->session->set_flashdata('success_message', '"Profile settings updated Successfully","Success"');
                redirect(base_url() . 'admin/settings');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/settings');
            }
        }
    }

    public function phone_number($str)
    {
        $details = $this->common_model->get_single_data('staff', $this->session->userdata('user_id'));
        if ($details->phone_number == $str) {
            return TRUE;
        } else {
            $sql = "SELECT COUNT(id) as no_of_rows FROM staff WHERE phone_number = '" . trim($this->input->post('phone_number')) . "'";
            $count = $this->db->query($sql)->row()->no_of_rows;
            if ($count > 0) {
                $this->form_validation->set_message('phone_number', 'Phone Number must be unique');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    public function email($str)
    {
        $details = $this->common_model->get_single_data('staff', $this->session->userdata('user_id'));
        if ($details->email == $str) {
            return TRUE;
        } else {
            $sql = "SELECT COUNT(id) as no_of_rows FROM staff WHERE email = '" . trim($this->input->post('email')) . "'";
            $count = $this->db->query($sql)->row()->no_of_rows;
            if ($count > 0) {
                $this->form_validation->set_message('email', 'Email must be unique');
                return FALSE;
            } else {
                return TRUE;
            }
        }
    }

    function staff_change_password()
    {
        $staff_details = $this->common_model->staff_details();
        if ($staff_details->password != md5($this->input->get_post('old_password') . $staff_details->salt)) {
            $this->session->set_flashdata('error_message', '"Old password not matched","Failed!"');
            redirect(base_url() . 'admin/settings');
        } else if ($this->input->get_post('new_password') != $this->input->get_post('confirm_password')) {
            $this->session->set_flashdata('error_message', '"New password and confirm password not matched","Failed!"');
            redirect(base_url() . 'admin/settings');
        } else {
            $rand = rand(10000, 99999);
            $updated_id = $this->session->userdata('user_id');
            $data = array(
                'salt' => $rand,
                'password' => md5($this->input->get_post('confirm_password') . $rand),
                'updated_date' => date('Y-m-d H:i:s')
            );
            $res = $this->common_model->update('staff', $data, $updated_id);
            if ($res) {
                $this->session->set_flashdata('success_message', '"Password updated Successfully","Success"');
                redirect(base_url() . 'admin/settings');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/settings');
            }
        }
    }
}
