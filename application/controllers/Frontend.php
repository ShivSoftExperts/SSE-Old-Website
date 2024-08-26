<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Frontend extends MY_Controller
{

    var $user_detail;

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('admin/Common_model');
        $this->per_page = 4;
        $this->per_page_career = 6;
    }
    public function index()
    {
        $this->data['unique_name'] = 'home';
        $this->data['clients'] = $this->common_model->get_multi_active_data('clients', 'created_at', 'image_path');
        $this->data['why_choose_us'] = $this->common_model->get_multi_active_data('why_choose_us', '', 'image_path,title,description');
        $this->website_view('home');
    }

    public function why_shivsoft()
    {
        $this->data['unique_name'] = 'why_shivsoft';
        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "why_shivsoft"');
        $this->data['meta_data'] = $this->data['details']->meta_data;
        $this->data['points'] = $this->common_model->get_multi_active_data('why_shivsoft_points', 'created_at', 'title,small_description');
        $this->website_view('why_shivsoft');
    }

    public function our_process()
    {
        $this->data['unique_name'] = 'our_process';
        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "our_process"');
        $this->data['meta_data'] = $this->data['details']->meta_data;
        $this->data['points'] = $this->common_model->get_multi_active_data('our_process_points', '', 'icon,title,small_description');
        $this->website_view('our_process');
    }

    public function about_us()
    {
        $this->data['unique_name'] = 'about_us';
        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "about_us"');
        $this->data['meta_data'] = $this->data['details']->meta_data;
        $this->website_view('about_us');
    }
    public function service($service_id)
    {
        $this->data['unique_name'] = 'service';
        $this->data['details'] = $this->common_model->get_single_data_with_cond('services', "code = '" . $service_id . "'");
        $service_id = $this->data['details']->id;
        $this->data['meta_data'] = $this->data['details']->meta_data;
        $this->data['services_offered'] = $this->common_model->get_multi_data_with_cond('services_offered', 'service_id=' . $service_id, 'id asc');
        $this->data['service_technologies'] = $this->common_model->get_multi_data_with_cond('service_technologies', 'service_id=' . $service_id);
        $this->website_view('service');
    }
    public function staff_augmentation()
    {
        $this->data['unique_name'] = 'staffing';
        $this->data['website_data'] = $this->common_model->get_single_data('website_data', 1);
        $this->data['meta_data'] = $this->data['website_data']->staff_augmentation_meta_data;
        $this->data['staff_augmentation'] = $this->common_model->get_multi_active_data('staff_augmentation', '', 'title,description,image_path');
        $this->website_view('staff_augmentation');
    }

    public function payroll()
    {
        $this->data['unique_name'] = 'staffing';
        $this->data['details'] = $this->common_model->get_single_data_with_cond('discover', 'type = "payroll"');
        $this->data['meta_data'] = $this->data['details']->meta_data;
        $this->website_view('payroll');
    }
    public function contact_us()
    {
        $this->data['unique_name'] = 'contact_us';
        $this->website_view('contact_us');
    }

    public function add_contact_us()
    {
        if ($this->input->get_post('submit')) {
            if ($this->input->get_post('captchaResult') != $this->input->get_post('captcha')) {
                redirect(base_url() . 'contact_us?succ=captchafail');
            }
            $data = array(
                'name' => $this->input->get_post('name'),
                'email' => $this->input->get_post('email'),
                'phone' => $this->input->get_post('phone'),
                'company' => $this->input->get_post('companyname'),
                'message' => $this->input->get_post('message')
            );
            $result = $this->Common_model->add_data('contact_us', $data);
            if ($result) {
                redirect(base_url() . 'contact_us?succ=true');
            } else {
                return "Failed, Please try again";
            }
        } else {
            redirect(base_url() . 'contact_us?succ=captchafail');
        }
    }

    public function blogs()
    {
        $search = $this->input->get('search');
        if ($search != '') {
            $sql = "SELECT b.* FROM `blog` b JOIN blog_tags bt on bt.blog_id = b.id WHERE b.status = 'active' and (b.question LIKE '%$search%' or bt.tag LIKE '%$search%' or b.title LIKE '%$search%') ORDER by b.id DESC LIMIT 0, $this->per_page";

            $this->data['blog_list'] = $this->db->query($sql)->result();
        } else {
            $this->data['blog_list'] = $this->db->select('id, title, image_path, created_date, updated_date, question')->where('status', 'active')->order_by('id', 'desc')->limit($this->per_page, 0)->get('blog')->result();
        }
        $this->data['unique_name'] = 'blogs';
        $this->website_view('blogs');
    }

    public function load_blogs($page = 0)
    {
        $per_page = $this->per_page;
        $start = $per_page * $page;
        $search = $this->input->get('search');
        if ($search != '') {
            $sql = "SELECT b.* FROM `blog` b JOIN blog_tags bt on bt.blog_id = b.id WHERE b.status = 'active' and (b.question LIKE '%$search%' or bt.tag LIKE '%$search%' or b.title LIKE '%$search%') ORDER by b.id DESC LIMIT $start, $this->per_page";

            $list = $this->db->query($sql)->result();
        } else {
            $list = $this->db->select('id, title, image_path, created_date, question')->where('status', 'active')->order_by('id', 'desc')->limit($this->per_page, $start)->get('blog')->result();
        }
        // $list = $this->db->select('id, title, image_path, created_date, question')->where('status', 'active')->order_by('id', 'desc')->limit($per_page, $start)->get('blog')->result();
        $data = '';
        foreach ($list as $row) {
            $data .= '<div class="col-md-6 wow slideInUp" data-wow-delay="0.1s">
            <div class="blog-item bg-light rounded overflow-hidden">
                <div class="blog-img position-relative overflow-hidden">
                    <img class="img-fluid" src="' . base_url($row->image_path) . '" alt="">
                    <a class="position-absolute top-0 start-0 bg-primary blog-title-strip text-white rounded-end mt-5 py-2 px-4" href="' . base_url() . 'blog/' . $row->id . '">' . $row->title . '</a>
                </div>
                <div class="p-4">
                    <div class="d-flex mb-3">

                        <small><i class="far fa-calendar-alt text-primary me-2"></i>' . date('d M, Y', strtotime($row->created_date)) . '</small>
                    </div>
                    <h4 class="mb-5 blog-question">' . $row->question . '</h4>
                    <!-- <p>Dolor et eos labore stet justo sed est sed sed sed dolor stet amet</p> -->
                    <a class="text-uppercase blog-read-more" href="' . base_url() . 'blog/' . $row->id . '">Read More </a>
                </div>
            </div>
        </div>';
        }
        echo $data;
    }

    public function blog($id)
    {
        $this->data['details'] = $this->db->where('status', 'active')->where('id', $id)->get('blog')->row();
        $this->data['unique_name'] = 'blogs';
        $this->data['meta_data'] = $this->data['details']->meta_data;
        $this->data['meta_title'] = $this->data['details']->meta_title;
        $this->data['blog_list'] = $this->db->select('id, title, image_path, created_date, question')->where('id !=', $id)->where('status', 'active')->order_by('id', 'desc')->limit($this->per_page, 0)->get('blog')->result();
        $this->website_view('blog_details');
    }

    public function add_comment()
    {
        $data = array(
            'name' => $this->input->get_post('name'),
            'email' => $this->input->get_post('email'),
            'blog_id' => $this->input->get_post('blog_id'),
            'comment' => $this->input->get_post('comment'),
            'parent_id' => $this->input->get_post('parent_id')
        );
        $result = $this->Common_model->add_data('blog_comments', $data);
        if ($result) {
            return true;
        } else {
            return "Failed, Please try again";
        }
    }

    public function load_comments($id, $page = 0)
    {
        $per_page = 2;
        $start = $per_page * $page;
        $list = $this->db->where('blog_id', $id)->where('status', 'active')->where('parent_id', 0)->order_by('id', 'desc')->limit($per_page, $start)->get('blog_comments')->result();
        $data = '';
        foreach ($list as $row) {
            $data .= '<div class="d-flex mb-4">
                        <div class="ps-3 commenter-name">
                            <h6><a href="#">' . $row->name . '</a> <small><i>' . date('d M, Y', strtotime($row->created_date)) . '</i></small></h6>
                            <p>' . $row->comment . '</p>
                            <button class="btn btn-sm btn-light" type="button" onclick="reply(' . $row->id . ')">Reply</button>
                        </div>
                    </div>';
            $list1 = $this->db->where('blog_id', $id)->where('parent_id', $row->id)->order_by('id', 'asc')->get('blog_comments')->result();
            foreach ($list1 as $row1) {
                $data .= '<div class="d-flex ms-5 mb-4">
                            <div class="ps-3 commenter-name">
                                <h6><a href="#">' . $row1->name . '</a> <small><i>' . date('d M, Y', strtotime($row1->created_date)) . '</i></small></h6>
                                <p>' . $row1->comment . '</p>
                                <button class="btn btn-sm btn-light" type="button" onclick="reply(' . $row->id . ')">Reply</button>
                            </div>
                        </div>';
            }
        }
        echo $data;
    }

    public function career()
    {
        $search = $this->input->get('search');
        $location = $this->input->get('location');
        $employ_type = $this->input->get('employ_type');
        $cond = "status = 'active'";
        if ($search != '') {
            $cond .= " and (company_name like '%$search%' or job_type like '%$search%')";
        }
        if ($location != '') {
            $cond .= " and location = '$location'";
        }
        if ($employ_type != '') {
            $cond .= " and employ_type = '$employ_type'";
        }
        $this->data['careers_list'] = $this->db->where($cond)->order_by('id', 'desc')->limit($this->per_page_career, 0)->get('careers')->result();
        $this->data['unique_name'] = 'career';
        $this->website_view('career');
    }

    public function load_careers($page = 0)
    {
        $per_page = $this->per_page_career;
        $start = $per_page * $page;


        $search = $this->input->get('search');
        $location = $this->input->get('location');
        $employ_type = $this->input->get('employ_type');
        $cond = "status = 'active'";
        if ($search != '') {
            $cond .= " and (company_name like '%$search%' or job_type like '%$search%')";
        }
        if ($location != '') {
            $cond .= " and location = '$location'";
        }
        if ($employ_type != '') {
            $cond .= " and employ_type = '$employ_type'";
        }
        $careers_list = $this->db->where($cond)->order_by('id', 'desc')->limit($per_page, $start)->get('careers')->result();
        $data = '';
        foreach ($careers_list as $row) {
            $data .= '<div class="col-lg-4 col-md-6 col-12">
                <div class="job-post rounded-3 shadow p-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="' . base_url($row->company_logo) . '" style="max-width: 75px;" class="img-sm avatar avatar-small rounded shadow p-3 bg-white" alt="">
                            <div class="ms-3">
                                <a href="' . base_url() . 'career_details/' . $row->id . '" class="h5 company text-dark">' . $row->company_name . '</a>
                                <span class="text-muted d-flex align-items-center small mt-2"><i class="ri-time-line me-1"></i>' . date('d M, Y', strtotime($row->created_date)) . '</span>
                            </div>
                        </div>
                        <span class="badge bg-soft-primary">' . $row->employ_type . '</span>
                    </div>
                    <div class="mt-4">
                        <a href="' . base_url() . 'career_details/' . $row->id . '" class="text-dark job-title h5">' . $row->job_type . '</a>
                        <span class="text-muted d-flex align-items-center mt-2"><i class="ri-map-pin-line me-1"></i>' . $row->location . '</span>
                        <div class="progress-box mt-3">
                            <div class="progress mb-2">
                                <div class="progress-bar position-relative bg-primary" style="width:' . (($row->applied_count / $row->total_vacancies) * 100) . '%"></div>
                            </div>
                            <span class="text-dark">' . $row->applied_count . ' applied of <span class="text-muted">' . $row->total_vacancies . ' vacancy</span></span>
                        </div>
                    </div>
                </div><!--end job post-->
            </div><!--end col-->';
        }
        echo $data;
    }
    function career_details($id)
    {
        $this->data['details'] = $details = $this->db->where('status', 'active')->where('id', $id)->get('careers')->row();
        $cond = "status = 'active' and id != $id and (company_name = '$details->company_name' or employ_type = '$details->employ_type' or job_type = '$details->job_type')";
        $this->data['careers_list'] = $this->db->where($cond)->order_by('id', 'desc')->limit(3, 0)->get('careers')->result();
        $this->data['unique_name'] = 'career';
        $this->website_view('career_details');
    }

    function job_apply($id)
    {
        if ($this->input->get_post('submit')) {
            if ($this->input->get_post('captchaResult') != $this->input->get_post('captcha')) {
                redirect(base_url() . 'job_apply/' . $id . '?succ=captchafail');
            }
            $resume = $this->file_upload($_FILES['resume'], 'resumes');
            $data = array(
                'resume' => $resume,
                'career_id' => $id,
                'name' => $this->input->get_post('name'),
                'email' => $this->input->get_post('email'),
                'phone_number' => $this->input->get_post('phone_number'),
                'job_title' => $this->input->get_post('job_type'),
                'employment_type' => $this->input->get_post('employ_type'),
                'description' => $this->input->get_post('description')
            );
            $result = $this->common_model->add_data('job_applications', $data);
            if ($result) {
                redirect(base_url() . 'career_details/' . $id . '?succ=true');
            } else {
                $this->data['details'] = $details = $this->db->where('status', 'active')->where('id', $id)->get('careers')->row();
                $this->data['unique_name'] = 'career';
                $this->website_view('job_apply');
            }
        }
        $this->data['details'] = $details = $this->db->where('status', 'active')->where('id', $id)->get('careers')->row();
        $this->data['unique_name'] = 'career';
        $this->website_view('job_apply');
    }
}
