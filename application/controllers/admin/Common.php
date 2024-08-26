<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Common extends MY_Controller
{

    var $user_detail;

    function __construct()
    {
        parent::__construct();
        $this->login_required();
        $this->load->helper(array('form', 'url'));
        $this->load->model('admin/Common_model');
    }

    // ------------- Database Backup ------------------
    function backup()
    {
        $query = $this->Common_model->dbsave();
    }

    // ------------- Active/Inactive For all ------------------
    function deactive($id, $table)
    {
        $result = $this->Common_model->deactive($table, $id);
        if ($result) {
            $this->session->set_flashdata('success_message', '"Status Changed Successfully","Success"');
            echo '<script>window.history.go(-1)</script>';
        } else {
            $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
            echo '<script>window.history.go(-1)</script>';
        }
    }

    // ------------- Delete Data From DB ------------------
    function delete_data($id, $table)
    {
        $result = $this->Common_model->delete($table, $id);
        if ($result) {
            $this->session->set_flashdata('success_message', '"Data Deleted Successfully","Success"');
            echo '<script>window.history.go(-1)</script>';
        } else {
            $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
            echo '<script>window.history.go(-1)</script>';
        }
    }

    public function clients()
    {
        if ($this->input->post('submit')) {
            $icon = $this->file_upload($_FILES['icon'], 'clients');
            $data = array(
                'image_path' => $icon,
                'status' => $this->input->get_post('status')
            );
            $result = $this->Common_model->add_data('clients', $data);
            if ($result) {
                $this->session->set_flashdata('success_message', '"Client Added Successfully","Success"');
                redirect(base_url() . 'admin/common/clients');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/clients');
            }
        }

        $this->data['list'] = $this->common_model->get_all_records('clients');
        $this->data['unique_name'] = 'masters';
        $this->data['sub_unique_name'] = 'clients';
        $this->data['page_title'] = 'Clients';
        $this->admin_view('our_clients');
    }

    public function why_choose_us()
    {
        if ($this->input->post('submit')) {
            $icon = $this->file_upload($_FILES['icon'], 'icons');
            $data = array(
                'image_path' => $icon,
                'title' => $this->input->get_post('title'),
                'description' => $this->input->get_post('description'),
                'display_order' => $this->input->get_post('display_order'),
                'status' => $this->input->get_post('status')
            );
            $result = $this->Common_model->add_data('why_choose_us', $data);
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Added Successfully","Success"');
                redirect(base_url() . 'admin/common/why_choose_us');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/why_choose_us');
            }
        }

        $this->data['list'] = $this->common_model->get_all_records('why_choose_us');
        $this->data['unique_name'] = 'masters';
        $this->data['sub_unique_name'] = 'why_choose_us';
        $this->data['page_title'] = 'Why Choose Us';
        $this->admin_view('why_choose_us');
    }

    public function edit_why_choose_us($id)
    {
        if ($this->input->post('submit')) {
            if ($_FILES['icon']['name'] != '') {
                $icon = $this->file_upload($_FILES['icon'], 'icons');
            } else {
                $icon =  $this->input->get_post('icon1');
            }
            $data = array(
                'image_path' => $icon,
                'title' => $this->input->get_post('title'),
                'description' => $this->input->get_post('description'),
                'display_order' => $this->input->get_post('display_order'),
                'status' => $this->input->get_post('status')
            );
            $result = $this->Common_model->update('why_choose_us', $data, $id);
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/why_choose_us');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/edit_why_choose_us/' . $id);
            }
        }

        $this->data['list'] = $this->common_model->get_all_records('why_choose_us');
        $this->data['details'] = $this->common_model->get_single_data('why_choose_us', $id);
        $this->data['unique_name'] = 'masters';
        $this->data['sub_unique_name'] = 'why_choose_us';
        $this->data['page_title'] = 'Why Choose Us';
        $this->admin_view('why_choose_us');
    }

    public function why_shivsoft()
    {
        if ($this->input->post('submit')) {
            if ($_FILES['banner']['name'] != '') {
                $banner = $this->file_upload($_FILES['banner'], 'banners');
            } else {
                $banner =  $this->input->get_post('banner1');
            }
            if ($_FILES['banner_2']['name'] != '') {
                $banner_2 = $this->file_upload($_FILES['banner_2'], 'banners');
            } else {
                $banner_2 =  $this->input->get_post('banner_21');
            }
            if ($_FILES['image_path']['name'] != '') {
                $image_path = $this->file_upload($_FILES['image_path'], 'banners');
            } else {
                $image_path =  $this->input->get_post('image_path1');
            }
            $data = array(
                'banner' => $banner,
                'banner_2' => $banner_2,
                'image_path' => $image_path,
                'header_title' => $this->input->get_post('header_title'),
                'header_description' => $this->input->get_post('header_description'),
                'body_title' => $this->input->get_post('body_title'),
                'footer_title' => $this->input->get_post('footer_title'),
                'footer_description' => $this->input->get_post('footer_description'),
                'meta_data' => $this->input->get_post('meta_data')
            );
            $result = $this->Common_model->update('discover', $data, $this->input->get_post('id'));
            if ($result) {
                $this->db->set('status', 'inactive');
                $this->db->update('why_shivsoft_points');
                if (!empty($this->input->get_post('adv_title_old_id')) > 0) {
                    foreach ($this->input->get_post('adv_title_old_id') as $row) {
                        $adv_title_old = array(
                            'status' => 'active'
                        );
                        $this->common_model->update_cond('why_shivsoft_points', $adv_title_old, "id = $row");
                    }
                }
                $adv_title = $this->input->get_post('adv_title');
                $adv_desc = $this->input->get_post('adv_desc');
                for ($i = 0; $i < count($adv_title); $i++) {
                    if (!empty($adv_title[$i])) {
                        $why_shivsoft_points = array(
                            "title" => $adv_title[$i],
                            "small_description" => $adv_desc[$i],
                            'status' => 'active'
                        );
                        $this->common_model->add_data('why_shivsoft_points', $why_shivsoft_points);
                    }
                }
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/why_shivsoft');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/why_shivsoft');
            }
        }

        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "why_shivsoft"');
        $this->data['list'] = $this->common_model->get_multi_data_with_cond('why_shivsoft_points', 'status = "active"');
        $this->data['unique_name'] = 'why_shivsoft';
        $this->data['sub_unique_name'] = 'why_shivsoft';
        $this->data['page_title'] = 'Why Shivsoft';
        $this->admin_view('why_shivsoft');
    }

    public function our_process()
    {
        if ($this->input->post('submit')) {
            if ($_FILES['banner']['name'] != '') {
                $banner = $this->file_upload($_FILES['banner'], 'banners');
            } else {
                $banner =  $this->input->get_post('banner1');
            }
            if ($_FILES['banner_2']['name'] != '') {
                $banner_2 = $this->file_upload($_FILES['banner_2'], 'banners');
            } else {
                $banner_2 =  $this->input->get_post('banner_21');
            }
            $data = array(
                'banner' => $banner,
                'banner_2' => $banner_2,
                'header_title' => $this->input->get_post('header_title'),
                'header_description' => $this->input->get_post('header_description'),
                'footer_title' => $this->input->get_post('footer_title'),
                'footer_description' => $this->input->get_post('footer_description'),
                'meta_data' => $this->input->get_post('meta_data')
            );
            $result = $this->Common_model->update('discover', $data, $this->input->get_post('id'));
            if ($result) {
                $this->db->set('status', 'inactive');
                $this->db->update('our_process_points');
                if (!empty($this->input->get_post('our_process_old_id')) > 0) {
                    foreach ($this->input->get_post('our_process_old_id') as $row) {
                        $adv_title_old = array(
                            'status' => 'active'
                        );
                        $this->common_model->update_cond('our_process_points', $adv_title_old, "id = $row");
                    }
                }
                $title = $this->input->get_post('title');
                $display_order = $this->input->get_post('display_order');
                $desc = $this->input->get_post('desc');
                for ($i = 0; $i < count($title); $i++) {
                    if (!empty($title[$i])) {
                        if ($_FILES['icon']['name'][$i] != '') {
                            $image['name'] = $_FILES['icon']['name'][$i];
                            $image['type'] = $_FILES['icon']['type'][$i];
                            $image['tmp_name'] = $_FILES['icon']['tmp_name'][$i];
                            $image['size'] = $_FILES['icon']['size'][$i];
                            $image['error'] = $_FILES['icon']['error'][$i];
                            $icon = $this->file_upload($image, 'icons');
                        } else {
                            $icon = "";
                        }
                        $our_process_points = array(
                            "icon" => $icon,
                            "title" => $title[$i],
                            "small_description" => $desc[$i],
                            "display_order" => $display_order[$i],
                            'status' => 'active'
                        );
                        $this->common_model->add_data('our_process_points', $our_process_points);
                    }
                }
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/our_process');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/our_process');
            }
        }

        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "our_process"');
        $this->data['list'] = $this->common_model->get_multi_data_with_cond('our_process_points', 'status = "active"');
        $this->data['unique_name'] = 'our_process';
        $this->data['sub_unique_name'] = 'our_process';
        $this->data['page_title'] = 'Our Process';
        $this->admin_view('our_process');
    }

    public function about_us()
    {
        if ($this->input->post('submit')) {
            if ($_FILES['banner']['name'] != '') {
                $banner = $this->file_upload($_FILES['banner'], 'banners');
            } else {
                $banner =  $this->input->get_post('banner1');
            }
            if ($_FILES['banner_2']['name'] != '') {
                $banner_2 = $this->file_upload($_FILES['banner_2'], 'banners');
            } else {
                $banner_2 =  $this->input->get_post('banner_21');
            }
            if ($_FILES['image_path']['name'] != '') {
                $image_path = $this->file_upload($_FILES['image_path'], 'banners');
            } else {
                $image_path =  $this->input->get_post('image_path1');
            }
            $data = array(
                'banner' => $banner,
                'banner_2' => $banner_2,
                'header_title' => $this->input->get_post('header_title'),
                'header_description' => $this->input->get_post('header_description'),
                'image_path' => $image_path,
                'footer_description' => $this->input->get_post('footer_description'),
                'meta_data' => $this->input->get_post('meta_data')
            );
            $result = $this->Common_model->update('discover', $data, $this->input->get_post('id'));
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/about_us');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/about_us');
            }
        }

        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "about_us"');
        $this->data['unique_name'] = 'about_us';
        $this->data['sub_unique_name'] = 'about_us';
        $this->data['page_title'] = 'About Us';
        $this->admin_view('about_us');
    }

    public function payroll()
    {
        if ($this->input->post('submit')) {
            if ($_FILES['banner']['name'] != '') {
                $banner = $this->file_upload($_FILES['banner'], 'banners');
            } else {
                $banner =  $this->input->get_post('banner1');
            }
            if ($_FILES['banner_2']['name'] != '') {
                $banner_2 = $this->file_upload($_FILES['banner_2'], 'banners');
            } else {
                $banner_2 =  $this->input->get_post('banner_21');
            }
            if ($_FILES['image_path']['name'] != '') {
                $image_path = $this->file_upload($_FILES['image_path'], 'banners');
            } else {
                $image_path =  $this->input->get_post('image_path1');
            }
            $data = array(
                'banner' => $banner,
                'banner_2' => $banner_2,
                'header_title' => $this->input->get_post('header_title'),
                'header_description' => $this->input->get_post('header_description'),
                'image_path' => $image_path,
                'footer_description' => $this->input->get_post('footer_description'),
                'meta_data' => $this->input->get_post('meta_data')
            );
            $result = $this->Common_model->update('discover', $data, $this->input->get_post('id'));
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/payroll');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/payroll');
            }
        }

        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "payroll"');
        $this->data['unique_name'] = 'payroll';
        $this->data['sub_unique_name'] = 'payroll';
        $this->data['page_title'] = 'Payroll';
        $this->admin_view('payroll');
    }

    public function staff_augmentation()
    {
        if ($this->input->post('submit')) {
            $icon = $this->file_upload($_FILES['icon'], 'icons');
            $data = array(
                'image_path' => $icon,
                'title' => $this->input->get_post('title'),
                'description' => $this->input->get_post('description'),
                'display_order' => $this->input->get_post('display_order'),
                'status' => $this->input->get_post('status')
            );
            $result = $this->Common_model->add_data('staff_augmentation', $data);
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Added Successfully","Success"');
                redirect(base_url() . 'admin/common/staff_augmentation');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/staff_augmentation');
            }
        }

        $this->data['list'] = $this->common_model->get_all_records('staff_augmentation');
        $this->data['unique_name'] = 'staff_augmentation';
        $this->data['sub_unique_name'] = 'staff_augmentation';
        $this->data['page_title'] = 'Staff Augmentation';
        $this->admin_view('staff_augmentation');
    }

    public function edit_staff_augmentation($id)
    {
        if ($this->input->post('submit')) {
            if ($_FILES['icon']['name'] != '') {
                $icon = $this->file_upload($_FILES['icon'], 'icons');
            } else {
                $icon =  $this->input->get_post('icon1');
            }
            $data = array(
                'image_path' => $icon,
                'title' => $this->input->get_post('title'),
                'description' => $this->input->get_post('description'),
                'display_order' => $this->input->get_post('display_order'),
                'status' => $this->input->get_post('status')
            );
            $result = $this->Common_model->update('staff_augmentation', $data, $id);
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/staff_augmentation');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/edit_staff_augmentation/' . $id);
            }
        }

        $this->data['list'] = $this->common_model->get_all_records('staff_augmentation');
        $this->data['details'] = $this->common_model->get_single_data('staff_augmentation', $id);
        $this->data['unique_name'] = 'staff_augmentation';
        $this->data['sub_unique_name'] = 'staff_augmentation';
        $this->data['page_title'] = 'Staff Augmentation';
        $this->admin_view('staff_augmentation');
    }

    public function blog()
    {
        $this->data['list'] = $this->common_model->get_all_records('blog');
        $this->data['unique_name'] = 'blog';
        $this->data['sub_unique_name'] = 'blog';
        $this->data['page_title'] = 'Blog';
        $this->admin_view('blog');
    }

    public function add_blog()
    {
        $this->data['unique_name'] = 'blog';
        $this->data['sub_unique_name'] = 'blog';
        $this->data['page_title'] = 'Blog';
        $this->admin_view('add_blog');
    }

    function save_blog()
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
                'field' => 'tag[]',
                'label' => 'Tags',
                'rules' => 'required'
            ),
            array(
                'field' => 'question',
                'label' => 'Question',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE || $_FILES['icon']['name'] == '' || $_FILES['banner1']['name'] == '' || $_FILES['banner2']['name'] == '') {
            $this->form_validation->set_message('icon', 'The Icon field is required');
            $this->form_validation->set_message('banner1', 'The Banner field is required');
            $this->form_validation->set_message('banner2', 'The Small Banner field is required');
            $this->data['unique_name'] = 'blog';
            $this->data['sub_unique_name'] = 'blog';
            $this->data['page_title'] = 'Blog';
            $this->admin_view('add_blog');
        } else {
            $icon = $this->file_upload($_FILES['icon'], 'blog');
            $banner1 = $this->file_upload($_FILES['banner1'], 'banners');
            $banner2 = $this->file_upload($_FILES['banner2'], 'banners');
            $data = array(
                'title' => trim($this->input->get_post('title')),
                'image_path' => $icon,
                'banner1' => $banner1,
                'banner2' => $banner2,
                'description' => trim($this->input->get_post('description')),
                'status' => trim($this->input->get_post('status')),
                'meta_data' => $this->input->get_post('meta_data'),
                'question' => $this->input->get_post('question'),
            );
            $res = $this->common_model->add_data('blog', $data);
            if ($res) {
                foreach ($this->input->get_post('tag') as $row) {
                    if (!empty($row)) {
                        $blog_tags = array(
                            "blog_id" => $res,
                            "tag" => $row,
                            'status' => 'active'
                        );
                        $this->common_model->add_data('blog_tags', $blog_tags);
                    }
                }
                $this->session->set_flashdata('success_message', '"Service Added Successfully","Success"');
                redirect(base_url() . 'admin/common/blog');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/blog');
            }
        }
    }


    public function edit_blog($id)
    {
        $this->data['service'] = $this->common_model->get_single_data('blog', $id);
        $this->data['services_offered'] = $this->common_model->get_multi_data_with_cond('blog_tags', 'blog_id = ' . $id . ' and status = "active"');
        $this->data['unique_name'] = 'blog';
        $this->data['sub_unique_name'] = 'blog';
        $this->data['page_title'] = 'Blog';
        $this->admin_view('add_blog');
    }


    function update_blog()
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
                'field' => 'question',
                'label' => 'Question',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        $id = $this->input->get_post('id');
        if ($this->form_validation->run() == FALSE) {
            $this->data['service'] = $this->common_model->get_single_data('blog', $id);
            $this->data['services_offered'] = $this->common_model->get_multi_data_with_cond('blog_tags', 'blog_id = ' . $id . ' and status = "active"');
            $this->data['unique_name'] = 'blog';
            $this->data['sub_unique_name'] = 'blog';
            $this->data['page_title'] = 'Blog';
            $this->admin_view('add_blog');
        } else {
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
            $data = array(
                'title' => trim($this->input->get_post('title')),
                'image_path' => $icon,
                'banner1' => $banner1,
                'banner2' => $banner2,
                'description' => trim($this->input->get_post('description')),
                'status' => trim($this->input->get_post('status')),
                'meta_data' => $this->input->get_post('meta_data'),
                'question' => $this->input->get_post('question')
            );
            $res = $this->common_model->update_cond('blog', $data, "id = $id");

            if ($res) {
                $blog_tags = array(
                    'status' => 'inactive'
                );
                $this->common_model->update_cond('blog_tags', $blog_tags, "blog_id = $id");
                if (!empty($this->input->get_post('tag_old_id')) > 0) {
                    foreach ($this->input->get_post('tag_old_id') as $row) {
                        $blog_tags = array(
                            'status' => 'active'
                        );
                        $this->common_model->update_cond('blog_tags', $blog_tags, "id = $row");
                    }
                }
                foreach ($this->input->get_post('tag') as $row) {
                    if (!empty($row)) {
                        $blog_tags = array(
                            "blog_id" => $res,
                            "tag" => $row,
                            'status' => 'active'
                        );
                        $this->common_model->add_data('blog_tags', $blog_tags);
                    }
                }
                $this->session->set_flashdata('success_message', '"Service Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/blog');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/blog');
            }
        }
    }

    public function website_settings()
    {
        $id = 1;
        if ($this->input->post('submit')) {
            if ($_FILES['small_banner']['name'] != '') {
                $small_banner = $this->file_upload($_FILES['small_banner'], 'banners');
            } else {
                $small_banner = $this->input->get_post('small_banner_1');
            }
            if ($_FILES['staff_augmentation_banner']['name'] != '') {
                $staff_augmentation_banner = $this->file_upload($_FILES['staff_augmentation_banner'], 'banners');
            } else {
                $staff_augmentation_banner = $this->input->get_post('staff_augmentation_banner_1');
            }
            if ($_FILES['staff_augmentation_small_banner']['name'] != '') {
                $staff_augmentation_small_banner = $this->file_upload($_FILES['staff_augmentation_small_banner'], 'banners');
            } else {
                $staff_augmentation_small_banner = $this->input->get_post('staff_augmentation_small_banner_1');
            }
            if ($_FILES['blog_list_banner']['name'] != '') {
                $blog_list_banner = $this->file_upload($_FILES['blog_list_banner'], 'banners');
            } else {
                $blog_list_banner = $this->input->get_post('blog_list_banner_1');
            }
            if ($_FILES['blog_list_small_banner']['name'] != '') {
                $blog_list_small_banner = $this->file_upload($_FILES['blog_list_small_banner'], 'banners');
            } else {
                $blog_list_small_banner = $this->input->get_post('blog_list_small_banner_1');
            }
            if ($_FILES['why_choose_us_image']['name'] != '') {
                $why_choose_us_image = $this->file_upload($_FILES['why_choose_us_image'], 'banners');
            } else {
                $why_choose_us_image = $this->input->get_post('why_choose_us_image_1');
            }
            if ($_FILES['career_banner']['name'] != '') {
                $career_banner = $this->file_upload($_FILES['career_banner'], 'banners');
            } else {
                $career_banner = $this->input->get_post('career_banner_1');
            }
            if ($_FILES['career_small_banner']['name'] != '') {
                $career_small_banner = $this->file_upload($_FILES['career_small_banner'], 'banners');
            } else {
                $career_small_banner = $this->input->get_post('career_small_banner_1');
            }
            $data = array(
                'small_banner' => $small_banner,
                'staff_augmentation_banner' => $staff_augmentation_banner,
                'staff_augmentation_small_banner' => $staff_augmentation_small_banner,
                'blog_list_banner' => $blog_list_banner,
                'blog_list_small_banner' => $blog_list_small_banner,
                'home_meta_data' => $this->input->get_post('home_meta_data'),
                'banner_video_path' => $this->input->get_post('banner_video_path'),
                'text1' => $this->input->get_post('text1'),
                'text2' => $this->input->get_post('text2'),
                'text3' => $this->input->get_post('text3'),
                'staff_augmentation_meta_data' => $this->input->get_post('staff_augmentation_meta_data'),
                'blog_list_meta_data' => $this->input->get_post('blog_list_meta_data'),
                'slider_text' => $this->input->get_post('slider_text'),
                'contact_us_description' => $this->input->get_post('contact_us_description'),
                'contact_us_heading' => $this->input->get_post('contact_us_heading'),
                'footer_about_us' => $this->input->get_post('footer_about_us'),
                'why_choose_us_image' => $why_choose_us_image,
                'career_banner' => $career_banner,
                'career_small_banner' => $career_small_banner
            );
            $result = $this->common_model->update_cond('website_data', $data, "id = $id");
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/website_settings');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/website_settings');
            }
        }
        $this->data['details'] = $this->common_model->get_single_data('website_data', $id);
        $this->data['unique_name'] = 'masters';
        $this->data['sub_unique_name'] = 'website_settings';
        $this->data['page_title'] = 'Website Settings';
        $this->admin_view('website_settings');
    }

    public function branches()
    {
        if ($this->input->post('submit')) {
            $data = array(
                'branch_name' => $this->input->get_post('branch_name'),
                'address' => $this->input->get_post('address'),
                'display_order' => $this->input->get_post('display_order'),
                'status' => $this->input->get_post('status')
            );
            $result = $this->Common_model->add_data('address', $data);
            if ($result) {
                $this->session->set_flashdata('success_message', '"Branch Added Successfully","Success"');
                redirect(base_url() . 'admin/common/branches');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/branches');
            }
        }

        $this->data['list'] = $this->common_model->get_all_records('address');
        $this->data['unique_name'] = 'masters';
        $this->data['sub_unique_name'] = 'branches';
        $this->data['page_title'] = 'Branches';
        $this->admin_view('branches');
    }

    public function contact_us()
    {
        $this->data['list'] = $this->common_model->get_all_records('contact_us');
        $this->data['unique_name'] = 'contact_us';
        $this->data['sub_unique_name'] = '';
        $this->data['page_title'] = 'Contact Us';
        $this->admin_view('contact_us');
    }

    public function careers()
    {
        $this->data['list'] = $this->common_model->get_all_records('careers');
        $this->data['unique_name'] = 'careers';
        $this->data['sub_unique_name'] = 'careers';
        $this->data['page_title'] = 'Careers';
        $this->admin_view('careers_list');
    }
    public function add_careers()
    {
        if ($this->input->post('submit')) {
            $banner = $this->file_upload($_FILES['banner'], 'banners');
            $small_banner = $this->file_upload($_FILES['small_banner'], 'banners');
            $company_logo = $this->file_upload($_FILES['company_logo'], 'careers');
            $data = array(
                'banner' => $banner,
                'small_banner' => $small_banner,
                'company_logo' => $company_logo,
                'employ_type' => $this->input->get_post('employ_type'),
                'company_name' => $this->input->get_post('company_name'),
                'location' => $this->input->get_post('location'),
                'job_type' => $this->input->get_post('job_type'),
                'experience' => $this->input->get_post('experience'),
                'qualifications' => $this->input->get_post('qualifications'),
                'salary' => $this->input->get_post('salary'),
                'total_vacancies' => $this->input->get_post('total_vacancies'),
                'status' => $this->input->get_post('status'),
                'description' => $this->input->get_post('description'),
                'responsibilities' => $this->input->get_post('responsibilities'),
                'skills_qualifications' => $this->input->get_post('skills_qualifications'),
            );
            $result = $this->common_model->add_data('careers', $data);
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Added Successfully","Success"');
                redirect(base_url() . 'admin/common/careers');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/careers');
            }
        }
        $this->data['unique_name'] = 'careers';
        $this->data['sub_unique_name'] = 'careers';
        $this->data['page_title'] = 'Careers';
        $this->admin_view('careers');
    }

    public function edit_career($id)
    {
        if ($this->input->post('submit')) {

            if ($_FILES['banner']['name'] != '') {
                $banner = $this->file_upload($_FILES['banner'], 'banners');
            } else {
                $banner = $this->input->get_post('banner_old');
            }
            if ($_FILES['small_banner']['name'] != '') {
                $small_banner = $this->file_upload($_FILES['small_banner'], 'banners');
            } else {
                $small_banner = $this->input->get_post('small_banner_old');
            }
            if ($_FILES['company_logo']['name'] != '') {
                $company_logo = $this->file_upload($_FILES['company_logo'], 'banners');
            } else {
                $company_logo = $this->input->get_post('company_logo1');
            }

            $data = array(
                'banner' => $banner,
                'small_banner' => $small_banner,
                'company_logo' => $company_logo,
                'employ_type' => $this->input->get_post('employ_type'),
                'company_name' => $this->input->get_post('company_name'),
                'location' => $this->input->get_post('location'),
                'job_type' => $this->input->get_post('job_type'),
                'experience' => $this->input->get_post('experience'),
                'qualifications' => $this->input->get_post('qualifications'),
                'salary' => $this->input->get_post('salary'),
                'total_vacancies' => $this->input->get_post('total_vacancies'),
                'status' => $this->input->get_post('status'),
                'description' => $this->input->get_post('description'),
                'responsibilities' => $this->input->get_post('responsibilities'),
                'skills_qualifications' => $this->input->get_post('skills_qualifications'),
            );
            $result = $this->common_model->update_cond('careers', $data, "id=$id");
            if ($result) {
                $this->session->set_flashdata('success_message', '"Data Updated Successfully","Success"');
                redirect(base_url() . 'admin/common/careers');
            } else {
                $this->session->set_flashdata('error_message', '"Please try again later.","Failed!"');
                redirect(base_url() . 'admin/common/careers');
            }
        }
        $this->data['details'] = $this->common_model->get_single_data('careers', $id);
        $this->data['unique_name'] = 'careers';
        $this->data['sub_unique_name'] = 'careers';
        $this->data['page_title'] = 'Careers';
        $this->admin_view('careers');
    }

    function applications()
    {
        $this->data['list'] = $this->db->select('ja.*, c.company_name, c.job_type')->from('job_applications as ja')->join('careers c', 'c.id = ja.career_id')->order_by('ja.created_at', 'desc')->get()->result();
        $this->data['unique_name'] = 'applications';
        $this->data['sub_unique_name'] = 'applications';
        $this->data['page_title'] = 'Received Applications';
        $this->admin_view('applications');
    }
}
