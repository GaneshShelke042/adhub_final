<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Curd_model extends CI_Model 
{


	function create1($data)
	{
        $this->db->insert('addnewclient1',$data); // insert into addnewclient1
        // return true;
	}
}