<?php

defined('BASEPATH') or exit('No direct script access allowed');

class messagemodel   extends CI_Model
{
    public function add($data)
    {
        $inserted = $this->db->insert('messages', $data);
        return $inserted;
    }

    public function showdatabygroupid($groupid)
    {
        return $this->db->where('groupid', $groupid)->get('messages')->result_array();
    }

    public function deletedatabyid($id)
    {
        $this->db->where('id', $id)->delete('messages');
    }

    public function viewdatabyid($id)
    {
        return  $this->db->where('id', $id)->get('messages')->result_array();
    }
}
