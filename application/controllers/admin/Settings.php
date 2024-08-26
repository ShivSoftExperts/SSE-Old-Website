<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Settings extends MY_Controller
{

    private $model = 'Settings_model';

    public function __construct()
    {
        parent::__construct();
        $this->login_required();
        $this->load->model('admin/' . $this->model);
    }

    public function index()
    {
        if ($this->input->post('submit')) {
            $data = array(
                'title' => $this->input->post('title'),
                'facebook' => $this->input->post('facebook'),
                'youtube' => $this->input->post('youtube'),
                'twitter' => $this->input->post('twitter'),
                'linked_in' => $this->input->post('linked_in'),
                'support_mail' => $this->input->post('support_mail'),
                'full_title' => $this->input->post('full_title'),
                // 'support_number' => $this->input->post('support_number'),
                // 'terms' => $this->input->post('terms'),
                // 'about_us' => $this->input->post('about_us'),
                // 'privacy_policy' => $this->input->post('privacy_policy'),
                // 'sms_sender_id' => $this->input->post('sms_sender_id'),
                // 'sms_username' => $this->input->post('sms_username'),
                // 'sms_password' => $this->input->post('sms_password'),
                'updated_at' => time(),
            );
            if ($_FILES["logo"]["name"]) {
                $data['logo'] = $this->file_upload($_FILES['logo'], 'logo');
            }
            if ($_FILES["favicon"]["name"]) {
                $data['favicon'] = $this->file_upload($_FILES['favicon'], 'logo');
            }
            $id = $this->input->post('id');
            $res = $this->{$this->model}->update($data, $id);
            if ($res) {
                $this->session->set_flashdata('success_message', '"Settings updated successfully","Success"');
                redirect(base_url('admin/settings'));
            } else {
                $this->session->set_flashdata('error_message', '"Please try again","Failed!"');
                redirect(base_url('admin/settings'));
            }
        }
        $this->data['unique_name'] = 'masters';
        $this->data['sub_unique_name'] = 'settings';
        $this->data['page_title'] = 'Settings';
        $this->data['details'] = $this->{$this->model}->get();
        $this->admin_view('settings');
    }
}
