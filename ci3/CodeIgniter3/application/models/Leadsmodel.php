<?php

defined('BASEPATH') or exit('No direct script access allowed');


class Leadsmodel extends CI_Model
{
    function insertdata($data)
    {
        $this->db->insert("leads", $data);
        return true;
    }

    function getdata()
    {
        $query =  $this->db->get("leads")->result_array();
        return $query;
    }

    function Deletedata($id)
    {
        $this->db->where("id", $id)->delete('leads');
        return true;
    }

    function getdatabyid($id)
    {
        $query = $this->db->where("id", $id)->get("leads")->row();
        return $query;
    }

    function updatedatabyid($id, $data)
    {
        $this->db->where('id', $id)->update('leads', $data);
        return true;
    }

    function updatestatusonly($id, $status)
    {
        $data = array(
            'status' => $status // Assuming 'status' is the column you want to update
        );

        $this->db->where('id', $id)->update('leads', $data);

        return true;
    }

   
}
