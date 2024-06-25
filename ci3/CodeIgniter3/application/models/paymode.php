<?php

defined('BASEPATH') or exit('No direct script access allowed');
class paymode extends CI_Model
{
    function insertdata($data)
    {

        $this->db->insert("paymentmode",$data);
    }

    function viewdata()
    {
      return  $this->db->get("paymentmode")->result_array();
    }

}