<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ClientFormModel extends CI_Model 
{

    function update($data)
    {
        $sideName = $data['sideName'];
    
        $existing_entry = $this->db->get_where('tblclientform', array('sideName' => $sideName))->row();
    
        if (!$existing_entry) {
            $this->db->insert('tblclientform', $data);
        } else {
            $this->db->where('sideName', $sideName);
            $this->db->update('tblclientform', $data);
        }
    }

    function editDataClient($userData){
		$this->db->where('sideName',$userData);
		return $result = $this->db->get('tblclientform')->row_array(); // select * from addnewclient1  where id=?;
	}


    function view(){
        return $users = $this->db->get('tblclientform')->result_array();
    }
    

}
