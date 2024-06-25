<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GSTmodel extends CI_Model
{
    function insertdata($data)
    {
        $this->db->insert("gst", $data);
    }
    function view_Data()
    {
        $result = $this->db->get('gst')->result_array();
        return $result;
    }
    function delete_Data($id)
    {
        $this->db->where('id', $id)->delete('gst');
    }

    function getdatabyid($id)
    {
        return $this->db->where('id', $id)->get('gst')->result_array();
    }

    function updategstrate($id, $new_gst_rate)
    {
        $data = array(
            'GST_Rate' => $new_gst_rate
        );

        $this->db->where('id', $id)->update('gst', $data);

        return true;
    }
}
