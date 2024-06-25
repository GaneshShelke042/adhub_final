<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SMC_model extends CI_Model
{
    function insertdata($data) // for SMC payment 
    {
        $result =   $this->db->insert("smcpayment", $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    function updatedata($id,$data)
    {
        $result =  $this->db->where('id',$id)->update("smcpayment",$data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function deletedata($id)
    {
       $res =  $this->db->where('id',$id)->delete("smcpayment");
       if($res)
       {
            return true;
       }
       else{
        return false;
       }
    }


    function viewdatabyclient_id($id) // for SMC payment 
    {
        return $this->db->where("client_id",  $id)->get("smcpayment")->result_array();
    }
    function viewdatabyid($id) // for SMC payment 
    {
        return $this->db->where("id",  $id)->get("smcpayment")->row();
    }

//  for SMC emi
    function insertdatainemi($data)
    {
        $result =   $this->db->insert("smcemi", $data);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function viewdatabysmcemi($id)
    {
        return $this->db->where("smcpayment_id",$id)->get("smcemi")->result();
    }


    function deletedataemi($id)
    {
       $res = $this->db->where("smcpayment_id",$id)->delete("smcemi");
       if($res)
       {
        return true;
       }
       else{
        return false;
       }
    }



}
