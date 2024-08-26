<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Services extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->login_required();
        $this->load->model('admin/Dashboard_model');
    }

    public function index()
    {
        $this->data['list'] = $this->common_model->get_all_records('services');
        $this->data['unique_name'] = 'services';
        $this->data['sub_unique_name'] = '';
        $this->data['page_title'] = 'Services';
        $this->admin_view('services_list');
    }

    public function add()
    {
        $this->data['unique_name'] = 'services';
        $this->data['sub_unique_name'] = '';
        $this->data['page_title'] = 'Services';
        $this->admin_view('services');
    }

    public function update($id)
    {
        $this->data['service'] = $this->common_model->get_single_data('services', $id);
        $this->data['services_offered'] = $this->common_model->get_multi_data_with_cond('services_offered', 'service_id = ' . $id . ' and status = "active"');
        $this->data['service_technologies'] = $this->common_model->get_multi_data_with_cond('service_technologies', 'service_id = ' . $id . " and status = 'active'");
        $this->data['unique_name'] = 'services';
        $this->data['sub_unique_name'] = '';
        $this->data['page_title'] = 'Services';
        $this->admin_view('services');
    }


    function update_service()
    {
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ),
            array(
                'field' => 'display_order',
                'label' => 'Display Order',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        $id = $this->input->get_post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->data['service'] = $this->common_model->get_single_data('services', $id);
            $this->data['services_offered'] = $this->common_model->get_multi_data_with_cond('services_offered', 'service_id = ' . $id . ' and status = "active"');
            $this->data['service_technologies'] = $this->common_model->get_multi_data_with_cond('service_technologies', 'service_id = ' . $id . ' and status = "active"');
            $this->data['unique_name'] = 'services';
            $this->data['sub_unique_name'] = '';
            $this->data['page_title'] = 'Services';
            $this->admin_view('services');
        } else {
            $image_paths = [];
            if ($_FILES['icon']['name'] != '') {
                $icon = $this->file_upload($_FILES['icon'], 'service_icons');
            } else {
                $icon = $this->input->get_post('icon1');
            }
            if ($_FILES['banner1']['name'] != '') {
                $banner1 = $this->file_upload($_FILES['banner1'], 'banners');
            } else {
                $banner1 = $this->input->get_post('banner1_old');
            }
            if ($_FILES['banner2']['name'] != '') {
                $banner2 = $this->file_upload($_FILES['banner2'], 'banners');
            } else {
                $banner2 = $this->input->get_post('banner2_old');
            }
            $title = trim($this->input->get_post('title'));
            $code = strtolower(str_replace(' ', '-', $title));
            $code = preg_replace('/[^A-Za-z0-9_]/', '-', $code);
            $data = array(
                'title' => $title,
                'code' => $code,
                'icon' => $icon,
                'banner1' => $banner1,
                'banner2' => $banner2,
                'description' => trim($this->input->get_post('description')),
                'status' => trim($this->input->get_post('status')),
                'display_order' => trim($this->input->get_post('display_order')),
                'meta_data' => trim($this->input->get_post('meta_data')),
            );
            $res = $this->common_model->update_cond('services', $data, "id = $id");

            if ($res) {
                $service_technologies = array(
                    'status' => 'inactive'
                );
                $this->common_model->update_cond('service_technologies', $service_technologies, "service_id = $id");

                if (!empty($this->input->get_post('tech_old')) > 0) {
                    foreach ($this->input->get_post('tech_old') as $row) {
                        $service_technologies = array(
                            'status' => 'active'
                        );
                        $this->common_model->update_cond('service_technologies', $service_technologies, "id = $row");
                    }
                }

                $services_offered = array(
                    'status' => 'inactive'
                );
                $this->common_model->update_cond('services_offered', $services_offered, "service_id = $id");

                foreach ($this->input->get_post('services_old_id') as $row) {
                    $services_offered = array(
                        'status' => 'active'
                    );
                    $this->common_model->update_cond('services_offered', $services_offered, "id = $row");
                }
                if ($_FILES['tech']['name'][0] != '') {
                    for ($i = 0; $i < count($_FILES['tech']['name']); $i++) {
                        $image['name'] = $_FILES['tech']['name'][$i];
                        $image['type'] = $_FILES['tech']['type'][$i];
                        $image['tmp_name'] = $_FILES['tech']['tmp_name'][$i];
                        $image['size'] = $_FILES['tech']['size'][$i];
                        $image['error'] = $_FILES['tech']['error'][$i];

                        $image_paths[] = $this->file_upload($image, 'service_technologies');
                    }
                }

                foreach ($this->input->get_post('services') as $row) {
                    if (!empty($row)) {
                        $services_offered = array(
                            "service_id" => $id,
                            "offered_service" => $row,
                            'status' => 'active'
                        );
                        $this->common_model->add_data('services_offered', $services_offered);
                    }
                }
                foreach ($image_paths as $image) {
                    if (!empty($image)) {
                        $service_technologies = array(
                            "service_id" => $id,
                            "image_path" => $image,
                            'status' => 'active'
                        );
                        $this->common_model->add_data('service_technologies', $service_technologies);
                    }
                }
                $this->session->set_flashdata('success_message', '"Service Updated Successfully","Success"');
                redirect(base_url() . 'admin/services');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/services');
            }
        }
    }

    function add_service()
    {
        $config = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),
            array(
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ),
            array(
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ),
            array(
                'field' => 'services[]',
                'label' => 'Services',
                'rules' => 'required'
            ),
            array(
                'field' => 'display_order',
                'label' => 'Display Order',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE || $_FILES['icon']['name'] == ''  || $_FILES['banner1']['name'] == '' || $_FILES['banner2']['name'] == '') {
            // || $_FILES['tech']['name'][0]  == ''
            $this->form_validation->set_message('icon', 'The Icon field is required');
            $this->form_validation->set_message('banner1', 'The Banner field is required');
            $this->form_validation->set_message('banner2', 'The Small Banner field is required');
            // $this->form_validation->set_message('tech', 'The Technology field is required');
            $this->data['unique_name'] = 'services';
            $this->data['sub_unique_name'] = '';
            $this->data['page_title'] = 'Services';
            $this->admin_view('services');
        } else {
            $image_paths = [];
            $icon = $this->file_upload($_FILES['icon'], 'service_icons');
            $banner1 = $this->file_upload($_FILES['banner1'], 'banners');
            $banner2 = $this->file_upload($_FILES['banner2'], 'banners');
            $title = trim($this->input->get_post('title'));
            $code = strtolower(str_replace(' ', '-', $title));
            $code = preg_replace('/[^A-Za-z0-9_]/', '-', $code);
            $data = array(
                'title' => $title,
                'code' => $code,
                'icon' => $icon,
                'banner1' => $banner1,
                'banner2' => $banner2,
                'description' => trim($this->input->get_post('description')),
                'status' => trim($this->input->get_post('status')),
                'display_order' => trim($this->input->get_post('display_order')),
                'meta_data' => trim($this->input->get_post('meta_data')),
            );
            $res = $this->common_model->add_data('services', $data);
            if ($res) {
                if ($_FILES['tech']['name'][0] != '') {
                    for ($i = 0; $i < count($_FILES['tech']['name']); $i++) {
                        $image['name'] = $_FILES['tech']['name'][$i];
                        $image['type'] = $_FILES['tech']['type'][$i];
                        $image['tmp_name'] = $_FILES['tech']['tmp_name'][$i];
                        $image['size'] = $_FILES['tech']['size'][$i];
                        $image['error'] = $_FILES['tech']['error'][$i];

                        $image_paths[] = $this->file_upload($image, 'service_technologies');
                    }
                }
                foreach ($this->input->get_post('services') as $row) {
                    if (!empty($row)) {
                        $services_offered = array(
                            "service_id" => $res,
                            "offered_service" => $row,
                            'status' => 'active'
                        );
                        $this->common_model->add_data('services_offered', $services_offered);
                    }
                }
                if ($_FILES['tech']['name'][0] != '') {
                    foreach ($image_paths as $image) {
                        if (!empty($image)) {
                            $service_technologies = array(
                                "service_id" => $res,
                                "image_path" => $image,
                                'status' => 'active'
                            );
                            $this->common_model->add_data('service_technologies', $service_technologies);
                        }
                    }
                }
                $this->session->set_flashdata('success_message', '"Service Added Successfully","Success"');
                redirect(base_url() . 'admin/services');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/services');
            }
        }
    }
}
