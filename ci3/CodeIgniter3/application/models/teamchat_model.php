<?php
defined('BASEPATH') or exit('No direct script access allowed');

class teamchat_model extends CI_Model
{

  function addmessage($data)
  {
    $this->db->insert('teamchat', $data);
    return true;
  }

  function viewdatabyticketid($tid)
  {
    return  $this->db->where('ticketid', $tid)->get('teamchat')->result_array();
  }

  function delete($id)
  {
    $this->db->where('id', $id)->delete('teamchat');
  }

  function viewdatabyid($id)
  {
    return  $this->db->where('id', $id)->get('teamchat')->result_array();
  }
}
