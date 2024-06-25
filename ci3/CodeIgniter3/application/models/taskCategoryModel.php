<?php

defined('BASEPATH') or exit('No direct script access allowed');

class taskCategoryModel extends CI_Model 
{


    function newpackage($data)
	{
        $this->db->insert('tbl_taskcategory',$data); // insert into packagecategory
        // return true;
	}

    function viewPackageData(){
		return $users = $this->db->get('tbl_taskcategory')->result_array(); // select * from packagecategory
	}
    
    function editPackage($userData){
        $this->db->where('id',$userData);
        return $result = $this->db->get('tbl_taskcategory')->row_array(); // select * from packagecategory
    }

    function updatePackage($userData,$data){
		$this->db->where('id',$userData);
		$this->db->update('tbl_taskcategory',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}

    function dataDelete($userData){
        $this->db->where('id',$userData);
        $this->db->delete('tbl_taskcategory'); // delete from addnewclient1 where id=?;
    
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
        return $this->db->update('tbl_taskcategory', $data);
    }
}
?>