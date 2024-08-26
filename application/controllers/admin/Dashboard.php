<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->login_required();
        $this->load->model('admin/Dashboard_model');
    }

    public function index()
    {
        $this->data['services'] = $this->db->select('id')->get('services')->num_rows();
        $this->data['blogs'] = $this->db->select('id')->get('blog')->num_rows();
        $this->data['careers'] = $this->db->select('id')->get('careers')->num_rows();
        $this->data['contact_us'] = $this->db->select('id')->get('contact_us')->num_rows();
        $this->data['unique_name'] = 'dashboard';
        $this->data['sub_unique_name'] = '';
        $this->data['page_title'] = 'Dashboard';
        $this->admin_view('dashboard');
    }
}
