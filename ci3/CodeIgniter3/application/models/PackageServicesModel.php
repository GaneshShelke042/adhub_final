<?php

defined('BASEPATH') or exit('No direct script access allowed');

class PackageServicesModel extends CI_Model
{


    function newpackageServices($data)
    {
        $this->db->insert('packageservices', $data); // insert into packageservices
        // return true;
    }

    function viewPackageServices()
    {
        return $users = $this->db->get('packageservices')->result_array(); // select * from packageservices
    }

    
    function viewdatabyName($name)
{
    // Retrieve data where id matches and name matches
    $data = $this->db->where('name', $name)
                     ->get('packageservices')
                     ->result();
    return $data;
}

   
    function editPackage($userData)
    {
        $this->db->where('id', $userData);
        return $result = $this->db->get('packageservices')->row_array(); // select * from packageservices
    }

    function updatePackage($userData, $data)
    {
        $this->db->where('id', $userData);
        $this->db->update('packageservices', $data); // update packageservices SET  Brand_name=?,.......where id=?;
    }

    function dataDelete($userData)
    {
        $this->db->where('id', $userData);
        $this->db->delete('packageservices'); // delete from packageservices where id=?;

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
        return $this->db->update('packageservices', $data);
    }
}
