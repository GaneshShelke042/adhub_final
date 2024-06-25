<?php

defined('BASEPATH') or exit('No direct script access allowed');
class receivedleadsmodel extends CI_Model
{
    function insertreceiveddata($data)
    {
        if (!empty($this->viewreceiveddatabyid($data["id"]))) 
        {
                echo"Data already exit";
                return false;
        }
        else
        {
            $this->db->insert("leadsreceived", $data);
            echo "data inserted";
            return true;
            
        }

    }

    function viewreceiveddata()
    {
        return  $this->db->get("leadsreceived")->result_array();
    }
    function viewreceiveddatabyid($id)
    {
        $query =   $this->db->where('id', $id)->get("leadsreceived")->row();
        return $query;
    }

    function viewreceiveddataasobjectbyclientid($clientid)
    {
        return  $this->db->where('client_id',$clientid)->get("leadsreceived")->result();
    }

}
