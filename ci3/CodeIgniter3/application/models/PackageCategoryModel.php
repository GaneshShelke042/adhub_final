<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PackageCategoryModel extends CI_Model 
{


    function newpackage($data)
	{
        $this->db->insert('packagecategory',$data); // insert into packagecategory
        // return true;
	}

    function viewPackageData(){
		return $users = $this->db->get('packagecategory')->result_array(); // select * from packagecategory
	}
    
    function editPackage($userData){
        $this->db->where('id',$userData);
        return $result = $this->db->get('packagecategory')->row_array(); // select * from packagecategory
    }

    function updatePackage($userData,$data){
		$this->db->where('id',$userData);
		$this->db->update('packagecategory',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}

    function dataDelete($userData){
        $this->db->where('id',$userData);
        $this->db->delete('packagecategory'); // delete from addnewclient1 where id=?;
    
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
        return $this->db->update('packagecategory', $data);
    }
}
?>