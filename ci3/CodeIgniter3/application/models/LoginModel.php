<?php

defined('BASEPATH') or exit('No direct script access allowed');

class LoginModel extends CI_Model 
{


	// Show on screen 
	public function loginUser($data){
        $this->db->select('*');
        $this->db->where('username', $data['username']);
        $this->db->where('Confirm_Password', $data['Confirm_Password']);
        $this->db->from('usersroles');
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
    
        if($query->num_rows() == 1){
            return $query->row();
        } else {
            return false;
        }
    }
    
    function viewLogin(){
        return $users = $this->db->get('login')->result_array(); // select * from addnewclient1
    }

}

