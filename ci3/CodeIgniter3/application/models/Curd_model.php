<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Curd_model extends CI_Model 
{

	function create1($data)
	{
        $this->db->insert('addnewclient1',$data); // insert into addnewclient1
        // return true;
	}

	// Show on screen 
	function viewData(){
		return $users = $this->db->get('addnewclient1')->result_array(); // select * from addnewclient1
	}
	function viewclientname()
	{
		$this->db->select(['brand_name','id']); // Replace 'column_name' with the actual column name you want
		$query = $this->db->get('addnewclient1')->result();
		return $query;
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
 
 function dataDelete($userData){
	$this->db->where('id',$userData);
	$this->db->delete('addnewclient1'); // delete from addnewclient1 where id=?;

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
    return $this->db->update('addnewclient1', $data);
}

public function updateHold() {
    $id = $_REQUEST['id'];
    $hold = $_REQUEST['hold'];
    $hold_Date = $_REQUEST['hold_Date']; // Get the date parameter

    if ($hold == 1) {
        $hold = 0;
    } elseif ($hold == 0) {
        $hold = 1;
    }

    $data = array(
        'hold' => $hold,
        'hold_Date' => $hold_Date // Include the date in the update
    );

    $this->db->where('id', $id);
    return $this->db->update('addnewclient1', $data);
}


function newpackage($data)
{
	$this->db->insert('tbl_client_package',$data); // insert into package
	// return true;
}

function viewpackage(){
	return $users = $this->db->get('tbl_client_package')->result_array(); // select * from packagegst
}



public function pkgStatus() {

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
    return $this->db->update('tbl_client_package', $data);
}

function pkgDelete($userData){
	$this->db->where('id',$userData);
	$this->db->delete('tbl_client_package'); // delete from addnewclient1 where id=?;

}
function viewclientnameandid($userData)
	{
		$this->db->where('id', $userData);
		$this->db->select('brand_name, id'); 
		return $result = $this->db->get('addnewclient1')->row_array(); // select * from addnewclient1  where id=?;
	}

}
?>

