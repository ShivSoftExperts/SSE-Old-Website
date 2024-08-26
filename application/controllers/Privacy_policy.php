<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Privacy_policy_model');
    }

    public function index() {
        $this->data['details'] = $this->Privacy_policy_model->get_data();
        $this->load->view('privacy_policy', $this->data);
    }

}
