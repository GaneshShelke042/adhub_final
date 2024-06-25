<?php

defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model 
{

	function insertRole($data)
	{
        $this->db->insert('usersroles',$data); // insert into addnewclient1
        // return true;
	}

// 	// Show on screen 
	function viewData(){
		return $users = $this->db->get('usersroles')->result_array(); // select * from addnewclient1
	}

	function editDataClient($userData){
		$this->db->where('id',$userData);
		return $result = $this->db->get('usersroles')->row_array(); // select * from addnewclient1  where id=?;
	}



	function updateRoles($roleData,$data){
		$this->db->where('id',$roleData);
		$this->db->update('usersroles',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}


	
	function viewIdrole($id)
	{
		return $users = $this->db->select('role')->where('id', $id)->get('usersroles')->result_array(); // 
	}

	function viewDatanameusingid($id){
		return $user = $this->db->where('id',$id)->get('usersroles')->row_array();
	}

	function dataDelete($userData){
		$this->db->where('id',$userData);
		$this->db->delete('usersroles'); // delete from addnewclient1 where id=?;
	
	 }


	public function updateStatus() {

        $id = $_REQUEST['id'];
        $status = $_REQUEST['status'];
    
        if($status == 1){
            $status = 0;
        }
        elseif($status == 0){
            $status = 1;
        }
        $data = array(
            'status' => $status
        );
    
    
        $this->db->where('id', $id);
        return $this->db->update('usersroles', $data);
    }
	function viewonlyidandnames(){
		return	$this->db->select('id , role , username')->get('usersroles')->result_array();
	}

}
?>
