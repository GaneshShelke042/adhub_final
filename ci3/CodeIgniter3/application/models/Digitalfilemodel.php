
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Digitalfilemodel extends CI_Model
{
    public function insertdata($data)
    {
        $this->db->insert('digitalfile', $data);
    }
    public function viewdatabyid($clientid)
    {
        $query = $this->db->where('Client_id', $clientid)
            ->get('digitalfile')
            ->result_array();
        return $query;
    }

    public function viewdatabynameandtype($data)
    {
        $query = $this->db->from('digitalfile')
            ->where('Name', $data['Name'])
            ->where('Type', $data['Type'])
            ->where('Client_id', $data['Client_id'])
            ->get()
            ->result_array();

        return $query;
    }

    public function Deletedatabynameandtype($data)
    {
        return $this->db->from('digitalfile')
            ->where('Name', $data['Name'])
            ->where('Type', $data['Type'])
            ->where('Client_id', $data['Client_id'])
            ->delete(); // Add a semicolon here to complete the delete operation
    }

    public function viewbyid($id)
    {
        $query = $this->db->where('id', $id)
            ->get('digitalfile')
            ->result_array();
        return $query;
    }
    public function deletebyid($id)
    {
        $this->db->where('id', $id)->delete('digitalfile');
    }

    public function updatestatus($data)
    {
        $this->db->where('id', $data['id'])->update('digitalfile', $data);
        return true;
    }

    public function showImagebyclientid($Client_id)
    {
        return  $this->db->where('Client_id', $Client_id)
            ->where('Status', 'Active')->get('digitalfile')->result_array();
    }
}

?>
