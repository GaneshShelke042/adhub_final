<?php

defined('BASEPATH') or exit('No direct script access allowed');

class loginwithfacebookmodel extends CI_Model
{
    function insertdata($data)
    {
        $this->db->insert("loginwithfacebookmodel",$data);
        return true; 
    }

    function viewlogindata()
    {
        $query = $this->db->get("loginwithfacebookmodel")->result_array();
        return $query;
    }
    function viewlogindatabyresid($resid)
    {
        $query = $this->db->where("resid",$resid)->get("loginwithfacebookmodel")->result_array();
        return $query;
    }


}

?>s