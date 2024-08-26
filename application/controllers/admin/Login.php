<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Login_model');
    }

    public function index() {
        $this->data['settings'] = $this->common_model->get_single_data('settings', 1);
        $this->load->view('admin/login', $this->data);
    }

    function login() {
        if ($this->input->post('login')) {
            $result = $this->Login_model->get_admin_details();
            if ($result) {
                $password = md5($this->input->post('password') . $result->salt);
                if ($result->password == $password) {
                    $data = array(
                        'admin_id' => $result->id,
                        'ip_address' => $this->input->ip_address(),
                        'created_date' => date('Y-m-d H:i:s')
                    );
                    $logs = $this->common_model->add_data('admin_logs', $data);
                    if ($logs) {
                        $data = array(
                            'user_name' => $result->display_name,
                            'user_id' => $result->id,
                            'validated' => TRUE,
                            'user_type' => 'admin',
                            'log_id' => $logs,
                            'designation_id' => 1,
                            'image' => $result->image
                        );
                        $this->session->set_userdata($data);
                        $this->session->set_flashdata('success_message', '"Welcome to Admin Dashboard","Success"');
                        redirect(base_url() . 'admin/dashboard');
                    } else {
                        $this->session->set_flashdata('error_message', '"Please try again","Failed!"');
                        redirect(base_url() . 'admin');
                    }
                } else {
                    $this->session->set_flashdata('error_message', '"Password not matched","Failed!"');
                    redirect(base_url() . 'admin');
                }
            } else {
                $this->session->set_flashdata('error_message', '"Username not found","Failed!"');

                redirect(base_url() . 'admin');
            }
        }
    }

    public function logout() {
        $data = array(
            'updated_date' => date('Y-m-d H:i:s')
        );
        $res = $this->common_model->update('admin_logs', $data, $this->session->userdata('log_id'));
        if ($res) {
            $this->session->sess_destroy();
            $this->session->set_flashdata('success_message', '"Logged Out Successsfully","Success"');
            redirect(base_url() . 'admin');
        } else {
            $this->session->set_flashdata('error_message', '"please try again later","Failed!"');

            redirect(base_url() . 'admin/dashboard');
        }
    }

    public function forgot_password() {
        $this->data['settings'] = $settings = $this->common_model->get_single_data('settings', 1);
        if ($this->input->get_post('submit')) {
            $res = $this->Login_model->get_admin_details();
            $email = $this->input->get_post('email');
            if ($res) {
                if ($res->email == $email) {
                    $salt = rand(10000, 99999);
                    $rand_pwd = randomPassword(6);
                    $password = $rand_pwd . $salt;
                    $data = array(
                        'salt' => $salt,
                        'password' => md5($password),
                        'updated_date' => date('Y-m-d H:i:s')
                    );
                    $result = $this->common_model->update('admin', $data, $res->id);
                    if ($result) {
                        $subject = "$settings->title new admin password";
                        $message = "New password is: " . $rand_pwd . ".\nReset your password to secure your account.";
                        if ($res->email != '') {
                            $this->send_mail($subject, $message, $res->email);
                        }
                        if ($res->mobile_number != '') {
                            send_sms($res->mobile_number, $message);
                        }
                        $this->session->set_flashdata('success_message', '"Password sent Successsfully","Success"');
                        redirect(base_url() . 'admin');
                    } else {
                        $this->session->set_flashdata('error_message', '"Please try again","Failed!"');
                        redirect(base_url() . 'admin');
                    }
                } else {
                    $this->session->set_flashdata('error_message', '"Email not found","Failed!"');
                    redirect(base_url() . 'admin');
                }
            } else {
                $this->session->set_flashdata('error_message', '"Username not found","Failed!"');
                redirect(base_url() . 'admin');
            }
        }
        $this->load->view('admin/forgot_password', $this->data);
    }

}
