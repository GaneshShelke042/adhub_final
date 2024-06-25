<?php

defined('BASEPATH') or exit('No direct script access allowed');

class paymentmodel extends CI_Model
{
    function addpayment($data)
    {
        $this->db->insert("paymentdata", $data);
        return true;
    }

    // function 
    function viewpayment()
    {
        return $this->db->get('paymentdata')->result_array();
    }

    function viewdatabyclient_id($client_id)
    {
        $result = $this->db->where('client_id', $client_id)->get('paymentdata')->result_array();
        return $result;
    }
    function viewdatabyid($id)
    {
        $result = $this->db->where('id', $id)->get('paymentdata')->row();
        return $result;
    }

    function viewpayment_filtered($fromDate, $toDate,$clientid)
    {
        $from_datetime = $fromDate . ' 00:00:00';
        $to_datetime = $toDate . ' 23:59:59';

        $this->db->select('*');
        $this->db->from('paymentdata');
        $this->db->where('client_id', $clientid);
        $this->db->where('payment_date >=', $from_datetime);
        $this->db->where('payment_date <=', $to_datetime);
        $query = $this->db->get();

        return $query->result_array();
    }

    function updatedata($id , $data)
    {
        $this->db->where('id',$id)->update("paymentdata",$data);
    }
    
    function Deletepayment($id)
    {
        $this->db->where("id",$id)->delete("paymentdata");
    }
}
