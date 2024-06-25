<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Forms extends CI_Model
{

    function insert($data)
    {
        $this->db->insert('tbl_forms', $data); // insert into addnewclient1
        return $this->db->insert_id();
        // return true;
    }
    function view(){
        return $users = $this->db->get('tbl_forms')->result_array();
    }


    function viewformsbyname($name)
    {
        return  $this->db->where('name',$name)->get('tbl_forms')->result_array();
    }
    
	function editData($userData){
		$this->db->where('id',$userData);
		return $result = $this->db->get('tbl_forms')->row_array(); // select * from addnewclient1  where id=?;
	}


	function updateData($userData,$data){
		$this->db->where('id',$userData);
		$this->db->update('tbl_forms',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}

    function dataDelete($userData){
        $this->db->where('name',$userData);
        $this->db->delete('tbl_forms'); // delete from addnewclient1 where id=?;
     }
    function dataDeletebyid($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_forms'); // delete from addnewclient1 where id=?;
     }


     function editDataClient($userData){
		$this->db->where('sideName',$userData);
		return $result = $this->db->get('tbl_forms')->row_array(); // select * from addnewclient1  where id=?;
	}


// insert form data into tblquestion table
    function insertForm($data)
    {
        $this->db->insert('tblquestion', $data); // insert into addnewclient1
        // return true;
    }

    function viewAns(){
        return $users = $this->db->get('tblquestion')->result_array(); // select * from addnewclient1
    }

    function editAns($userData){
		$this->db->where('id',$userData);
		return $result = $this->db->get('tblquestion')->row_array(); // select * from addnewclient1  where id=?;
	}


	function updateAns($userData,$data){
		$this->db->where('id',$userData);
		$this->db->update('tblquestion',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}

    function deleteAns($userData){
        $this->db->where('id',$userData);
        $this->db->delete('tblquestion'); // delete from addnewclient1 where id=?;
     }

     public function fetchAnswers($client_id, $form_name)
    {
        $this->db->where('client_id', $client_id);
        $this->db->where('form_name', $form_name);
        return $this->db->get('tblquestion')->row_array();
    }

    // Update form answers
    public function updateForm($client_id, $form_name, $data)
    {
        $this->db->where('client_id', $client_id);
        $this->db->where('form_name', $form_name);
        $this->db->update('tblquestion', $data);
    }

    public function updateStatus() {

        $name = $_REQUEST['name'];
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
    
    
        $this->db->where('name', $name);
        return $this->db->update('tbl_forms', $data);
    }
}
