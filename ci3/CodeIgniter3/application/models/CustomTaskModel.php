
<?php

defined('BASEPATH') or exit('No direct script access allowed');

class CustomTaskModel extends CI_Model
{

	function insertTask($data)
	{
		$this->db->insert('customtask', $data); // insert into customtask
	}

	function viewTask()
	{
		return $users = $this->db->get('customtask')->result_array(); // select * from addnewclient1
	}

	function editTask($userData)
	{
		$this->db->where('id', $userData);
		return $result = $this->db->get('customtask')->row_array(); // select * from addnewclient1  where id=?;
	}


	function updateTask($userData, $data)
	{
		$this->db->where('id', $userData);
		$this->db->update('customtask', $data); // update addnewclient1 SET  Brand_name=?,.......where id=?;
	}

	// for delete data  VVVVV

	function deleteTask($userData)
	{
		$this->db->where('id', $userData);
		$this->db->delete('customtask'); // delete from addnewclient1 where id=?;

	}



	// For Dashboard

	function insertDashbord($data1)
	{
		$this->db->insert('dashboard', $data1);
	}

	function viewDashbord()
	{
		return $users = $this->db->get('dashboard')->result_array(); // select * from addnewclient1
	}

	

	
}
