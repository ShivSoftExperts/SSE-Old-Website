<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Db_backup_model extends CI_Model {

    public function dbsave() {

        $this->load->dbutil();

        $prefs = array(
            'format' => 'zip', // gzip, zip, txt
            'filename' => date('d-M-Y') . '-mybackup.sql', // File name - NEEDED ONLY WITH ZIP FILES
            'add_drop' => true, // Whether to add DROP TABLE statements to backup file
            'add_insert' => true, // Whether to add INSERT data to backup file
            'newline' => "\n", // Newline character used in backup file
        );

        $backup = $this->dbutil->backup($prefs);

        // Load the file helper and write the file to your server
        $this->load->helper('file');
        write_file('mybackup.zip', $backup);

        // Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download('mybackup.zip', $backup);
    }

}
