<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Db_backup extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->login_required();
        $this->load->model('admin/Db_backup_model');
    }

    public function index() {
        $query = $this->Db_backup_model->dbsave();
    }

}
