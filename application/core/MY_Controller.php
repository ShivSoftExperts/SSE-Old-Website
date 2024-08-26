<?php

header("access-control-allow-origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper("file");
        define('FILE_PATH', base_url());
        define('DEFAULT_IMAGE', base_url() . "/uploads/default_image.png");
    }

    function get_designation_id()
    {
        return $this->session->userdata('designation_id');
    }

    function get_user_menu()
    {
        $designation_id = $this->get_designation_id();
        if ($designation_id == 1) {
            return $this->common_model->get_admin_menu();
        } else {
        }
    }

    function admin_view($view_file)
    {
        $this->data['admin_details'] = $this->common_model->admin_details();
        $this->data['menu'] = $this->get_user_menu();
        $this->data['settings'] = $this->common_model->get_single_data('settings', 1);
        $this->load->view('admin/includes/header', $this->data);
        $this->load->view('admin/' . $view_file, $this->data);
    }

    function website_view($view_file)
    {
        $this->data['settings'] = $this->common_model->get_single_data('settings', 1);
        $this->data['website_data'] = $this->common_model->get_single_data('website_data', 1);
        $this->data['meta_data1'] = $this->data['website_data']->home_meta_data;
        $this->data['branches'] = $this->common_model->get_multi_active_data('address', '', 'branch_name,address');
        $this->data['services'] = $this->common_model->get_multi_active_data('services', '', 'id,title,icon,description,code');
        $this->load->view('frontend/includes/header', $this->data);
        $this->load->view('frontend/' . $view_file, $this->data);
        $this->load->view('frontend/includes/footer');
    }

    public function login_required()
    {
        if (!$this->session->userdata('validated')) {
            redirect(base_url('admin'), 'refresh');
        } else {
            return true;
        }
    }


    public function file_upload($file, $folder_name = '')
    {
        // print_r($file);
        // die;
        $_FILES['file']['name'] = $file['name'];
        $_FILES['file']['type'] = $file['type'];
        $_FILES['file']['tmp_name'] = $file['tmp_name'];
        $_FILES['file']['size'] = $file['size'];
        $_FILES['file']['error'] = $file['error'];
        if (!empty($folder_name)) {
            $path = 'assets/images/' . trim($folder_name) . '/';
        } else {
            $path = 'assets/images/';
        }
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        $config['upload_path'] = $path;
        if ($file['type'] == 'image/webp') {
            $config['allowed_types'] = '*';
        } else {
            $config['allowed_types'] = 'jpg|png|pdf|svg|jpeg|webp';
        }
        $config['max_size'] = 10200;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['encrypt_name'] = TRUE;
        $config['file_ext_tolower'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $err = $this->upload->display_errors();
            unset($this->upload);
            $this->session->set_flashdata('error_message', '"' . $err . '","Failed!"');
            echo '<script>window.history.go(-1)</script>';
            exit;
        } else {
            $file_name = $path . $this->upload->data('file_name');
            unset($this->upload);
            return $file_name;
        }
    }

    public function send_mail($subject, $message, $to_email = 'Contact@shivsoftexperts.com')
    {
        $to_email = 'b.rajaramesh123@gmail.com';
        $this->load->library('email');
        $config = array();
        $config['useragent'] = "CodeIgniter";
        $config['protocol'] = "smtp";
        $config['smtp_host'] = "smtp.gmail.com";
        $config['smtp_user'] = "shivakumarreddy.s@gmail.com";
        $config['smtp_pass'] = "1FA8E1A0F4C790378453025B4EB05AC74003";
        $config['smtp_port'] = "587";
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['wordwrap'] = true;
        $this->email->initialize($config);

        $system_name = 'Mail from website';
        $from = 'shivakumarreddy.s@gmail.com';
        $this->email->from($from, $system_name);

        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        $send = $this->email->send();
        // echo $this->email->print_debugger();
        // die();
        return TRUE;
    }

    function common_pagination($url, $total_count, $per_page)
    {
        $config['base_url'] = $url;
        $config['total_rows'] = $total_count;
        $config['per_page'] = $per_page;
        $config['page_query_string'] = true;
        $config['num_links'] = 10;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';


        $config['prev_link'] = '<span aria-hidden="true">&laquo;</span>';
        $config['prev_tag_open'] = '<li class="button grey">';
        $config['prev_tag_close'] = '</li>';


        $config['next_link'] = '<span aria-hidden="true">&raquo;</span>';
        $config['next_tag_open'] = '<li class="button grey">';
        $config['next_tag_close'] = '</li>';

        //        $start = ($this->input->get_post('per_page')) ? $this->input->get_post('per_page') : 0;
        $this->pagination->initialize($config);
        $this->data['pagination'] = $this->pagination->create_links();
    }
}
