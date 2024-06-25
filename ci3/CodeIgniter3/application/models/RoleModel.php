<?php

defined('BASEPATH') or exit('No direct script access allowed');

class RoleModel extends CI_Model 
{

	function insertNewRole($data)
	{
        $this->db->insert('roles',$data); // insert into addnewclient1
        // return true;
	}

	function viewRoles(){
		return $users = $this->db->get('roles')->result_array(); // select * from addnewclient1
	}

	function viewRolename(){
	    $this->db->select('Role_name');
    	return $query = $this->db->get('roles')->result_array();

	}
	// for update data VVVVVVV

	function editRoles($roleData){
		$this->db->where('id',$roleData);
		return $result = $this->db->get('roles')->row_array(); // select * from addnewclient1  where id=?;
	}

	function updateRoles($roleData,$data){
		$this->db->where('id',$roleData);
		$this->db->update('roles',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}
	// for update data ^^^^^^^

	// for delete data  VVVVV
 
	function dataRoles($userData){
		$this->db->where('id',$userData);
		$this->db->delete('roles'); // delete from addnewclient1 where id=?;
	
	 }

}
?>