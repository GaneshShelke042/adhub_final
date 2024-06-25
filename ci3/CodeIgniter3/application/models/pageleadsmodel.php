<?php

defined('BASEPATH') or exit('No direct script access allowed');
class pageleadsmodel extends CI_Model
{
    function insertdata($data)
    {
        $this->db->insert("pageleadsid", $data);
        return true;
    }

    function viewdatabyid($id)
    {
        return $this->db->where('Client_id', $id)->get("pageleadsid")->row();
    }


    //  access token function are here 

    function insertaccesstoken($data)
    {
        $this->db->insert("accesstoken", $data);
        return true;
    }

    function viewaccesstoken()
    {
        return $this->db->get("accesstoken")->row();
    }
    function updateaccesstoken($id, $data)
    {
        $this->db->where('id', $id)->update('accesstoken', $data);
        return true; // You may want to handle the return value based on the success of the update operation
    }
}
