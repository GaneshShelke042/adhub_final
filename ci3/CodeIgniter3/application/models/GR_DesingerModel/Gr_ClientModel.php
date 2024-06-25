<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Gr_ClientModel extends CI_Model 
{



	// function insertdatatest($data)
	// {
	// 	// print_r($data);

	// 	// echo json_encoded($data);
	// 	echo json_encode($data);
    //     // $this->db->insert('addnewclient1',$data); // insert into addnewclient1
    //     // return true;
	// }




	function insertClient($data)
	{
        $this->db->insert('addnewclient1',$data); // insert into addnewclient1
        // return true;
	}

	// Show on screen 
	function viewClient(){
		return $users = $this->db->get('addnewclient1')->result_array(); // select * from addnewclient1
	}


	// for update data VVVVVVV


	function editDataClient($userData){
		$this->db->where('id',$userData);
		return $result = $this->db->get('addnewclient1')->row_array(); // select * from addnewclient1  where id=?;
	}


	function updateData($userData,$data){
		$this->db->where('id',$userData);
		$this->db->update('addnewclient1',$data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}
	// for update data ^^^^^^^

// for delete data  VVVVV
 
//  function dataDelete($userData){
// 	$this->db->where('id',$userData);
// 	$this->db->delete('addnewclient1'); // delete from addnewclient1 where id=?;

//  }
}
?>
