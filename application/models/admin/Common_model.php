<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Common_model extends CI_Model
{

    function admin_details()
    {
        $admin_id = $this->session->userdata('user_id');
        $this->db->where('id', $admin_id);
        $this->db->limit(1);
        return $this->db->get('admin')->row();
    }

    function update($table_name, $data, $updated_id)
    {
        $this->db->set($data);
        $this->db->where('id', $updated_id);
        if ($this->db->update($table_name)) {
            // if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function update_cond($table_name, $data, $cond)
    {
        $this->db->set($data);
        $this->db->where($cond);
        if ($this->db->update($table_name)) {
            // if ($this->db->affected_rows()) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function add_data($table_name, $data)
    {
        $this->db->set($data);
        $this->db->insert($table_name);
        $last_id = $this->db->insert_id();
        if ($last_id) {
            return $last_id;
        } else {
            return FALSE;
        }
    }

    public function deactive($table, $id)
    {
        if ($this->db->where('id', $id)->get($table)->row()->status == 'active') {
            $this->db->set('status', 'inactive');
        } else {
            $this->db->set('status', 'active');
        }
        // $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $id);
        if ($this->db->update($table)) {
            //echo $this->db->last_query();die;
            return true;
        } else {
            return false;
        }
    }

    public function delete($table, $id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete($table)) {
            return true;
        } else {
            return false;
        }
    }

    public function get_single_data($table, $id)
    {
        $this->db->where('id', $id);
        $res = $this->db->get($table);
        if ($res->num_rows() > 0) {
            return $res->row();
        } else {
            return false;
        }
    }

    public function get_single_data_with_cond($table, $cond)
    {
        $this->db->where($cond);
        $res = $this->db->get($table);
        if ($res->num_rows() > 0) {
            return $res->row();
        } else {
            return false;
        }
    }

    public function get_multi_data_with_cond($table, $cond, $order_by = '')
    {
        $this->db->where($cond);
        if ($order_by != '') {
            $this->db->order_by($order_by);
        }
        $res = $this->db->get($table);
        if ($res->num_rows() > 0) {
            return $res->result();
        } else {
            return [];
        }
    }

    public function get_multi_active_data($table, $order_by = 'display_order', $fields = '*')
    {
        $this->db->select($fields);
        $this->db->where('status', 'active');
        $this->db->order_by($order_by, 'asc');
        $res = $this->db->get($table);
        if ($res->num_rows() > 0) {
            return $res->result();
        } else {
            return [];
        }
    }

    public function get_all_records($table)
    {
        $res = $this->db->order_by('id', 'desc')->get($table);
        if ($res->num_rows() > 0) {
            return $res->result();
        } else {
            return [];
        }
    }

    function get_admin_menu()
    {
        $this->db->where('status', 1)->order_by('display_order', 'asc');
        $data = $this->db->get('main_menu')->result();
        foreach ($data as $row) {
            $sub_menu = $this->db->where('main_menu_id', $row->id)->where('status', 1)->order_by('display_order', 'asc')->get('sub_menu')->result();
            if ($sub_menu) {
                $row->sub_menu = $sub_menu;
                $row->is_sub_menu = 'yes';
            } else {
                $row->sub_menu = '';
                $row->is_sub_menu = 'no';
            }
        }
        return $data;
    }
}
